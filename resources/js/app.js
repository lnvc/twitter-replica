/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Router from 'vue-router'


// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.use(Router)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('tweet', require('./components/Tweet.vue').default);
Vue.component('editprofile', require('./components/EditProfile.vue').default);
Vue.component('follow', require('./components/Follow.vue').default);
Vue.component('tab-following', require('./components/Followings.vue').default);
Vue.component('tab-followers', require('./components/Followers.vue').default);
Vue.component('profile-partial', require('./components/ProfilePartial.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component("link-followers", {
    
// });

// import Follow from './components/Follow.vue'

// const router = new Router({
//     routes: [
//         {
//             path: '/:user/followers',
//             name: 'follow',
//             component: Follow
//         },
//     ]
// });

const app = new Vue({
    el: '#app'
});
