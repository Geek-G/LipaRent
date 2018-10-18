
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

//import VueRouter from 'vue-router'

//window.Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('about', require('./components/About.vue'));
Vue.component('pricing', require('./components/Pricing.vue'));
Vue.component('location', require('./components/Location.vue'));
Vue.component('house', require('./components/House.vue'));

Vue.component('propertiez', require('./components/property/Properties.vue'));
Vue.component('new-property', require('./components/property/NewProperty.vue'));
Vue.component('show-property', require('./components/property/ShowProperty.vue'));
Vue.component('edit-property', require('./components/property/EditProperty.vue'));

const app = new Vue({
    el: '#app'
});
