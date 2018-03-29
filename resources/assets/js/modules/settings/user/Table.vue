<template>
    <card title="Manage User" :separator="false" card-class="card-transparent">

        <a slot="header-actions" :href="createUrl" class="btn btn-primary" data-toggle="tooltip" data-title="Add User">
            <i class="fa fa-plus fa-fw"></i>Add User
        </a>

        <data-table url="/api/users" :fields="fields" @rowClicked="showActions"></data-table>

        <table-actions ref="tableActions"></table-actions>
    </card>
</template>

<script>
    import DataTable from '../../../components/datatable/Index'
    import moment from 'moment'
    import TableActions from './TableActions'

    export default {
        components: {DataTable, TableActions},
        props: {
            createUrl: {
                type: String,
                required: true,
            }
        },

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
                        title: 'Name',
                        sortField: 'name'
                    },
                    {
                        name: 'username',
                        title: 'Username',
                        sortField: 'username'
                    },
                    {
                        name: 'email',
                        title: 'Email',
                        sortField: 'email'
                    },
                    {
                        name: 'active',
                        title: 'Status',
                        titleClass: 'text-center',
                        dataClass: 'text-center',
                        sortField: 'active',
                        callback: value => {
                            return value ? '<span class="label label-success">ACTIVE</span>'
                                : '<span class="label label-important">INACTIVE</span>'
                        }
                    },
                    {
                        name: 'created_at',
                        title: 'Created At',
                        dataClass: 'text-center',
                        titleClass: 'text-center',
                        sortField: 'created_at',
                        callback: value => {
                            return moment(value).format('DD-MM-YYYY HH:mm')
                        }
                    },
                    {
                        name: 'updated_at',
                        title: 'Updated At',
                        dataClass: 'text-center',
                        titleClass: 'text-center',
                        sortField: 'updated_at',
                        callback: value => {
                            return moment(value).format('DD-MM-YYYY HH:mm')
                        }
                    },
                ],
            }
        },

        methods: {
            showActions(data) {
                this.$refs.tableActions.data = data
                $('#table_actions').modal('show')
            }
        }
    }
</script>