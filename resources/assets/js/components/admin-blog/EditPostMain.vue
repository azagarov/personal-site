<script>
export default {
    data() {
        return {
            modal: {}
        }
    },
    methods: {
        openModal(params) {
            this.modal = params;
            $("#post-modal").modal('show');
        }
    }
}
</script>

<style scoped>

</style>