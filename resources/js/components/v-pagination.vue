<script>
export default {
    props: {
        collection: {
            type: Object,
            required: true
        },
        loading: {
            type: Boolean,
            required: false
        },
    }
}
</script>
<template>
<div class="row">
    <div class="col col-auto pr-0">
        <!-- PerPage Options -->
        <select class="custom-select custom-select-sm m-0" v-model="collection.perPage">
            <option v-for="amount in collection.perPageOptions" :value="amount">{{ amount }}</option>
        </select>
        <!-- PerPage Options -->
    </div>
    <div class="col col-auto pr-0" v-if="collection.hasPagination">
        <ul role="navigation" class="pagination pagination-sm m-0">
            <template v-if="collection.shouldRenderLinks">
                <!-- Previous Page -->
                <li class="page-item" :class="{disabled: !collection.hasPreviousPage}">
                    <a rel="prev" aria-label="« Previous" class="page-link" @click="collection.previousPage()">‹</a>
                </li>
                <!-- Previous Page -->

                <!-- Previous Page -->
                <template v-for="(page, index) in collection.pagination">
                    <li v-if="collection.isCurrentPage(page)" class="page-item active" aria-current="page">
                        <span v-if="loading" class="page-link">
                            <i class="fa fa-circle-notch fa-spin"></i>
                        </span>
                        <span v-else class="page-link">
                            {{ page }}
                        </span>
                    </li>
                    <li v-else class="page-item" :class="{disabled: page === '...'}">
                        <a class="page-link" @click="collection.page(page)">
                            {{ page }}
                        </a>
                    </li>
                </template>
                <!-- Previous Page -->

                <!-- Next Page -->
                <li class="page-item" :class="{disabled: !collection.hasNextPage}">
                    <a rel="next" aria-label="Next »" class="page-link" @click="collection.nextPage()">›</a>
                </li>
                <!-- Next Page -->
            </template>

            <!-- Disabled / Loading State -->
            <template v-else>
                <li class="page-item disabled" aria-current="page">
                    <span v-if="loading" class="page-link">
                        <i class="fa fa-circle-notch fa-spin"></i>
                    </span>
                </li>
            </template>
            <!-- Disabled / Loading State -->
        </ul>
    </div>
    <div class="col col-auto flex-grow-1 align-self-center" v-if="collection.hasItems">
        <!-- Visible Range Text -->
        <p class="small text-muted m-0">
            {{ collection.get('from') }}-{{ collection.get('to') }} of {{ collection.get('total') }} entries.
        </p>
        <!-- Visible Range Text -->
    </div>
</div>
</template>
