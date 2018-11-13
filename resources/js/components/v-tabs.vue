<template>
<div class="card">
    <div class="card-header" v-cloak>
        <ul class="nav nav-pills card-header-pills">
            <li v-for="tab in tabs" class="nav-item">
                <a
                    @click.prevent="activateTab(tab)"
                    :href="'#'+tab.hash"
                    :class="{
                    'active' : isActive(tab),
                    'text-white bg-danger' : isActive(tab) && tab.error,
                    'text-danger' : !isActive(tab) && tab.error,
                    }"
                    class="nav-link small"
                >
                    <i v-if="tab.error" class="fa fa-info-circle"></i>
                    <i v-else-if="tab.icon" :class="`fa ${tab.icon}`"></i>
                    <div class="d-none d-md-inline">
                        {{ tab.name }}
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div
        v-for="tab in tabs"
        v-show="activeTab && activeTab.hash === tab.hash"
        :ref="tab.hash"
        :class="{ in: isActive(tab) }">
        <slot :name="tab.hash"></slot>
    </div>
    <div class="card-footer" v-if="hasSlot">
        <slot></slot>
    </div>
</div>
</template>
<style lang="sass" scoped>
	[v-cloak]
		display: none !important
</style>
<script>
    export default{
        name:'v-tabs',
		props: ['default', 'tabs'],
        data() {
            return {
                activeTab: this.tabs[0],
	            firstRun: true,
            }
        },
        computed:{
            windowHash:{
                cache: false,
                get(){
                   return location.hash.substring(1)
                }
            },
            defaultTab:{
                cache: false,
                get(){
                    const tab = this.getTabByHash(this.windowHash)
                    return tab ? tab : this.default ? this.getTabByHash(this.default) : this.tabs[0]
                }
            }
        },
        watch:{
            activeTab:{
                handler(tab){
                    if(this.windowHash === tab.hash) return
                    // IE10, Firefox, Chrome, etc.
                    if (window.history.pushState) {
                        window.history.pushState(null, null, '#' + tab.hash)
                    // IE9, IE8, etc
                    } else {
                        window.location.hash = '#' + tab.hash
                    }
                }
            }
        },
        methods: {
            isActive(tab){
                return this.activeTab && this.activeTab.hash === tab.hash
            },
            hasSlot(name = 'default') {
                return !!this.$slots[name] || !!this.$scopedSlots[name]
            },
	        getTabByHash(hash){
		        return this.tabs.find(function(tab){
			        return tab.hash === hash
		        })
	        },
			activateTab(tab){
                this.activeTab = tab
                this.$emit('tab_active',tab)
			},
            windowHashToTab(){
                const tab = this.getTabByHash(this.windowHash)
                if(tab){
                    this.activateTab(tab)
                }
            }
        },
        created(){
            window.addEventListener("hashchange", this.windowHashToTab, false)
        },
        beforeDestroy(){
            window.removeEventListener("hashchange", this.windowHashToTab, false)
        },
        mounted() {
            //Load Tab from Hash
            this.activateTab(this.defaultTab)
        },
    }
</script>
