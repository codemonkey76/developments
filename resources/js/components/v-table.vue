<script>
import {HasLoadingState, HasCollection} from './mixins'
export default {
    mixins: [
        HasLoadingState,
        HasCollection
    ],
    data(){
        return {
            searchTerm: '',
        }
    },
    props: {
        route: {
            type: String,
            required: true,
            default: '/media'
        },
        columns: {
            type: Array,
            required: true,
            default: () => {
                return {}
            }
        },
        settings: {
            type: Object,
            required: false,
            default: () => {
                return {}
            }
        },
    },
    watch:{
        'collection.urlParams': {
            deep: true,
            handler(){
                this.request()
            }
        },
    },
    computed: {
        sortIcon() {
            return {
                'fa-sort-up' : this.collection.isSorted('asc'),
                'fa-sort-down' : this.collection.isSorted('desc'),
            }
        },
        searchDisabled() {
            return this.isLoading() && this.searchTerm.length > 0
        },
    },
    methods: {
        /**
         * Create a New HTTP Request.
         * @return void
         */
        async request() {
            if(this.isLoading()) return

            this.loading(true)
            const url = `${this.route}?${this.collection.urlParams}&search=${this.searchTerm}`
            await this.$http.request({
                method: 'get',
                url: url,
            })
            .then(({data}) => {
                this.collection.setState(data)
            })
            .finally(() => {
                this.loading(false)
            })
            .catch(({message}) => {
                alert(message)
            })
        },
    },
    mounted() {
        this.collection.setState(this.settings)
        this.request()
    },
}
</script>
<template>
<div>
    <div class="row mb-3">
        <div class="col mb-3 mb-lg-0">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search"
                    :disabled="searchDisabled"
                    v-model="searchTerm"
                    @keydown.enter="collection.flush()"
                >
                <div class="input-group-append">
                    <a :class="{disabled: searchDisabled}" class="btn btn-primary text-white" @click.prevent="collection.flush()">
                        Search
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-8 order-lg-first">
            <v-pagination :collection.sync="collection" :loading="isLoading()"></v-pagination>
        </div>
    </div>
    <div class="position-relative table-responsive rounded mb-3">
        <table class="table table-striped table-light m-0" :class="{loading: isLoading()}">
            <thead>
            <tr>
                <th scope="col" class="text-nowrap small" v-for="column in columns">
                    <a
                        v-if="column.sortable"
                        @click="collection.toggleSortable(column.field)"
                        :class="{ 'text-primary' : collection.isOrderedBy(column.field)}"
                    >
                        <strong>{{column.label}}</strong>
                        <i v-if="collection.isOrderedBy(column.field)" class="fa" :class="sortIcon"></i>
                    </a>
                    <strong v-else>
                        {{column.label}}
                    </strong>
                </th>
            </tr>
            </thead>
            <tbody>
                <template v-if="collection.hasItems">
                    <tr v-for="row in collection.items">
                        <slot :row="row"></slot>
                    </tr>
                </template>
                <tr v-else>
                    <td :colspan="columns.length" class="text-center">
                        <div class="alert alert-light" v-if="isLoading()">
                            <i class="fa fa-circle-notch fa-spin"></i> Searching...
                        </div>
                        <div class="alert alert-light" v-else>
                            <i class="fa fa-info-circle"></i> No Items Found.
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <transition name="fadeInOut">
            <div v-if="isLoading()" class="inline-loading position-absolute">
                <div class="float-right pt-2 pr-3 text-muted">
                    <i class="fa fa-circle-notch fa-spin text-primary"></i>
                </div>
            </div>
        </transition>
    </div>
    <v-pagination :collection.sync="collection" :loading="isLoading()"></v-pagination>
</div>
</template>
<style lang="scss" scoped>
//Bootstrap Vars & Functions
@import '../../sass/global';
.inline-loading{
    background: rgba(255,255,255,0.3);
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    color: $text-muted;
    transition: all 200ms ease-in-out !important
}
</style>
