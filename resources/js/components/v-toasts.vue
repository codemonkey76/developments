<script>
    export default {
        props: {
            message: {
                type: Object,
                default() {
                    return {};
                }
            }
        },
        data(){
            return {
                defaults: {
                    title: 'title',
                    body: 'body',
                    timeout: 3000,
                    type: 'success'
                },
                toasts: [],
                isVisible: false,
            }
        },
        computed:{
            limitedToasts(){
                return this.toasts.slice(0, 5)
            }
        },
        watch:{
            'toasts':{
                handler(toasts){
                    if(this.toasts.length){
                        this.isVisible = true
                    }else{
                        setTimeout(()=>{
                            if(!this.toasts.length){
                                this.isVisible = false
                            }
                        }, 300)
                    }
                }
            }
        },
        methods: {
            add(params, type = 'success') {
                console.log('Got the message');
                if(typeof params === 'string'){
                    params = Object.assign({}, this.defaults, {
                        body: params
                    })
                }

                params.created = Date.now();
                params.id = Math.random();
                params.expire = setTimeout(() => {
                    this.toasts.splice(this.toasts.findIndex((toast)=>toast.id === params.id), 1)
                }, params.timeout);

                if(!params.type){ //only add if object is missing key
                    params.type = type;
                }

                if(!params.timeout){ //only add if object is missing key
                    params.timeout = this.defaults.timeout
                }
                this.toasts.unshift(params)
            },
            type(type) {
                switch (type) {
                    case 'error' :
                        return 'alert-danger';
                    case 'success' :
                        return 'alert-success';
                    case 'info' :
                        return 'alert-info';
                    default :
                        return 'alert-light';
                }
            },
            icon(type) {
                switch (type) {
                    case 'error' :
                        return 'fa-exclamation-triangle';
                    case 'success' :
                        return 'fa-check-circle';
                    case 'info' :
                        return 'fa-info-circle';
                    default :
                        return 'fa-info-circle';
                }
            },
        },
        beforeDestroy () {
            window.events.$off('toast', this.add);
        },
        created () {
            console.log(this.message);
            window.events.$on('toast', this.add);

            // if (this.message) {
            //     this.add(this.message);
            // }
        }
    }
</script>
<template>
    <div class="v-toasts" v-show="isVisible">
        <transition-group name="v-toasts" tag="div">
            <div v-for="(toast, index) in limitedToasts" :key="toast.id" :class="type(toast.type)"
                 class="v-toasts-item alert bg-white border border-light shadow" role="alert">
                <div class="v-toasts-header">
                    <i class="fa" :class="icon(toast.type)"></i> {{ toast.title}}
                </div>
                <div class="v-toasts-body" v-if="toast.body">
                    {{ toast.body }}
                </div>
            </div>
        </transition-group>
    </div>
</template>
<style lang="sass" scoped>
    $width:  260px
    $transition:  all 300ms ease-in-out
    .v-toasts
        transition: $transition
        position: fixed
        bottom: 15px
        right: 15px
        z-index: 10000
        width: $width
        .v-toasts-header
            font-weight: bold
        .v-toasts-item
            transition: $transition
            margin: 10px 0 0 0
        .v-toasts-body
            font-size: 13px
            max-width: $width
            word-break: break-all
            overflow: hidden
        .v-toasts-enter,
        .v-toasts-leave-to
            opacity: 0
        .v-toasts-enter
            transform: translate(15px, 0)
        .v-toasts-leave-active
            transform: scale(0.1)
            position: absolute
            bottom: 0
            right: 0
</style>
