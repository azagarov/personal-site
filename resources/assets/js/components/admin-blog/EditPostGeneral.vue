<script>
import df from "dateformat";

export default {
    props: ['_post', '_categories'],
    mounted() {
        $(".select2").select2()
            .trigger('change')
            .on('change', ev => {
                this.post.categories = $(ev.target).select2('data').map(x => parseInt(x.id));
            });
    },
    data() {
        // alert(this._categories);
        const _p = JSON.parse(this._post);
        if(_p.date_occurred)
            _p.date_occurred = df(new Date(Date.parse(_p.date_occurred)), "mm/dd/yyyy");

        _p.categories = JSON.parse(this._categories);

        return {
            post: _p,
            saving: false,
            isSaving: false,
            slugChanged: false,
            slugOk: true,
            slugIsChecking: false,
            slugDupe: {},
        }
    },

    computed: {
        slug() {
            return this.post.slug;
        },
        valid() {
            return Object.values(this.validation).reduce((c, x) => c && x, true);
        },
        validation() {
            return {
                slug: !!this.post.slug && this.slugOk,
                categories: this.post.categories.length > 0
            }
        },
        errors() {
            let _slug = "This field can't be empty";

            if(this.post.slug && this.slugChanged && !this.slugOk) {
                _slug = "This slug is already used by ";
                _slug += this.slugDupe.type + " '" + this.slugDupe.title + "'.";
                _slug += "Please select another one.";
            }
            return {
                slug: _slug,
                categories: "Please select at least 1 category",
            }
        },
        slugHasError() {
            return (this.saving && !this.validation.slug) || (this.slugChanged && (!this.slugOk || !this.validation.slug));
        }
    },
    watch: {
        slug(val, old) {
            this.slugChanged = false;
            return val;
        }
    },
    methods: {
        checkSlug() {
            this.slugChanged = true;

            if(!this.post.slug) {
                this.slugOk = false;
                return;
            }

            this.slugIsChecking = true;
            axios.post('/admin/blog/test_slug', {
                slug: this.post.slug,
                id: this.post.id
            }).then(response => {
                const data = response.data;
                if(data.ok) {
                    this.slugOk = true;
                } else {
                    this.slugOk = false;
                    this.slugDupe = data;
                }
                this.slugIsChecking = false;
                this.slugChanged = true;
            }).catch(e => {
                console.log(e);
                alert("Error");
                this.slugIsChecking = false;
                this.slugChanged = true;
            });
            // this.slugOk = true;

        },
        save() {
            this.saving = true;

            if(!this.valid) {
                document.forms['general_post_form'].elements[Object.keys(this.validation).filter(x => !this.validation[x])[0]].focus();
                return;
            }

            this.isSaving = true;

            axios.post('/admin/blog/post', {
                post: this.post
            }).then(response => {
                const data = response.data;
                if(data.ok) {
                    this.$parent.openModal({
                        type: 'success',
                        title: 'Success',
                        body: this.post.id ? 'Main Post Data has Successfully been Updated!' : 'New Post has Successfully been Created!'
                    });

                    const post = data.post;
                    post.categories = data.categories;
                    this.post = post;

                } else {
                    this.$parent.openModal({
                        type: 'danger',
                        title: 'Error',
                        body: "Error Occurred During Saving Data. Try again later."
                    });
                }
                // console.log(response.data);
                this.isSaving = false;
            }).catch(err => {
                console.log(err);
                this.isSaving = false;
                this.$parent.openModal({
                    type: 'danger',
                    title: 'Error',
                    body: "Error Occurred During Saving Data. Try again later."
                });
            })
        }
    }
}
</script>

<style scoped>

</style>