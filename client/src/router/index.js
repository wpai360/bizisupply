import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/components/Home'
import Academy from '@/components/Academy'
import Login from '@/components/Login'

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/Academy',
            name: 'Academy',
            component: Academy
        },
        {
            path: '/Login',
            name: 'Login',
            component: Login
        }
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
      }
})