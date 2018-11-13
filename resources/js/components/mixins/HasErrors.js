export default {
    data(){
        return {
            mix_errors: {}
        }
    },
    methods: {
        /**
         * (Action) syncErrors
         * @param error @type {{}|AxiosResponse}
         */
        syncErrors(error) {
            if (typeof error !== 'undefined') {
                if (error.response) {
                    if (error.response.hasOwnProperty('data')) {
                        this.syncMessage(error.response.data)
                        if (error.response.data.hasOwnProperty('errors')) {
                            let errors = error.response.data.errors
                            for (let key of Object.keys(errors)) {
                                errors[key].map((error, index) => {
                                    //Strip Dot Syntax from Field Names in Messages (for nested array fields)
                                    errors[key][index] = error.replace(key.replace(/_/g, ' '), key.replace(/[._]/g, ' '))
                                })
                            }
                            this.mix_errors = errors
                        }
                    }
                }
            }
            //Add Fake Error in case of catastrophic null response.
            if(!this.hasErrors()){
                this.mix_errors = {
                    'server': ["Whoops, the server encountered an error."]
                }
            }
        },
        /**
         * (Conditional) hasErrors
         * @param field @type {String}
         * @return {boolean}
         */
        hasErrors(field = null) {
            return field ? this.mix_errors.hasOwnProperty(field) : Object.keys(this.mix_errors).length > 0
        },
        /**
         * (Method) getErrors
         * @param field @type {String}
         * @param fallback @type {*}
         * @return {*}
         */
        getErrors(field, fallback = false) {
            return this.mix_errors.hasOwnProperty(field) ? this.mix_errors[field] : fallback ? fallback : this.mix_errors
        },
        /**
         * (Method) getError
         * @param field @type {String}
         * @return {String|null}
         */
        getError(field) {
            return this.mix_errors.hasOwnProperty(field) ? this.mix_errors[field][0] : null
        },
        /**
         * (Conditional) hasErrorsIn
         * @param fields @type {Array}
         * @return {Boolean}
         */
        hasErrorsIn(...fields) {
            let hasErrorsIn
            fields.some((field) => {
                hasErrorsIn = this.mix_errors.hasOwnProperty(field)
                return hasErrorsIn
            })
            return hasErrorsIn
        },
        /**
         * (Method) getFirstError
         * @return {String|null}
         */
        getFirstError() {
            const errors = Object.values(this.mix_errors).flat(2);
            return errors.length > 0 ? errors[0] : null
        },
        /**
         * (Method) clearErrors
         * @return void
         */
        clearErrors() {
            this.mix_errors = {}
        },
    }
}
