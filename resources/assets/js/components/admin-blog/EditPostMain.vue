<script>
export default {
    data() {
        return {
            hasPostId: false,
            x: null,
            modal: {}
        }
    },
    methods: {
        openModal(params) {
            this.modal = params;
            $("#post-modal").modal('show');
        },
        updatePostId() {
            this.x = this.$refs.main.postId;
        }
    },
    computed: {
        postId() {
            return this.$refs.main.postId;
        }
    }
}
</script>

<style scoped>

</style>