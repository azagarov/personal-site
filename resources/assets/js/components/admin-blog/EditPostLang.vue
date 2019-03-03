<script>
export default {
    props: ['_id', 'locale', 'lname'],
    data() {
        return {
            content: {},
            isSaving: false,
            hasSaved: false,
            changed: false,

            timersAreActive: null,
            draftTimers: {},
            draftSavings: {},
        }
    },
    mounted() {
        // alert(this._id);

        this.timersAreActive = false;
        axios.get('/admin/blog/post/'+this._id+'/lang/'+this.locale).then(response => {
            const _content = response.data.content;

            let hasDraft = false;
            Object.keys(response.data.draft).forEach(x => {
                switch(x) {
                    // case 'categories':
                    //     response.data.draft[x] = JSON.parse(response.data.draft[x]);
                    //     break;
                }
                _content[x] = response.data.draft[x];
                hasDraft = true;
            });

            // if(hasDraft) {
            //     this.$parent.$refs.dashboard.unsaved.main = true;
            // }

            this.content = _content;

            const editor = CKEDITOR.replace('html_content_'+this.locale);
            editor.on('change', ev => {
                this.content.html_content = editor.getData();
            });
            this.changed = hasDraft;

            setTimeout(() => {
                this.timersAreActive = true;
            }, 1000)

        }).catch(e => {
           console.log(e);
           alert('Error Loading Data');
        });
    },
    computed: {
        // postId() {
        //     return this.$parent.postId;
        // }
    },
    methods: {
        save() {
            this.isSaving = true;
            this.timersAreActive = false;
            axios.post('/admin/blog/post/'+this._id+'/lang/'+this.locale, {
                postId: this._id,
                locale: this.locale,
                content: this.content,

            }).then(response => {
                const data = response.data;
                // console.log(data);
                // this.$parent.openModal({
                //     type: 'success',
                //     title: 'Success',
                //     body: this.lname + " Content has Successfully been Updated"
                // });

                this.changed = false;
                this.hasSaved = true;

                this.isSaving = false;

                setTimeout(() => {
                    this.timersAreActive = true;
                }, 1000)

            }).catch(e => {
                this.isSaving = false;
                this.$parent.openModal({
                    type: 'danger',
                    title: 'Error',
                    body: "Error Occurred During Saving Data. Try again later."
                });

                setTimeout(() => {
                    this.timersAreActive = true;
                }, 1000)

            });
        },
        handleDataUpdate(field, value) {
// console.log("ever???", this._id, this.draftSavings[field], this.timersAreActive);
            if(!this._id) return;

            clearTimeout(this.draftTimers[field]);
            if(true === this.draftSavings[field]) return;
            if(!this.timersAreActive) return;

            this.draftTimers[field] = setTimeout(() => {

                this.draftSavings[field] = true;

                axios.post('/admin/blog/post/'+this._id+'/lang/'+this.locale+'/draft/'+field, {
                    value: value
                }).then(response => {
                    this.draftSavings[field] = false;
                    // console.log(response.data);
                }).catch(e => {
                    this.draftSavings[field] = false;
                    console.log(e);
                });
            }, 2000);
        }

    },
    watch: {
        content: {
            handler(_new, _old) {
                if(_new == _old) {
                    this.changed = true;
                    this.hasSaved = false;
                }
            },
            deep: true
        },

        "content.title": {
            handler(_new, _old) {
                this.handleDataUpdate('title', _new);
            }
        },
        "content.annotation": {
            handler(_new, _old) {
                this.handleDataUpdate('annotation', _new);
            }
        },
        "content.html_content": {
            handler(_new, _old) {
                this.handleDataUpdate('html_content', _new);
            }
        },
        "content.place_name": {
            handler(_new, _old) {
                this.handleDataUpdate('place_name', _new);
            }
        },
        "content.place_description": {
            handler(_new, _old) {
                this.handleDataUpdate('place_description', _new);
            }
        },

    }
}
</script>

<style scoped>

</style>