
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
Vue.component('admin-fiscaldata', require('./components/FiscalDataComponent.vue'));
Vue.component('admin-itempage', require('./components/ItemPageComponent.vue'));
Vue.component('admin-estimatepage', require('./components/EstimatePageComponent.vue'));
Vue.component('admin-transaction',require('./components/TransactionPageComponent.vue'));
Vue.component('admin-invoicespage', require('./components/InvoicesPageComponent.vue'));
Vue.component('admin-addtransaction', require('./components/AddTransactionPageComponent.vue'));
Vue.component('admin-billspage',require('./components/BillsPageComponent.vue'));
Vue.component('admin-financial',require('./components/FinancialComponent.vue'));

Vue.component('admin-journal',require('./components/JournalPageComponent.vue'));


// Forms
Vue.component('admin-createestimate', require('./forms/createEstimateComponent.vue'));
Vue.component('admin-createbill', require('./forms/createBillComponent.vue'));
// Generic 
Vue.component('add-modal', require('./components/generic/AddModalComponent.vue'));
Vue.component('currency',require('./components/generic/CurrencyComponent.vue'));
Vue.component('data-table', require('./components/generic/DataTableComponent.vue'));
Vue.component('date-component',require('./components/generic/DateComponent.vue'));
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

window.toCurrency = function(currency, price){
    return currency + " " + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


Array.prototype.sum = function(){
    let total = 0;
    this.forEach(e=>{
        total += (e.price * e.quantity) + e.tax;
    });
    return total;
}

window.datefixed = function(date){
    let months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ]
    var dateParts = date.split("-");
    var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
    return months[jsDate.getMonth()] + " " + jsDate.getDate() + ", " + jsDate.getFullYear();
}