<template>
    <base-form :preset="preset" :data="data">
        <h5>Basic Info</h5>
        <div class="row">
            <!--Name-->
            <div class="col-sm-6">
                <div class="form-group form-group-default required">
                    <label>Name</label>
                    <input type="text" class="form-control" v-model="data.name">
                </div>
            </div>
            <!--Username-->
            <div class="col-sm-6">
                <div class="form-group form-group-default required">
                    <label>Username</label>
                    <input type="text" class="form-control" v-model="data.username">
                </div>
            </div>
        </div>
        <!--Email-->
        <div class="form-group form-group-default required">
            <label>Email</label>
            <input type="text" class="form-control" v-model="data.email">
        </div>
        <div class="row">
            <!--Password-->
            <div class="col-sm-4">
                <div class="form-group form-group-default required">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="data.password">
                </div>
            </div>
            <!--Password Confirmation-->
            <div class="col-sm-4">
                <div class="form-group form-group-default required">
                    <label>Password Confirmation</label>
                    <input type="password" class="form-control" v-model="data.password_confirmation">
                </div>
            </div>
            <!--Active-->
            <div class="col-sm-4">
                <div class="form-group form-group-default input-group">
                    <div class="form-input-group">
                        <label class="inline">Active</label>
                    </div>
                    <div class="input-group-addon bg-transparent h-c-50">
                        <input type="checkbox" data-init-plugin="switchery"
                               data-size="small" checked="checked"
                               v-model="data.active"
                        />
                    </div>
                </div>
            </div>
        </div>

        <h5>Abilities</h5>
        <div class="card-group horizontal" id="abilities" role="tablist" aria-multiselectable="true">
            <div class="card card-default m-b-0">
                <div class="card-header " role="tab" id="headingOne">
                    <h4 class="card-title">
                        <a data-toggle="collapse" data-parent="#abilities" href="#collapseOne" aria-expanded="false"
                           aria-controls="collapseOne" class="collapsed">
                            Roles
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="collapse" aria-expanded="false">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-3" v-for="chunkedRoles in dataRoles">
                                <div class="checkbox check-primary" v-for="role in chunkedRoles">
                                    <input type="checkbox"
                                           v-model="data.roles"
                                           :value="role.id"
                                           :id="`role${role.id}`"
                                    >
                                    <label :for="`role${role.id}`" v-text="role.name"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-default m-b-0">
                <div class="card-header " role="tab" id="headingTwo">
                    <h4 class="card-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#abilities" href="#collapseTwo"
                           aria-expanded="false" aria-controls="collapseTwo">
                            Permissions
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="collapse" aria-expanded="false">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-4" style="padding-left: 0;" v-for="chunkedPermissions in dataPermissions">
                                <div class="checkbox check-primary" v-for="permission in chunkedPermissions">
                                    <input type="checkbox"
                                           v-model="data.permissions"
                                           :value="permission.id"
                                           :id="`permission${permission.id}`"
                                    >
                                    <label :for="`permission${permission.id}`" v-text="permission.name"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </base-form>
</template>

<script>
    import BaseForm from "../../../components/BaseForm";

    export default {
        components: {BaseForm},

        props: {
            preset: {
                default: () => {
                    return {
                        cancelUrl: '/settings/users',
                        formTitle: 'Add New User',
                        method: 'post',
                        endpoint: '/settings/users'
                    }
                }
            },
            data: {
                default: () => {
                    return {
                        name: '',
                        username: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                        active: true,
                        roles: [],
                        permissions: [],
                    }
                }
            }
        },

        data() {
            return {
                dataRoles: [],
                dataPermissions: []
            }
        },

        mounted() {
            this.fetchRoles()
            this.fetchPermissions()
        },

        methods: {
            fetchRoles() {
                window.axios.get('/api/roles')
                    .then(res => {
                        this.dataRoles = _.chunk(res.data, 4)
                    })
            },

            fetchPermissions() {
                window.axios.get('/api/permissions')
                    .then(res => {
                        this.dataPermissions = _.chunk(res.data, 4)
                    })
            }
        }
    }
</script>