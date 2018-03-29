<template>
    <a href="#" @click.prevent="destroy">Delete</a>
</template>

<script>
    export default {
        props: ['rowData', 'rowIndex'],

        methods: {
            destroy() {
                this.$store.dispatch('destroy', '/')
                    .then(res => {
                        console.log('hello world')
                    })
                    .catch(err => {

                    })
            }
        }
    }
</script>