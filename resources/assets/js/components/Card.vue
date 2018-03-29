<template>
    <div :class="`card ${cardClass}`" :id="id">

        <slot name="before-header"></slot>

        <div class="card-header" :class="{'separator' : separator}">
            <div class="card-title">
                {{ title}}
            </div>
            <div class="pull-right">
                <slot name="header-actions"></slot>
            </div>
        </div>

        <slot name="after-header"></slot>

        <slot name="before-block"></slot>

        <div class="card-block m-t-10">
            <slot></slot>
        </div>

        <slot name="after-block"></slot>

        <div class="card-progress" style="background-color: rgba(255, 255, 255, 0.8); display: block;" v-if="refresh">
            <div class="progress progress-small">
                <div class="progress-bar-indeterminate progress-bar-master"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            id: {
                type: String,
                default: 'card'
            },
            title: {
                type: String,
                default: 'Title'
            },

            cardClass: {
                type: String,
                default: 'card-default'
            },

            separator: {
                type: Boolean,
                default: true
            }
        },

        computed: {
            refresh() {
                return this.$store.state.cardRefresh
            }
        },
    }
</script>