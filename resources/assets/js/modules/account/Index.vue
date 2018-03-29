<template>
    <base-form :preset="preset" :data="data">
        <div class="form-group form-group-default required ">
            <label>Name</label>
            <input type="text" class="form-control" v-model="data.name">
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group form-group-default required ">
                    <label>Username</label>
                    <input type="text" class="form-control" v-model="data.username">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group form-group-default required ">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="data.email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group form-group-default">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="data.password">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group form-group-default">
                    <label>Password Confirmation</label>
                    <input type="password" class="form-control" v-model="data.password_confirmation">
                </div>
            </div>
        </div>
    </base-form>
</template>

<script>
    import BaseForm from '../../components/BaseForm'

    export default {
        components: {BaseForm},

        props: {
            user: {
                required: true
            }
        },

        data() {
            return {
                preset: {
                    cancelUrl: '/account',
                    formClass: '',
                    formTitle: 'Update Your Account',
                    method: 'patch',
                    endpoint: '/account',
                },

                data: {}
            }
        },

        mounted() {
            let {name, username, email} = this.user

            this.data = {
                name, username, email
            }
        }
    }
</script>