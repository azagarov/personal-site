<script>
import df from "dateformat";

export default {
    props: ['_id'],
    mounted() {
        $(".select2").select2()
            .trigger('change')
            .on('change', ev => {
                this.post.categories = $(ev.target).select2('data').map(x => parseInt(x.id));
            });

        $('#date_occurred').datepicker({
            autoclose: true
        }).on('changeDate clearDate', ev => {
            this.post.date_occurred = $(ev.target).val();
        });

        this.slugTimer = false;

        if(this._id) {
            axios.get("/admin/blog/post/" + this._id).then(response => {
                this.post = response.data;
                this.$parent.hasPostId = true;
                $('#date_occurred').datepicker('update', this.post.date_occurred);
                $(".select2.categories").val(this.post.categories).trigger('change');
                setTimeout(() => {
                    this.slugTimer = true;
                }, 1000);
            }).catch(e => {
                console.log(e);
            });
        } else {
            this.slugTimer = true;
        }

    },
    data() {
        // alert(this._categories);
        // const _p = JSON.parse(this._post);
        // if(_p.date_occurred)
        //     _p.date_occurred = df(new Date(Date.parse(_p.date_occurred)), "mm/dd/yyyy");

        // _p.categories = JSON.parse(this._categories);

        return {
            post: {
                categories: [],
                status: 'private',
                main_order: 0,
            },
            saving: false,
            isSaving: false,

            slugChanged: false,
            slugOk: true,
            slugIsChecking: false,
            slugDupe: {},

            slugTimer: null,
        }
    },

    computed: {
        postId: {
            get() {
                return this.post.id;
            },
            set(v) {
                this.post.id = v;
            }
        },
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
            // console.log("Occurred", this.slugTimer);
            if(false !== this.slugTimer) {
                clearTimeout(this.slugTimer);
                this.slugTimer = setTimeout(() => {
                    this.checkSlug();
                }, 2000);
            }
            return val;
        },
        postId(val, old) {
            this.$parent.hasPostId = true;
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

            axios.post('/admin/blog/post/'+this.postId, {
                post: this.post
            }).then(response => {
                const data = response.data;
                if(data.ok) {
                    this.$parent.openModal({
                        type: 'success',
                        title: 'Success',
                        body: this.post.id ? 'Main Post Data has Successfully been Updated!' : 'New Post has Successfully been Created!'
                    });

                    if(!this.post.id) {
                        window.history.replaceState({}, '', "/admin/blog/edit-post/" + data.post.id);
                        $("#bc_part").html("Edit Post #" + data.post.id);
                    }
                    $("#title_part").html("#" + data.post.id + " [" + data.post.slug + "]");
                    this.post = data.post;
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