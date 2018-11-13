<template>
    <div>
        <transition name="zoomInOut">
            <div v-if="isVisible" class="v-modal modal fade show" tabindex="-1" role="dialog"
                 :class="{'fullscreen rounded-0': fullscreen}">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ title }}</h5>
                            <slot name="header"></slot>
                            <a class="close" @click="isVisible=!isVisible" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body d-block">
                            <slot name="body"></slot>
                        </div>
                        <div class="modal-footer d-block" v-if="hasSlot('footer')">
                            <slot name="footer"></slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
export default {
    props: {
        title: {type: String, default: 'Modal'},
        value: {type: Boolean, default: false},
        event: {type: String, default: 'toggle:modal'},
        fullscreen: {type: Boolean, default: false},
    },
    data() {
        return {
            isVisible: this.value,
        }
    },
    watch: {
        value: {
            immediate: true,
            handler(value) {
                this.isVisible = value
            }
        },
        isVisible: {
            immediate: true,
            handler(value) {
                this.$emit('input', value)
                $('html').toggleClass('modal-open', value)
            }
        },
    },
    methods: {
        toggle(isVisible = null) {
            this.isVisible = typeof isVisible === 'boolean' ? isVisible : !this.isVisible
        },
        hasSlot(slot) {
            return !!this.$slots[slot]
        }
    },
    mounted() {
        this.$events.$on(this.event, this.toggle)
    },
    beforeDestroy() {
        this.$events.$off(this.event, this.toggle)
    }
}
</script>
<style lang="scss">
@import '../../sass/global';
$container-padding: 25px;
    html.modal-open,
    html.modal-open body {
        overflow: hidden !important;
    }
    .modal {
        transition: all 300ms ease-in-out;
        background: rgba(0, 0, 0, 0.7);
        padding: 0;
        z-index: 1200;
    }
    .modal.show {
        display: block;
    }
    .fullscreen {
        .modal-dialog {
            width: 100vw;
            height: 100vh;
            max-width: 100vw;
            margin: 0;
            z-index: 20;
            position: fixed;
            .modal-header {
                min-height: 20px;
                background: #f3f3f3;
                padding: 10px 15px !important;
            }
            .modal-header,
            .modal-body,
            .modal-footer {
                padding-left: $container-padding;
                padding-right: $container-padding;
            }
            .modal-body {
                overflow: hidden;
                max-height: 100% !important;
                padding: 0;
            }
            .modal-content {
                border: none;
                border-radius: 0;
                overflow-y: auto;
                overflow-x: hidden;
                height: 100vh;
            }
        }
    }
</style>
