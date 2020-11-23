/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import { extend } from 'vee-validate';
import { required,email,confirmed,image,max,min } from 'vee-validate/dist/rules';

// Add the required rule
extend('required', {
  ...required,
  message: 'هذا الحقل لا يمكن ان يكون فارغا'
});
extend('email', {
  ...email,
  message: 'الرجاء ادخال ايميل صحيح'
});
extend('confirmed', {
  ...confirmed,
  message: 'القيمة المدخلة غير مطابقة'
});
extend('image', {
  ...image,
  message: 'هذا الحقل يجب ان يحتوي على صور فقط'
});
extend('max', {
  ...max,
  message: 'لقد تخطيت الحد المسموح به من الحروف'
});
extend('min', {
  ...min,
  message: 'لقد ادحلت اقل من الحد المسموح به '
});



import { ValidationProvider } from 'vee-validate';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('ValidationProvider', ValidationProvider);

Vue.component('chat-app', require('./components/messenger/ChatApp.vue').default);

Vue.component('posting-app',require('./components/social/post.vue').default);

Vue.component('status-app',require('./components/social/status.vue').default);

Vue.component('social-app',require('./components/social/social.vue').default);

Vue.component('add_mvp-app',require('./components/mvp/add.vue').default);


Vue.component('list_mvp-app',require('./components/mvp/list.vue').default);

Vue.component('contact-app',require('./components/contact/contact.vue').default);

Vue.component('comment-app',require('./components/articals/commentComponent.vue').default);

Vue.component('work_request-app',require('./components/workers/workRequestComponent.vue').default);

Vue.component('work_accept-app',require('./components/workers/workAcceptComponent.vue').default);

Vue.component('notification-app',require('./components/site/notificationComponent.vue').default);

Vue.component('login-app',require('./components/auth/loginComponent.vue').default);

Vue.component('register-app',require('./components/auth/registerComponent.vue').default);

Vue.component('home_signup-app',require('./components/site/signupComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

const login = new Vue({
    el: '#login'
});

const register = new Vue({
    el: '#register'
});

const posting = new Vue({
    el: '#posting'
});

const status = new Vue({
    el: '#status'
});

const social = new Vue({
    el: '#social'
});

const add_mvp = new Vue({
    el: '#add_mvp'
});

const list_mvp = new Vue({
    el: '#list_mvp'
});


const contact = new Vue({
    el: '#contact'
});

const comment = new Vue({
    el: '#comment',
});

const work_request = new Vue({
    el: '#work_request',
});

const work_accept = new Vue({
    el: '#work_accept',
});

const notification = new Vue({
    el: '#notification',
});

const home_signup = new Vue({
    el: '#home_signup',
});
