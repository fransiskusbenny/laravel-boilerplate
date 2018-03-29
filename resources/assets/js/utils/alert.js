import swal from 'sweetalert2'

const _alert = (type = 'info', text = 'Welcome', props = {}) => {
    return swal({
        type,
        text,
        ...props,
    }).then(result => {
        return new Promise(resolve => resolve(result))
    })
}

const _alert_warning = (text = 'Are you sure you want to this action ?') => {
    let props = {
        showCancelButton: true,
    }
    return _alert('warning', text, props).then(result => {
        return new Promise(resolve => resolve(result))
    })
}

export {
    _alert,
    _alert_warning
}