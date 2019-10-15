require('./bootstrap');

window.Vue = require('vue');

Vue.component('register', require('./components/register.vue').default);

const app = new Vue({
    el: '#app'
});
