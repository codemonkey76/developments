/**
 * Default Collection Attributes.
 * @const DefaultCollection
 * @type {{
 * sort: string,
 * order_by: string,
 * per_page: number,
 * current_page: number,
 * last_page: number,
 * total: number,
 * from: number,
 * to: number,
 * data: Array,
 * per_page_options: number[]
 * }}
 */
const DefaultCollection = {
    sort: 'desc',
    order_by: 'id',
    per_page: 15,
    current_page: 1,
    last_page: 1,
    total: 0,
    from: 1,
    to: 1,
    data: [],
    per_page_options: [1,3,5,10,15,20,30,40,50,75,100]
}

/**
 * Collection Class
 * Laravel Paginator Compatible Schema
 */
class Collection {
    /**
     * Class Constructor
     * @param state @type {{}|DefaultCollection}
     */
    constructor(state = {}) {
        this.state = Object.assign({}, DefaultCollection, state)
    }
    /**
     * (Getter) pagination Links
     * @return {Array}
     */
    get pagination() {
        return this.buildLinks(this.get('current_page'), this.get('last_page'))
    }
    /**
     * (Getter) urlParams
     * @return {String}
     */
    get urlParams(){
        return `paginate=${this.perPage}&page=${this.currentPage}&orderBy=${this.orderBy}&sort=${this.sort}`
    }
    /**
     * (Getter) items
     * @return {Array}
     */
    get items() {
        return this.get('data')
    }
    /**
     * (Getter) hasItems
     * @return {Boolean}
     */
    get hasItems() {
        return this.items.length > 0
    }
    /**
     * (Getter) currentPage
     * @return {Number}
     */
    get currentPage() {
        return this.get('current_page')
    }
    /**
     * (Setter) currentPage
     * @param value @type {Number}
     * @return void
     */
    set currentPage(value) {
        this.set('current_page', value)
    }
    /**
     * (Getter) orderBy
     * @return {String}
     */
    get orderBy() {
        return this.get('order_by')
    }
    /**
     * (Setter) orderBy
     * @param value @type {String}
     * @return void
     */
    set orderBy(value) {
        this.set('order_by', value)
    }
    /**
     * (Getter) sort
     * @return {String}
     */
    get sort() {
        return this.get('sort')
    }
    /**
     * (Setter) sort
     * @param value @type {String}
     * @return void
     */
    set sort(value) {
        this.set('sort', value)
    }
    /**
     * (Getter) perPage
     * @return {Number}
     */
    get perPage() {
        return this.get('per_page')
    }
    /**
     * (Setter) sort
     * @param value @type {Number}
     * @return void
     */
    set perPage(value) {
        this.setState({
            per_page: this.get('per_page_options').includes(value) ? value : 1,
            current_page: 0
        })
    }
    /**
     * (Getter) itemCount
     * @return {Number}
     */
    get perPageOptions() {
        return this.get('per_page_options')
    }

    /**
     * (Getter) hasPagination
     * @return {Boolean}
     */
    get hasPagination() {
        return this.get('last_page') > 1
    }
    /**
     * (Getter) shouldRenderLinks
     * @return {Boolean}
     */
    get shouldRenderLinks() {
        return this.pagination.includes(this.get('current_page'))
    }
    /**
     * (Getter) hasNextPage
     * @return {Boolean}
     */
    get hasNextPage() {
        return this.get('current_page') + 1 <= this.get('last_page')
    }
    /**
     * (Getter) hasPreviousPage
     * @return {Boolean}
     */
    get hasPreviousPage() {
        return this.get('current_page') - 1 >= 1
    }
    /**
     * (Method) Get Field Value
     * @param field @type {String}
     * @return {*}
     */
    get(field) {
        return this.state[field]
    }
    /**
     * (Method) Set Field
     * @param field @type {String}
     * @param value @type {*}
     * @return {this}
     */
    set(field, value) {
        this.state[field] = value
        return this
    }
    /**
     * (Method) State
     * @param state @type {{}}
     * @return void
     */
    setState(state) {
        this.state = Object.assign({}, this.state, state)
    }
    /**
     * (Method) flush State
     * @return void
     */
    flush() {
        this.state = DefaultCollection
    }
    /**
     * (Method) Append Object
     * @param obj @type {{}}
     * @param dupes @type {Boolean}
     * @return {this}
     */
    append(obj, dupes = false) {
        if(!this.first(obj) || dupes) this.state.data.push(obj)
        return this
    }
    /**
     * (Method) Prepend Object
     * @param obj @type {{}}
     * @param dupes @type {Boolean}
     * @return {this}
     */
    prepend(obj, dupes = false) {
        if(!this.first(obj) || dupes) this.state.data.unshift(obj)
        return this
    }
    /**
     * (Method) Find Object by Property
     * @param obj @type {{*}}
     * @return {Boolean}
     */
    has(obj){
        return this.state.data.indexOf(obj) >= 0
    }
    /**
     * (Method) Find Many Objects by Property
     * @param obj @type {Number|{}}
     * @param prop @type {Number|String}
     * @return {*}
     */
    find(obj, prop = 'id'){
        return this.state.data.filter((entry)=>obj[prop] === entry[prop]);
    }
    /**
     * (Method) Find Object by Property
     * @param obj @type {Number|{}}
     * @param prop @type {Number|String}
     * @return {*}
     */
    first(obj, prop = 'id'){
        return obj ? this.find(obj, prop)[0] : this.items[0] ? this.items[0]  : null;
    }
    /**
     * (Method) Update Object
     * @param obj @type {{}}
     * @param prop @type {String}
     * @return {this}
     */
    update(obj, prop = 'id') {
        const entries = this.find(obj, prop)
        if(entries){
            entries.forEach((entry)=>this.replace(entry, Object.assign({}, entry, obj)))
        }
        return this
    }
    /**
     * (Method) Append Object
     * @param obj @type {{}}
     * @param prop @type {String}
     * @return {this}
     */
    remove(obj, prop = 'id') {
        const entries = this.find(obj, prop)
        if(entries){
            entries.forEach((entry)=>this.state.data.splice(this.state.data.indexOf(entry), 1))
        }
        return this
    }
    /**
     * (Method) Append Object
     * @param entry @type {{*}}
     * @param obj @type {{*}}
     * @return {this}
     */
    replace(entry, obj) {
        this.state.data.splice(this.state.data.indexOf(entry), 1, obj)
        return this
    }
    /**
     * (Action) toggleSortable
     * @return void
     */
    toggleSortable(value){
        if(this.isOrderedBy(value)){
            if(this.isSorted('desc')){
                this.set('sort', 'asc')
            }else{
                this.set('sort', 'desc')
            }
        }else{
            this.set('order_by', value)
            this.set('sort', 'desc')
        }
    }
    /**
     * (Action) toPreviousPage
     * @return void
     */
    previousPage() {
        this.page(this.get('current_page') - 1)
    }
    /**
     * (Action) toNextPage
     * @return void
     */
    nextPage() {
        this.page(this.get('current_page') + 1)
    }
    /**
     * (Action) page
     * @param value @type {Number}
     * @return void
     */
    page(value) {
        this.set('current_page', value)
    }
    /**
     * (Conditional Method) isCurrentPage
     * @param value @type {Number}
     * @return {Boolean}
     */
    isCurrentPage(value) {
        return this.get('current_page') === value
    }
    /**
     * (Conditional Method) isOrderedBy
     * @param value @type {Number}
     * @return {Boolean}
     */
    isOrderedBy(value) {
        return this.get('order_by') === value
    }
    /**
     * (Conditional Method) isSorted
     * @param value @type {Number}
     * @return {Boolean}
     */
    isSorted(value) {
        return this.get('sort') === value
    }
    /**
     * (Internal) buildLinks
     * @param currentPage @type {Number}
     * @param pageCount @type {Number}
     * @param delta @type {Number}
     * @return {Array}
     */
    buildLinks(currentPage, pageCount, delta = 3) {
        let range = []
        for (let i = Math.max(2, currentPage - delta); i <= Math.min(pageCount - 1, currentPage + delta); i++) {
            range.push(i)
        }
        if (currentPage - delta > 2) {
            range.unshift("...")
        }
        if (currentPage + delta < pageCount - 1) {
            range.push("...")
        }
        range.unshift(1)
        range.push(pageCount)
        return range
    }
}
export {Collection}
export default {
    data() {
        return {
            collection: new Collection
        }
    },
}
