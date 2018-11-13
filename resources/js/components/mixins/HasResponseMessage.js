export default {
    data() {
        return {
            mix_message: null
        }
    },
    computed:{
        responseMessage(){
            return this.mix_message ? this.mix_message : {
                text: null,
                type: 'success',
            }
        },
        hasMessage(){
            return this.mix_message !== null
        }
    },
    methods: {
        /** Sync the message from the response. **/
        syncMessage(message, type = 'success'){
            this.setMessage(message, type)
            if(!this.hasMessage && this.hasErrors()){
                this.setMessage(this.getFirstError(), 'error')
            }
        },
        setMessage(text = null, type = 'success'){
            if(text){
                this.mix_message = {
                    text: text,
                    type: type,
                }
            }
        },
        clearMessage(){
            this.mix_message = null
        }
    }
}

