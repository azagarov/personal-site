<script>
export default {
    data() {
        return {
            hasItemId: false,
            x: null,
            modal: {}
        }
    },
    methods: {
        openModal(params) {
            this.modal = params;
            $("#post-modal").modal('show');
        },
        updateItemId() {
            this.x = this.$refs.main.itemId;
        }
    },
    computed: {
        itemId() {
            return this.$refs.main.itemId;
        }
    }
}
</script>

<style scoped>

</style>