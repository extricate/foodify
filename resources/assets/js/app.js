/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('recipe-search-component', require('./components/RecipeSearchComponent.vue'));

const app = new Vue({
    el: '#app',
});

/**
 * Tooltips
 */

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

/**
 * Owl carousel
 */

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: true,
    items: 7,
    startPosition: new Date().getDay() - 1,
    responsive: {
        0: {
            items: 2,
        },
        480: {
            items: 3,
        },
        768: {
            items: 4,
        },
        1000: {
            items: 7,
        }
    }
});

/**
 * Font Awesome
 */

import fontawesome from '@fortawesome/fontawesome';
import light from '@fortawesome/fontawesome-pro-light';

fontawesome.library.add(light);

/**
 * Bootstrap notify
 */
$(function () {
    if (document.body.dataset.notificationMessage == 'null') {
        return false;
    }

    $.notify({
            // options
            message: (JSON.parse(document.body.dataset.notificationMessage)),
        },
        {
            // default settings
            type: document.body.dataset.notificationType,
            showProgressbar: true,
            mouse_over: 'pause',
            template:
            '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss"><i class="fal fa-times"></i></button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<p data-notify="message">{2}</p>' +
            '<div class="progress" style="height: 3px;" data-notify="progressbar">' +
            '<div class="progress-bar bg-{0}, progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
});

