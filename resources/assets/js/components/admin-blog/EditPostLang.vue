<script>
export default {
    props: ['_id', 'locale', 'lname'],
    data() {
        return {
            content: {},
            isSaving: false,
        }
    },
    mounted() {
        // alert(this._id);

        axios.get('/admin/blog/post/'+this._id+'/lang/'+this.locale).then(response => {
            this.content = response.data;
            CKEDITOR.replace('html_content_'+this.locale);
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
            axios.post('/admin/blog/post/'+this._id+'/lang/'+this.locale, {
                postId: this._id,
                locale: this.locale,
                content: this.content,

            }).then(response => {
                const data = response.data;
                console.log(data);
                this.$parent.openModal({
                    type: 'success',
                    title: 'Success',
                    body: this.lname + " Content has Successfully been Updated"
                });

                this.isSaving = false;
            }).catch(e => {
                this.isSaving = false;
                this.$parent.openModal({
                    type: 'danger',
                    title: 'Error',
                    body: "Error Occurred During Saving Data. Try again later."
                });
            });
        }
    }
}
</script>

<style scoped>

</style>