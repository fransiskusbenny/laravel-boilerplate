<template>
    <form method="post" @submit.prevent="submit">
        <div class="form-group form-group-default required">
            <label>Menu Name</label>
            <input type="text" class="form-control" v-model="data.name">
        </div>

        <div class="form-group form-group-default form-group-default-select2 required">
            <label>Parent Menu</label>
            <select2 v-model="data.parent" :options="[]">
                <option value="">Root</option>
                <option v-for="menu in menuOptions" :value="menu.id">{{ menu.name }}</option>
            </select2>
        </div>

        <div class="form-group form-group-default">
            <label>URL</label>
            <input type="text" class="form-control" v-model="data.url">
        </div>
        <div class="form-group form-group-default">
            <label>Icon</label>
            <input type="text" class="form-control" v-model="data.icon">
        </div>
        <div class="form-group form-group-default">
            <label>Order</label>
            <input type="number" class="form-control" v-model="data.order">
        </div>

        <div class="form-group form-group-default form-group-default-select2">
            <label>Permissions</label>
            <select2 v-model="data.permission" :options="[]">
                <option value="">No Permissions</option>
                <option v-for="permission in dataPermissions" :value="permission.id">{{ permission.name }}</option>
            </select2>
        </div>


        <button class="btn btn-complete btn-cons" type="submit" :disabled="disabledButton">
            <i class="fa fa-save fa-fw"></i> {{ buttonText }}
        </button>

        <button v-if="destroyButton" class="btn btn-danger btn-cons" type="button" @click="destroy"
                :disabled="disabledButton">
            <i class="fa fa-trash fa-fw"></i> Delete
        </button>
    </form>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Selectize from '../../../components/Selectize'

    export default {
        components: {Multiselect, Selectize},

        props: {
            buttonText: {
                type: String,
                default: 'Save Menu'
            },
            menuOptions: {
                required: true,
            },
            method: {
                type: String,
                default: 'post',
            },
            endpoint: {
                type: String,
                default: '/settings/menus'
            },
            dataPermissions: {
                required: true,
            },
            data: {
                default: () => {
                    return {
                        name: '',
                        parent: '',
                        url: '',
                        icon: '',
                        order: '',
                        permission: ''
                    }
                }
            },
            destroyButton: {
                default: false
            }
        },

        computed: {
            disabledButton() {
                return this.method === 'patch' && !this.data.id
            }
        },

        data() {
            return {
                errors: [],
                options: ['list', 'of', 'options']
            }
        },

        methods: {
            submit() {
                window.axios[this.method](this.endpoint, this.data)
                    .then(res => {
                        if (res.data.path) {
                            window.location.replace(res.data.path)
                        }
                    })
            },

            destroy() {
                window.axios.delete(this.endpoint)
                    .then(res => {
                        if (res.data.path) {
                            window.location.replace(res.data.path)
                        }
                    })
            }
        }
    }
</script>