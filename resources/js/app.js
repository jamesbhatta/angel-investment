require('./bootstrap');

// import Vue from 'vue';
window.Vue = require("vue").default;

import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

Vue.component('general-profile-form', require('./components/GeneralProfileForm.vue').default);
Vue.component('password-change-form', require('./components/PasswordChangeForm.vue').default);
Vue.component('payment-form', require('./components/PaymentForm.vue').default);
Vue.component('industry-list-section', require('./components/IndustryListSection.vue').default);
Vue.component('invest-form', require('./components/InvestForm.vue').default);

Vue.component('invalid-feedback', require('./components/InvalidFeedback.vue').default);

const app = new Vue({
    el: '#app',
});
