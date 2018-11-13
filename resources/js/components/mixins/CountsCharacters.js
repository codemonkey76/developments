export default {
    methods: {
        /**
         * Get String Char Count
         * @param field
         * @param length
         * @return {*}
         */
        charCount(field, length = 60){
            let fieldValue = this.form[field]
            if(fieldValue && fieldValue.length){
                return `${fieldValue.length}/${length} Characters`
            }
            return 0
        },
    }
}
