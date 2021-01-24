/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require("./users");
window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component("user-component", require("./components/UserComponent.vue"));
Vue.component("book-component", require("./components/BookComponent.vue"));

Vue.component("like", require("./components/Like.vue"));

const app = new Vue({
 el: "#app",
});

$(function() {
 // 行の一部を変更する
 $(document).on('click', '#removeList', function() {
  $(this)
   .parent()
   .parent()
   .remove();
 });
});