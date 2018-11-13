<template>
    <div id="v-toasts">
        <transition-group name="v-toasts" tag="div">
            <div
                    v-for="toast in content" :key="toast.id" :class="type(toast.type)"
                    class="v-toasts-item alert border bg-white border-light shadow" role="alert">
                <div class="v-toasts-header">
                    <i class="fa" :class="icon(toast.type)"></i> {{ toast.title}}
                </div>
                <div class="v-toasts-content">{{ toast.body}}</div>
            </div>
        </transition-group>
    </div>
</template>
<script>
    export default {
        props: ['message'],
        data() {
            return {
                defaults: {
                    title: 'xtitle',
                    body: 'body',
                    timeout: 5,
                },
                content: []
            }
        },
        methods: {
            add(params) {
                params.created = Date.now();
                params.id = Math.random();
                params.expire = setTimeout(() => {
                    this.content.splice(this.content.findIndex((toast) => toast.id === params.id), 1)
                }, params.timeout);
                this.content.unshift(params);
            },
            type(type) {
                switch (type) {
                    case 'error':
                        return 'alert-danger';
                    case 'success':
                        return 'alert-success';
                    case 'info':
                        return 'alert-info';
                    default:
                        return 'alert-light';
                }
            },
            icon(type) {
                switch (type) {
                    case 'error':
                        return 'fa-exclamation-triangle';
                    case 'success':
                        return 'fa-check-circle';
                    case 'info':
                        return 'fa-info-circle';
                    default:
                        return 'fa-info-circle';
                }
            },
        },
        created() {
            window.events.$on('toast', this.add);

            if (this.message) {
                this.add(this.message);
            }
        }
    }
</script>
<style lang="scss">
    $width: 240px;
    $transition: all 300ms ease-in-out;
    #v-toasts > div {
        transition: $transition;
        position: absolute;
        overflow: visible;
        bottom: 0;
        right: 0;
        padding: 15px;
        z-index: 10000;
        width: calc(#{$width} + (15px * 2));
        .v-toasts-header {
            font-weight: bold;
        }
        .v-toasts-item {
            transition: $transition;
            margin: 0 0 10px 0;
            width: $width;
        }
        .v-toasts-content {
            font-size: 13px;
        }
        .v-toasts-enter,
        .v-toasts-leave-to {
            opacity: 0;
            transform: translate(30px, 0);
        }
        .v-toasts-leave-active {
            transform: translate(30px, 0);
            position: absolute;
        }
    }
</style>
