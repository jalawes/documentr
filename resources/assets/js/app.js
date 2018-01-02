/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueMarkdown from 'vue-markdown';
import io from 'socket.io-client';

require('./bootstrap');

window.Vue = require('vue');

window.events = new Vue();

window.socket = io('localhost:3000');

window.flash = function(message) {
  window.events.$emit('flash', message);
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.config.productionTip = false;

// Packages
Vue.component('vue-markdown', VueMarkdown);

// Components
Vue.component('DocumentCreate', require('./components/DocumentCreate'));
Vue.component('Favorite', require('./components/Favorite'));
Vue.component('markdown-sample', require('./components/MarkdownSample'));
Vue.component('Notification', require('./components/Notification'));
Vue.component('CodeMirror', require('./components/Documents/CodeMirror'));
Vue.component('Preview', require('./components/Documents/Preview'));

// Inline Components
Vue.component('Document', require('./components/Document'));
Vue.component('ActivityDivider', require('./components/ActivityDivider'));

// Utilities
Vue.component('Icon', require('./components/Icon'));
Vue.component('Date', require('./components/Date'));

// Transitions
Vue.component('Toast', require('./components/transitions/Toast'));
Vue.component('FadeIn', require('./components/transitions/FadeIn'));

const app = new Vue({el: '#app'});
