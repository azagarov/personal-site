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
        }
    },

    watch: {
        unsaved: {
            handler(_new, _old) {
                console.log(Object.values(this.unsaved).reduce((c, x) => (c || x), false));
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
            this.$parent.$refs.main.save();
        }
    }
}
</script>

<style scoped>

</style>