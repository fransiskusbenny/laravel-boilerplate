<template>
    <div>
        <base-table-actions ref="tableActions" :data="data">
            <h5 class="text-primary">Action {{ data.name }}</h5>
            <br>
            <a href="#" class="btn btn-default btn-block">View</a>
            <a :href="`/settings/users/${data.id}/edit`" class="btn btn-default btn-block">
                Edit
            </a>
            <button type="button"
                    class="btn btn-default btn-block"
                    v-if="data.id !== 1 && !data.active"
                    @click="activate"
            >
                Activate
            </button>
            <button type="button"
                    class="btn btn-default btn-block"
                    v-if="data.id !== 1 && data.active"
                    @click="deactivate"
            >
                Deactivate
            </button>
            <button type="button" class="btn btn-default btn-block"
                    data-toggle="modal" data-target="#change_password"
                    v-if="data.id !== 1"
            >
                Change Password
            </button>
            <button type="button"
                    class="btn btn-default btn-block"
                    @click="destroy"
                    v-if="data.id !== 1"
            >
                Delete
            </button>
        </base-table-actions>
        <modal type="slide-up" id="change_password">
            <h5 slot="header">Change Password {{ data.name }}</h5>
            <div class="text-left">
                <div class="alert alert-danger" v-if="changePasswordData.error">
                    <button type="button" class="close" @click="changePasswordData.error = false"></button>
                    <strong><i class="icon fa fa-ban"></i> {{ changePasswordData.error.message }}</strong>
                    <ul>
                        <li v-for="error in changePasswordData.error.lists" v-text="error"></li>
                    </ul>
                </div>
                <div class="form-group-attached">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input type="password" class="form-control" v-model="changePasswordData.password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Password Confirmation</label>
                                <input type="password" class="form-control"
                                       v-model="changePasswordData.password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div slot="footer" class="modal-footer">
                <button type="button" class="btn btn-complete" @click="changePassword">
                    Update Password
                </button>
            </div>
        </modal>
    </div>
</template>

<script>
    import BaseTableActions from '../../../components/datatable/BaseTableActions'

    export default {
        components: {
            BaseTableActions
        },

        data() {
            return {
                data: false,
                changePasswordData: {
                    error: false,
                    password: '',
                    password_confirmation: ''
                }
            }
        },

        methods: {
            destroy() {
                this.$store.dispatch('destroy', `/settings/users/${this.data.id}`)
                    .then(() => {
                        $('#table_actions').modal('hide')
                    })
            },

            changePassword() {
                let user = this.data,
                    payload = {
                        endpoint: `/settings/users/${user.id}/change_password`,
                        method: 'patch',
                        message: 'Are you sure you want to this action?',
                        data: this.changePasswordData
                    }

                this.$store.dispatch('submit', payload).then(({data}) => {
                    $(`#change_password`).modal('hide')
                    this.changePasswordData = {
                        password: '',
                        password_confirmation: '',
                        error: false
                    }
                    this.$flash(data.message, 'success')
                }).catch(err => {
                    if (err.response.status === 422) {
                        this.changePasswordData.error = {
                            lists: _.flatten(_.toArray(err.response.data.errors)),
                            message: err.response.data.message
                        }
                    }
                })
            },

            getEditPath() {
                return `/settings/users/${this.data.id}/edit`
            },

            activate() {
                let user = this.data,
                    payload = {
                        endpoint: `/settings/users/${user.id}/activate`,
                        method: 'post',
                        message: 'Are you sure you want to this action?',
                    }

                this.$store.dispatch('submit', payload).then(({data}) => {
                    if (data.path) {
                        window.location.replace(data.path)
                    }
                })
            },

            deactivate() {
                let user = this.data,
                    payload = {
                        endpoint: `/settings/users/${user.id}/deactivate`,
                        method: 'post',
                        message: 'Are you sure you want to this action?',
                    }

                this.$store.dispatch('submit', payload).then(({data}) => {
                    if (data.path) {
                        window.location.replace(data.path)
                    }
                })
            }
        }
    }
</script>