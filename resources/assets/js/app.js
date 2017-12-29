/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.events = new Vue();

window.flash = function(message) {
  window.events.$emit('flash', message);
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.config.productionTip = false;

import VueMarkdown from 'vue-markdown';

Vue.component('vue-markdown', VueMarkdown);

Vue.component('Notification', require('./components/Notification'));
Vue.component('Icon', require('./components/Icon'));
Vue.component('markdown-sample', require('./components/MarkdownSample.vue'));

// Transitions
Vue.component('Toast', require('./components/transitions/Toast'));

const app = new Vue({el: '#app'});
