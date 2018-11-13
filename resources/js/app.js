require('./bootstrap');

window.Vue = require('vue');
window.events = new Vue();


const files = require.context('./', true, /\.vue$/i)

files.keys().map(key => {
    return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
});

window.toast = function (args) {
    window.events.$emit('toast', args);
};

let rootVue = new Vue({
    el: '#app'
});
