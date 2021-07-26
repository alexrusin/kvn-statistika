require('./bootstrap');
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

import Modal from './plugins/modal/ModalPlugin';
Vue.use(Modal);

Vue.prototype.signedIn = JSON.parse(window.App).signedIn;
Vue.prototype.authUser = JSON.parse(window.App).user;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('nav-header', require('./components/NavHeader.vue').default);
Vue.component('team-cards', require('./components/TeamCards.vue').default);
Vue.component('statistics-videos', require('./components/StatisticsVideos').default);
Vue.component('statistics-games', require('./components/StatisticsGames').default);
Vue.component('data-card', require('./components/DataCard').default);
Vue.component('game-form', require('./components/Admin/GameForm').default);
Vue.component('team-form', require('./components/Admin/TeamForm').default);
Vue.component('result-form', require('./components/Admin/ResultForm').default);
Vue.component('video-form', require('./components/Admin/VideoForm').default);
Vue.component('team-score-section', require('./components/TeamScoreSection').default);
Vue.component('team-games-section', require('./components/TeamGamesSection').default);
Vue.component('review-team', require('./components/ReviewTeam').default);

Vue.component('posts', require('./components/Blog/Posts').default);

Vue.component('flash', require('./components/Flash').default);
Vue.component('tooltip', require('./components/Tooltip').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
