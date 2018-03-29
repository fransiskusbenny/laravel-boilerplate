require('./bootstrap');

import Vue from 'vue'
import store from './store'

window.Vue = Vue

window.ev = new class {
    constructor() {
        this.vue = new Vue();
    }

    fire(event, data = null) {
        this.vue.$emit(event, data);
    }

    listen(event, callback) {
        this.vue.$on(event, callback);
    }
}

require('./components')
require('./modules')

Vue.prototype.$flash = (message = 'Welcome', type = 'info', style = 'bar', timeout = 5000, position = 'top') => {
    flash(message, type, style, timeout, position)
}

new Vue({
    el: '.page-container',
    store,
})

