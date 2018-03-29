<template>
    <div>
        <div class="table-responsive">
            <vuetable ref="vuetable"
                      :api-url="url"
                      :track-by="trackBy"
                      :fields="fields"
                      :css="css.table"
                      pagination-path=""
                      :per-page="perPage"
                      :sort-order="sortOrder"
                      :append-params="moreParams"
                      :http-options="httpOptions"
                      @vuetable:pagination-data="onPaginationData"
                      @vuetable:row-clicked="onRowClicked"
                      @vuetable:loading="onLoading"
                      @vuetable:load-success="onLoadSuccess"
                      @vuetable:load-error="onLoadError"
            >
                <slot name="table-slots"></slot>
            </vuetable>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <vuetable-pagination-info ref="paginationInfo"></vuetable-pagination-info>
            </div>
            <div class="col-sm-9">
                <pagination ref="pagination" @vuetable-pagination:change-page="onChangePage"></pagination>
            </div>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable'
    // import TableQuickSearch from './TableQuickSearch.vue'
    // import TablePerPageDropdown from './TablePerPageDropdown.vue'
    import Pagination from './Pagination'
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo';

    export default {
        components: {
            // TableQuickSearch,
            // TablePerPageDropdown,
            Pagination,
            Vuetable,
            VuetablePaginationInfo
        },

        props: {
            id: {
                type: String,
                default: 'table',
            },
            title: {
                type: String,
            },
            url: {
                required: true,
                type: String,
            },

            fields: {
                required: true,
                type: Array,
            },

            trackBy: {
                default: 'id',
                type: String,
            },

            sortOrder: {
                default: () => {
                    return []
                },
                type: Array,
            },

            moreParams: {
                default: () => {
                    return {pagination: true}
                },
                type: Object,
            },
            perPage: {
                default: 15
            },

            detailRowComponent: {
                type: String
            },
        },

        data() {
            return {
                httpOptions: {
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    }
                },
                css: {
                    table: {
                        sortableIcon: 'fa fa-unsorted',
                        tableClass: 'table table-hover',
                        ascendingIcon: 'fa fa-sort-up',
                        descendingIcon: 'fa fa-sort-down'
                    },
                },
            }
        },

        computed: {
            reload() {
                return this.$store.state.tableReload
            }
        },

        watch: {
            reload(value) {
                if (value) {
                    this.$refs.vuetable.reload()
                    this.$store.commit('toggleTableReload')
                }
            }
        },

        methods: {
            onPaginationData(paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)
            },

            onChangePage(page) {
                this.$refs.vuetable.changePage(page)
            },

            onChangePerPage(data) {
                this.moreParams.per_page = data.per_page;
                this.$refs.vuetable.refresh();
            },

            onRowClicked(data) {
                this.$emit('rowClicked', data)
            },

            search(query) {
                this.$refs.vuetable.refresh()
            },

            onLoading() {
                this.$store.commit('cardLoading')
            },

            onLoadSuccess() {
                this.$store.commit('cardUnloading')
            },

            onLoadError() {
                let message = "<strong>Whoops, something went wrong</strong>!!<br/> " +
                    "Try refreshing the page, or going back and attempting the action again.<br> " +
                    "Please contact your site Administrator if this problem persists."

                this.$flash(message, 'danger', 'simple', 5000, 'top-right')

                this.$store.commit('cardUnloading')
            }
        }
    }
</script>