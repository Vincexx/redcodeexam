import Vue from 'vue'
import Vuex from 'vuex'
import user from './modules/user'
import auth from './modules/auth'
import role from './modules/role'

Vue.use(Vuex)

export default new Vuex.Store({
	modules: {
        user,
        auth,
        role
	}
})
