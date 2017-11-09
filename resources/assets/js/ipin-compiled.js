
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#ipin-app'
});

require('../../../node_modules/mdbootstrap/js/bootstrap.min');
// require('../../../node_modules/masonry-layout/dist/masonry.pkgd.min');
// require('../../../node_modules/isotope-layout/dist/isotope.pkgd.min');
// require('../../../node_modules/imagesloaded/imagesloaded.pkgd.min');
// require('../../../node_modules/video.js/dist/video.min');
require('./components/isotope');
require('./components/jquery.uploadfile');
require('./components/common');
require('./components/create');
require('./components/view');