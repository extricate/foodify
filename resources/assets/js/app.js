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
(function(){
    // Don't go any further down the script if [data-notification] is not set.
    if ( ! document.body.dataset.notification)
        return false;

    let type = document.body.dataset.notificationType;
    let types = ['info', 'warning', 'success', 'error'];

    // Check if `type` is in our `types` array, otherwise default to info.
    toastr[types.indexOf(type) !== -1 ? type : 'info'](JSON.parse(document.body.dataset.notificationMessage));

    $.notify({
        // options
        title: 'Notification',
        message: JSON.parse(document.body.dataset.notificationMessage),
        url: 'https://github.com/mouse0270/bootstrap-notify',
        target: '_blank'
    });
    // toastr['info']('message') is the same as toastr.info('message')
})();
/**
 * ,{
    // settings
    element: 'body',
    position: null,
    type: "info",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "top",
        align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 5000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
    '<span data-notify="icon"></span> ' +
    '<span data-notify="title">{1}</span> ' +
    '<span data-notify="message">{2}</span>' +
    '<div class="progress" data-notify="progressbar">' +
    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
    '</div>' +
    '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>'
});
 */

