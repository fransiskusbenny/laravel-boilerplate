<template>
    <card :title="preset.formTitle">
        <!--Form content-->
        <form method="post" :class="preset.formClass" role="form" autocomplete="off">

            <div class="alert alert-danger" v-if="error">
                <button type="button" class="close" @click="clearErrors"></button>
                <strong><i class="icon fa fa-ban"></i> {{ error.message }}</strong>
                <ul>
                    <li v-for="value in error.lists" v-text="value"></li>
                </ul>
            </div>

            <slot name="before-content"></slot>

            <slot></slot>

            <slot name="after-content"></slot>

            <!--Button-->
            <div class="text-center">

                <!--Button Submit-->
                <button type="button" class="btn btn-primary" @click="submit">
                    <i class="fa fa-save"></i> Submit
                </button>

                <!--Button Cancel-->
                <button type="button" class="btn btn-warning" @click="cancel">
                    <i class="fa fa-ban"></i> Cancel
                </button>
            </div>
        </form>
    </card>
</template>

<script>
    import {_alert_warning} from '../utils/alert'

    export default {
        props: {
            preset: {
                default: () => {
                    return {
                        cancelUrl: '#',
                        formClass: '',
                        formTitle: '',
                        method: 'post',
                        endpoint: '',
                    }
                }
            },

            data: {
                required: true
            }
        },

        data() {
            return {
                error: false,
            }
        },

        methods: {
            submit() {
                let {endpoint, method, message} = this.preset,
                    data = this.data,
                    payload = {
                        endpoint, method, message, data
                    }

                this.$store.dispatch('submit', payload).then(res => {
                    if (res.data.path) {
                        window.location.replace(res.data.path)
                    }
                }).catch(err => {
                    if (err.response.status === 422) {
                        window.scroll(0, 0)
                        this.displayError(err.response.data)
                    }
                })
            },

            cancel() {
                _alert_warning('Are you sure you want to leave this page ?')
                    .then(result => {
                        if (result.value) {
                            window.location.replace(this.preset.cancelUrl)
                        }
                    })
            },

            displayError({errors, message}) {
                this.error = {
                    message,
                    lists: _.flatten(_.toArray(errors))
                }
            },

            clearErrors() {
                this.error = false
            }
        }
    }
</script>