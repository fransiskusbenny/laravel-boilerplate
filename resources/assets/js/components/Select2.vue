<template>
    <select class="full-width">
        <slot></slot>
    </select>
</template>

<script>
    export default {
        props: {
            value: {
                default: null
            },
            options: {
                type: Array,
                required: true,
            },
            label: {
                type: String,
                default: 'name'
            },
            id: {
                type: String,
                default: 'id'
            }
        },

        mounted() {
            let vm = this
            $(this.$el)
                .select2({data: vm.getData()})
                .val(vm.value)
                .on('change', (e) => {
                    vm.$emit('input', e.target.value)
                })
        },

        watch: {
            value(value) {
                $(this.$el).val(value).trigger('change')
            },

            options() {
                $(this.$el).select2({data: this.getData()})
            }
        },

        destroyed: function () {
            $(this.$el).off().select2('destroy')
        },

        methods: {
            getData() {
                let options = this.options,
                    label = this.label,
                    id = this.id

                return options.map(option => {
                    return {
                        id: option[id],
                        text: option[label],
                    }
                })
            }
        }
    }
</script>

<style>
    .modal-open .select2-dropdown {
        z-index: 10060;
    }

    .modal-open .select2-close-mask {
        z-index: 10055;
    }
</style>