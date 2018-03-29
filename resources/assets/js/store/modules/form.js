import {_alert_warning} from "../../utils/alert";

const form = {
    actions: {
        submit({commit}, payload) {
            let {endpoint, method, message, data} = payload,
                text = 'Are you sure you want to submit this form ?'

            if (message) {
                text = message
            }

            return new Promise((resolve, reject) => {
                _alert_warning(text).then(result => {
                    if (result.value) {
                        commit('cardLoading')
                        window.axios[method](endpoint, data).then(res => {
                            commit('cardUnloading')
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
}

export default form