<template>
    <card title="Manage Application Menu" card-class="card-transparent">
        <button slot="header-actions" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#form-create">
            <i class="fa fa-plus fa-fw"></i> Add Menu
        </button>
        <div class="row">
            <div class="col-sm-5">
                <list-menu :menus="menus" @nodeClick="fillForm"></list-menu>
            </div>

            <div class="col-sm-7">
                <form-menu
                        ref="form"
                        method="patch"
                        :data="formEdit"
                        :menu-options="menuOptions"
                        :data-permissions="dataPermissions"
                        :endpoint="formEdit.endpoint"
                        button-text="Update Menu"
                        :destroy-button="true"
                ></form-menu>
            </div>
        </div>

        <!--Form Create-->
        <modal id="form-create">
            <h5>Add New Application Menu</h5>
            <form-menu :menu-options="menuOptions" :data-permissions="dataPermissions"></form-menu>
        </modal>
    </card>
</template>

<script>
    import ListMenu from './List'
    import FormMenu from './Form'

    export default {
        components: {ListMenu, FormMenu},

        props: ['menus'],

        data() {
            return {
                formEdit: {},
                formCreate: {
                    name: '',
                },
                menuOptions: [],
                dataPermissions: [],
            }
        },

        mounted() {
            this.fetchMenuOptions()
            this.getPermissions()
        },

        methods: {
            fetchMenuOptions() {
                window.axios.get('/api/menus')
                    .then(res => {
                        this.menuOptions = res.data
                    })
            },

            getPermissions() {
                window.axios.get('/api/permissions')
                    .then(res => {
                        this.dataPermissions = res.data
                    })
            },

            fillForm({model}) {
                this.formEdit = {
                    ...model.menu,
                    parent: model.menu.parent_id,
                    endpoint: `/settings/menus/${model.menu.id}`,
                    permission: model.permission ? model.permission.id : null
                }
            }
        }
    }
</script>
