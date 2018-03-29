import MenuIndex from './menu/Index'

import TablePermission from './permission/Table'

import TableUser from './user/Table'
import FormCreateUser from './user/FormCreate'
import FormEditUser from './user/FormEdit'

Vue.component('menu-index', MenuIndex)
Vue.component('table-permission', TablePermission)

Vue.component('table-user', TableUser)
Vue.component('form-create-user', FormCreateUser)
Vue.component('form-edit-user', FormEditUser)