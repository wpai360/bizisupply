import Vue from 'vue'
import router from './router'
import App from './App.vue'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheckSquare, faAngleDoubleRight, faPhone, faEnvelope, faAddressBook} from '@fortawesome/free-solid-svg-icons'
import { faTwitter,faFacebookF } from '@fortawesome/fontawesome-free-brands';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faCheckSquare, faAngleDoubleRight, faTwitter, faFacebookF, faPhone, faEnvelope, faAddressBook)

Vue.config.productionTip = false
Vue.use(BootstrapVue)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.prototype.$goRoute = function (index) {
  this.$router.push(index)
}

new Vue({
  el: '#app',
  router,
  render: h => h(App),
})