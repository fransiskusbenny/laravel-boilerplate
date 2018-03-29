import Vue from 'vue'
import Vuex from 'vuex'
import {_alert_warning} from "../utils/alert"
import {Form} from './modules'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        form: Form,
    },

    state: {
        cardRefresh: false,
        tableReload: false
    },

    mutations: {
        cardLoading(state) {
            state.cardRefresh = true
        },

        cardUnloading(state) {
            state.cardRefresh = false
        },

        toggleTableReload(state) {
            state.tableReload = !state.tableReload
        }
    },

    actions: {
        destroy({commit}, url, message = 'Are you sure you want to delete this data', method = 'delete') {
            return new Promise((resolve, reject) => {
                _alert_warning(message).then(result => {
                    if (result.value) {
                        commit('cardLoading')
                        window.axios[method](url).then(res => {
                            commit('toggleTableReload')
                            resolve(res)
                        }).catch(err => {
                            commit('cardUnloading')
                            reject(err)
                        })
                    }
                })
            })
        }
    }
})