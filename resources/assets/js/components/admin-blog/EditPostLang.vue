<script>
export default {
    props: ['_content'],
    data() {
        return {
            content: JSON.parse(this._content),
        }
    }
}
</script>

<style scoped>

</style>