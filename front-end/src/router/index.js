import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/home'
import Register from '@/components/register'
import Login from '@/components/login'
import newLogin from '@/components/newlogin'
import Product from '@/components/product'
Vue.use(Router)

export default new Router({
  routes: [
     {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/product',
      name: 'Product',
      component: Product
    },
    {
      path: '/newlogin',
      name: 'newLogin',
      component: newLogin
    }
  ]
})

