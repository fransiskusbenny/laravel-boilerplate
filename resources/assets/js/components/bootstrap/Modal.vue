<template>
    <div :class="`modal fade ${type}`" role="dialog" aria-hidden="true">
        <div :class="`modal-dialog ${size}`">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <a href="#" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </a>

                    <slot name="header"></slot>
                </div>

                <div class="modal-body">
                    <slot></slot>
                </div>

                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: null
            },
            size: {
                type: String,
                default: null,
            }
        }
    }
</script>