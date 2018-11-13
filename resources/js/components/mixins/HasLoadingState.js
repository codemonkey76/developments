export default {
    data(){
        return {
            mix_loading: false
        }
    },
    methods: {
        /**
         * (Action) Set Loading State.
         * @param value @type {{*}}
         * @return void
         */
        loading(value = true){
            this.mix_loading = value
        },
        /**
         * (Conditional) Check Loading State.
         * @param value @type {{*}}
         * @return {Boolean}
         */
        isLoading(value = null){
            return value !== null ? this.mix_loading === value : this.mix_loading !== false
        }
    }
}
