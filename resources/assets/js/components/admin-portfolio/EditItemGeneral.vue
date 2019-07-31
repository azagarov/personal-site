<script>
import df from "dateformat";

export default {
    props: ['_id'],
    mounted() {
        // $(".select2").select2()
        //     .trigger('change')
        //     .on('change', ev => {
        //         this.post.categories = $(ev.target).select2('data').map(x => parseInt(x.id));
        //     });

        // $('#date_occurred').datepicker({
        //     autoclose: true
        // }).on('changeDate clearDate', ev => {
        //     this.post.date_occurred = $(ev.target).val();
        // });

        this.slugTimer = false;

        if(this._id) {
            axios.get("/admin/portfolio/item/" + this._id).then(response => {
                const _item = response.data.item;
                let hasDraft = false;
                Object.keys(response.data.draft).forEach(x => {
                    switch(x) {
                    }
                    _item[x] = response.data.draft[x];
                    hasDraft = true;
                });
                this.item = _item;
                this.updateOuterDom();

                this.$parent.$refs.dashboard.unsaved.main = hasDraft;

                this.$parent.hasItemId = true;
                // $('#date_occurred').datepicker('update', this.post.date_occurred);
                // $(".select2.categories").val(this.post.categories).trigger('change');

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
            item: {
                status: 'private'
            },
            saving: false,
            isSaving: false,

            slugChanged: false,
            slugOk: true,
            slugIsChecking: false,
            slugDupe: {},

            slugTimer: null,

            draftTimers: {},
            draftSavings: {},
        }
    },

    computed: {
        itemId: {
            get() {
                return this.item.id;
            },
            set(v) {
                this.item.id = v;
            }
        },

        slug() {
            return this.item.slug;
        },

        valid() {
            return Object.values(this.validation).reduce((c, x) => c && x, true);
        },
        validation() {
            return {
                slug: !!this.item.slug && this.slugOk
            }
        },
        errors() {
            let _slug = "This field can't be empty";

            if(this.item.slug && this.slugChanged && !this.slugOk) {
                _slug = "This slug is already used by ";
                _slug += this.slugDupe.type + " '" + this.slugDupe.title + "'.";
                _slug += "Please select another one.";
            }
            return {
                slug: _slug
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
        itemId(val, old) {
            this.$parent.hasItemId = true;
            return val;
        },

        item: {
            handler(_new, _old) {
                if(_new == _old) {
                    this.$parent.$refs.dashboard.unsaved.main = true;
                }
            },
            deep: true
        },

        'item.keywords' : {
            handler(_new, _old) {
                this.handleDataUpdate('keywords', _new);
            }
        },
        'item.slug' : {
            handler(_new, _old) {
                this.handleDataUpdate('slug', _new);
            }
        }
    },
    methods: {
        checkSlug() {
            this.slugChanged = true;

            if(!this.item.slug) {
                this.slugOk = false;
                return;
            }

            this.slugIsChecking = true;
            axios.post('/admin/portfolio/test_slug', {
                slug: this.item.slug
            }).then(response => {
                const data = response.data;

                this.slugChanged = true;
                this.slugIsChecking = false;

                if(data.type == 'not_found') {
                    this.slugOk = true;
                } else if(data.type == 'item' && data.id == this.item.id) {
                    this.slugChanged = false;
                    this.slugOk = true;
                } else{
                    this.slugOk = false;
                    this.slugDupe = data;
                }
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

            this.slugTimer = false;

            return new Promise((resolve, reject) => {
                if(!this.valid) {
                    document.forms['general_item_form'].elements[Object.keys(this.validation).filter(x => !this.validation[x])[0]].focus();
                    return reject({code:0});
                }

                this.isSaving = true;

                axios.post('/admin/portfolio/item/'+this.itemId, {
                    item: this.item
                }).then(response => {
                    const data = response.data;

                    setTimeout(() => {
                        this.slugTimer = true;
                    }, 1000);

                    if(data.ok) {

                        // Update Header Data that is not under Vue control

                        if(!this.item.id) {
                            window.history.replaceState({}, '', "/admin/portfolio/edit-item/" + data.item.id);
                        }
                        this.updateOuterDom();

                        this.item = data.item;

                        this.isSaving = false;
                        return resolve(this.item);
                    } else {
                        this.isSaving = false;
                        // console.log(data);
                        return reject({code:1});
                    }
                    // console.log(response.data);
                }).catch(err => {
                    this.isSaving = false;
                    // console.log(err);
                    setTimeout(() => {
                        this.slugTimer = true;
                    }, 1000);

                    return reject({code:2});
                });
            });
        },

        handleDataUpdate(field, value) {
            if(!this.itemId) return;

            clearTimeout(this.draftTimers[field]);
            if(true === this.draftSavings[field]) return;
            if(!this.slugTimer) return;

            this.draftTimers[field] = setTimeout(() => {

                this.draftSavings[field] = true;

                axios.post('/admin/portfolio/item/'+this.itemId+'/draft/'+field, {
                    value: value
                }).then(response => {
                    this.draftSavings[field] = false;
                    console.log(response.data);
                }).catch(e => {
                    this.draftSavings[field] = false;
                    console.log(e);
                });
            }, 2000);
        },

        updateOuterDom() {
            $("#bc_part").html("Edit Portfolio Item #" + this.item.id);
            $("#title_part").html("#" + this.item.id + " [" + this.item.slug + "]");

        }
    }
}
</script>

<style scoped>

</style>