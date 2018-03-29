<template>
    <card title="Manage Application Permission" :separator="false" card-class="card-transparent">

        <a slot="header-actions" href="#" class="btn btn-primary">
            <i class="fa fa-plus fa-fw"></i>Add Permission
        </a>

        <data-table url="/api/permissions" :fields="fields"></data-table>
    </card>
</template>

<script>
    import DataTable from '../../../components/datatable/Index'
    import TableActions from './TableActions'

    Vue.component('table-actions-permission', TableActions)

    export default {
        components: {DataTable, TableActions},

        data() {
            return {
                fields: [
                    {
                        name: '__sequence',
                        title: '#',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        width: '45px'
                    },
                    {
                        name: 'name',
                        title: 'Permission Name',
                        sortField: 'name'
                    },
                    {
                        name: 'users_count',
                        title: 'Users Count',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        sortField: 'users_count'
                    },
                    {
                        name: 'roles_count',
                        title: 'Roles Count',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        sortField: 'roles_count'
                    },
                    {
                        name: 'created_at',
                        title: 'Created At',
                        sortField: 'created_at'
                    },
                    {
                        name: 'updated_at',
                        title: 'Updated At',
                        sortField: 'updated_at'
                    },
                    {
                        name: '__component:table-actions-permission',
                        title: 'Actions',
                        titleClass: 'text-center',
                        dataClass: 'text-center'
                    },
                ],
            }
        },
    }
</script>