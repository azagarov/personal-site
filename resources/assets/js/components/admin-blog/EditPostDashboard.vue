<script>
export default {
    data() {
        return {
            unsaved: {
                main: false,
                en: false,
                es: false,
                ru: false,
            },
            hasSaved: false
        }
    },
    computed: {
        isSaving() {
            return this.$parent.$refs.main.isSaving;
        },
        changed() {
            return !this.$parent.postId || this.unsaved.main;
        },
        status: {
            get() {
                return this.$parent.$refs.main.post.status;
            },
            set(v) {
                this.$parent.$refs.main.post.status = v;
            }
        }
    },

    watch: {
        unsaved: {
            handler(_new, _old) {
                if(Object.values(this.unsaved).reduce((c, x) => (c || x), false)) {
                    this.hasSaved = false;
                }
            },
            deep:true
        }
        /*
        hasSaved(_new, _old) {
            // console.log(_new, _old);
            if(_new) {
                setTimeout(() => {
                    this.hasSaved = false;
                }, 3000);
            }
        }
        */
    },

    methods: {
        save() {
            this.$parent.$refs.main.save().then(post => {
                this.unsaved.main = false;
                this.hasSaved = true;
            }).catch(e => {
                switch(e.code) {
                    case 0: // Form Errors
                        //do nothing
                        break;

                    default:
                        this.$parent.openModal({
                            type: 'danger',
                            title: 'Error',
                            body: "Error Occurred During Saving Data. Try again later."
                        });
                        break;
                }
            });
        }
    }
}
</script>

<style scoped>

</style>