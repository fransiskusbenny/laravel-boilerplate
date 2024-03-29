
window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Add a response interceptor
window.axios.interceptors.response.use(response => {
    return response;
}, error => {
    let {response} = error;
    if (response.status !== 422) {
        let errMessage = "<strong>Whoops something went wrong!! <br/>" +
            "<i>" + response.data.message + "</i></strong><br/>" +
            "Try refreshing the page, or going back and attempting the action again.<br> " +
            "Please contact your site Administrator if this problem persists."

        window.flash(errMessage, 'danger', 'simple', 0, 'top-right')
    }

    return Promise.reject(error);
});

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

import Vue from 'vue'

window.flash = (message = 'Welcome', type = 'info', style = 'bar', timeout = 5000, position = 'top') => {
    let vue = new Vue
    vue.$nextTick(() => {
        $('body').pgNotification({
            message, type, style, timeout, position
        }).show();
    })
}
