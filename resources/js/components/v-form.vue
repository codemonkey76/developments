<script>
import {
    HasErrors,
    InteractsWithUrls,
    CountsCharacters,
    Sluggable,
    HasResponseMessage
} from './mixins'
export default {
    name: 'v-form',
    mixins:[
        HasErrors,
        HasResponseMessage,
        InteractsWithUrls,
        CountsCharacters,
        Sluggable,
    ],
    props:{
        sync: {
            type: String,
        },
        route: {
            type: String,
            required: true,
        },
        method: {
            type: String,
            default: 'post'
        },
        data: {
            type: Object,
            default(){
                return {}
            }
        },
        schema: {
            type: Object,
            default(){
                return {}
            }
        },
        compose: {
            type: Object,
            default(){
                return {}
            }
        },
    },
    data() {
        return {
            isLoading: false,
            defaultData: this.data,
            defaultSchema: this.schema,
            composers: this.compose,
            errors: {},
            form: {},
        }
    },
    computed: {
        propData(){
            return {
                form: this.form,
                schema: this.defaultSchema,
                default: this.defaultData,
                composers: this.composers,
                isLoading: this.isLoading,
            }
        },
        propMethods(){
            return {
                resetForm: this.resetForm,
                submitForm: this.submitForm,
                formLoading: this.formLoading,
                urlOpen: this.urlOpen,
                getError: this.getError,
                getErrors: this.getErrors,
                hasErrors: this.hasErrors,
                hasErrorsIn: this.hasErrorsIn,
                clearErrors: this.clearErrors,
                syncErrors: this.syncErrors,
                charCount: this.charCount,
                slug: this.slug,
            }
        }
    },
    methods: {
        /** Transform a Sluggable Attribute. **/
        slug(source, target, force = false){
            if(this.form[source] !== null && (!this.form[target] || force === true)){
                this.form[target] = this.toSlug(this.form[source])
            }
        },
        /** Set the loading state. **/
        formLoading(loading = true) {
            return this.isLoading = loading
        },
        /** Submit the form (macro). **/
        submitForm() {
            this.clearErrors()
            this.formLoading(true)
            this.ajaxRequest()
        },
        /** Async Axios Request. **/
        async ajaxRequest() {
            await this.$http.request({
                method: this.method,
                url: this.route,
                data: this.form,
                config: {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            })
            .then(({data}) => {
                this.syncData(data)
                this.syncMessage(data.message, 'success')
                this.$root.toast({
                    title: 'Success!',
                    body: this.responseMessage.text,
                    type: this.responseMessage.type,
                    timeout: 3000,
                })
                this.$emit('success', data, {
                    methods: this.propMethods,
                    data: this.propData,
                })
            })
            .catch((error) => {
                this.syncErrors(error)
                this.syncMessage(error.response.data.message, 'error')
                this.$root.toast({
                    title: 'Whoops!',
                    body: this.responseMessage.text,
                    type: this.responseMessage.type,
                    timeout: 3000,
                })
                this.$emit('error', error, {
                    methods: this.propMethods,
                    data: this.propData,
                })
            })
            .finally(() => {
                this.formLoading(false)
                window.scrollTo(0, 0);
            })
        },
        /** Reset the form to the initial state. **/
        resetForm() {
            const defaultData = Object.assign({}, this.defaultSchema, this.defaultData)
            this.form = Object.assign({}, defaultData)
            this.defaultData = Object.assign({}, defaultData)
        },
        /** Sync the data from the response. **/
        syncData(data){
            if (this.sync && data.hasOwnProperty(this.sync)) {
                console.log(data[this.sync])
                this.form = Object.assign({}, this.defaultSchema, data[this.sync])
                this.defaultData = Object.assign({}, this.form)
            }else{
                this.resetForm()
            }
        },
    },
    created() {
        this.resetForm()
    },
}
</script>
<template>
    <div ref="form" @submit.prevent="submitForm">
        <!--<v-alert-->
            <!--:show="hasMessage"-->
            <!--:type="responseMessage.type"-->
            <!--:text="responseMessage.text"-->
            <!--@close="clearMessage"-->
        <!--/>-->
        <slot :data="propData" :methods="propMethods"></slot>
    </div>
</template>
