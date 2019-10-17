import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/components/Home'
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
            path: '/Home',
            name: 'Home',
            component: Home
        },
        {
            path: '/Login',
            name: 'Login',
            component: Login
        }
    ]
})