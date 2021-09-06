require('./bootstrap');

// import Vue from 'vue';
window.Vue = require("vue").default;

Vue.component('pitch-form', require('./components/Pitchform.vue').default);
Vue.component('general-profile-form', require('./components/GeneralProfileForm.vue').default);
Vue.component('password-change-form', require('./components/PasswordChangeForm.vue').default);

Vue.component('invalid-feedback', require('./components/InvalidFeedback.vue').default);

const app = new Vue({
    el: '#app',
});
