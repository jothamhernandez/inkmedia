
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('admin-dashboard', require('./components/DashboardComponent.vue'));
Vue.component('admin-customerpage',require('./components/CustomerPageComponent.vue'));
Vue.component('admin-vendorpage',require('./components/VendorPageComponent.vue'));
Vue.component('admin-coapage', require('./components/COAComponent.vue'));
Vue.component('admin-itempage', require('./components/ItemPageComponent.vue'));
Vue.component('admin-estimatepage', require('./components/EstimatePageComponent.vue'));
Vue.component('admin-transaction',require('./components/TransactionPageComponent.vue'));

// Forms
Vue.component('admin-createestimate', require('./forms/createEstimateComponent.vue'));

// Generic 
Vue.component('add-modal', require('./components/generic/AddModalComponent.vue'));
const app = new Vue({
    el: '#app'
});
window.clone = function(obj) {
    if (null == obj || "object" != typeof obj) return obj;
    var copy = obj.constructor();
    for (var attr in obj) {
        if (obj.hasOwnProperty(attr)) copy[attr] = obj[attr];
    }
    return copy;
}
