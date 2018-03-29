<script>
    export default {
        mounted() {
            this.$nextTick(() => {
                $('body').pgNotification({
                    message: 'Hello',
                    type: 'info',
                    style: 'simple',
                    timeout: 0,
                    position: 'top-right'
                }).show();
            })
        }
    }
</script>