<template>
    <select class="full-width"></select>
</template>

<script>
    import $ from 'jquery'
    import 'select2'

    export default {
        props: {
            value : {
                default: null
            },
            url: {
                type: String,
                required: true
            },
            per_page: {
                type: Number,
                default: 15
            },
            label: {
                type: String,
                default: 'name',
            },
            id: {
                type: String,
                default: 'id'
            }
        },

        data() {
            return {
                selected: null,
            }
        },

        mounted() {
            let vm = this

            this.selected = this.value

            let el = $(this.$el)

            el.select2({
                ajax: {
                    url: vm.url,
                    dataType: 'json',
                    delay: 250,
                    data: params => {
                        return {
                            q: params.term,
                            per_page: 15,
                            page: 1
                        }
                    },
                    processResults: ({data}, params) => {
                        let results = data.map(data => {
                            return {
                                id: data[vm.id],
                                text: data[vm.label],
                                data
                            }
                        })
                        return {
                            results,
                            pagination: {
                                more: (params.page * this.per_page) < data.total
                            }
                        };
                    },
                },
                cache: true,
                delay: 250,
            })
            .on('select2:select', e => {
                this.selected = e.params.data.data
                vm.$emit('input', this.selected)
            })
            .on('change.select2', e => {
                vm.$emit('select', this.selected)
            })

            let value = this.value,
                label = this.label,
                id = this.id

            if (value) {
                let newOption = new Option(value[label], value[id], true, true);

                el.append(newOption).trigger('change')
            }
        },

        destroyed: function () {
            $(this.$el).off().select2('destroy')
        },
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