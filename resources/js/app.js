require('./bootstrap');

// import Vue from 'vue';
window.Vue = require("vue").default;

Vue.component('pitch-form', require('./components/Pitchform.vue').default);

const app = new Vue({
    el: '#app',
});
