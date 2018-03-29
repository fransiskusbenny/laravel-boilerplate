<template>
    <ul v-if="tablePagination && tablePagination.last_page > 1" class="pagination justify-content-end">
        <li v-if="!isOnFirstPage" :class="['paginate_button', isOnFirstPage ? styles.disabledClass : '']">
            <a href="#" @click="loadPage(1)">
                <span :class="styles.icons.first"></span>
            </a>
        </li>
        <li v-if="!isOnFirstPage" :class="['paginate_button', isOnFirstPage ? styles.disabledClass : '']">
            <a href="#" @click="loadPage('prev')">
                <span :class="styles.icons.prev"></span>
            </a>
        </li>
        <template v-if="notEnoughPages">
            <template v-for="n in totalPage">
                <li :class="['paginate_button', isCurrentPage(n) ? styles.activeClass : '']">
                    <a href="#" @click="loadPage(n)" v-html="n"></a>
                </li>
            </template>
        </template>
        <template v-else>
            <template v-for="n in windowSize">
                <li :class="['paginate_button', isCurrentPage(windowStart+n-1) ? styles.activeClass : '']">
                    <a href="#" @click="loadPage(windowStart+n-1)" v-html="windowStart+n-1"></a>
                </li>
            </template>
        </template>
        <li v-if="!isOnLastPage" :class="['paginate_button', isOnLastPage ? styles.disabledClass : '']">
            <a href="#" @click="loadPage('next')">
                <span :class="styles.icons.next"></span>
            </a>
        </li>
        <li v-if="!isOnLastPage" :class="['paginate_button', isOnLastPage ? css.disabledClass : '']">
            <a href="#" @click="loadPage(totalPage)">
                <span :class="styles.icons.last"></span>
            </a>
        </li>
    </ul>
</template>

<script>
    import PaginationMixin from "vuetable-2/src/components/VuetablePaginationMixin.vue";

    export default {
        mixins: [PaginationMixin],

        data() {
            return {
                styles: {
                    wrapperClass: 'pagination',
                    activeClass: 'active',
                    disabledClass: 'disabled',
                    pageClass: 'page-item',
                    linkClass: 'page-link',
                    paginationClass: 'ui bottom attached segment grid',
                    paginationInfoClass: 'left floated left aligned six wide column',
                    dropdownClass: 'ui search dropdown',
                    icons: {
                        first: 'fa fa-angle-double-left',
                        prev: 'fa fa-angle-left',
                        next: 'fa fa-angle-right',
                        last: 'fa fa-angle-double-right',
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .pagination > li {
        display: inline-block;
        padding-left: 0;
        font-size: 11px;
    }

    .pagination > li > a {
        padding: 5px 10px;
        color: #575757;
        opacity: .35;
        -webkit-transition: opacity 0.3s ease;
        transition: opacity 0.3s ease;
    }

    .pagination > li.active > a {
        font-weight: bold;
        color: #575757;
        opacity: 1;
    }

    .pagination > li > a:hover {
        opacity: .65;
    }
</style>