import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/home'
import banner from '@/components/banner'
import menu from '@/components/menu'
Vue.use(Router)

export default new Router({
  routes: [
     {
      path: '/',
      name: 'Home',
      component: Home
    }
  ]
})

