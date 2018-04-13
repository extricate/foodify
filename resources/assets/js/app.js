/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('recipe-component', require('./components/AddRecipe.vue'));

const app = new Vue({
    el: '#app'
});

/**
 * Tooltips
 */

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

/**
 * Owl carousel
 */

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
});

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
            '<div data-notify="container" class="col-xs-11 col-sm-3 col-lg-2 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss"><i class="fa fa-times"></i></button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" style="height: 2px;" data-notify="progressbar">' +
            '<div class="progress-bar bg-{0}, progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
});

