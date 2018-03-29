<template>
    <div class="modal fade slide-right show" id="table_actions" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            @click="$parent.data = false">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                            <div class="modal-body col-xs-height col-middle text-center" v-if="data">
                                <slot></slot>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                default: false
            },
            id: {
                type: String,
                default: 'table_actions'
            }
        },

        mounted() {
            let vm = this;
            $(`#${vm.id}`).on('hide.bs.modal',() => { vm.$parent.data = false })
        },
    }
</script>