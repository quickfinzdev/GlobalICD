import { createRouter, createWebHistory } from "vue-router";

import Main from './Main.vue'
import Login from './Login.vue'
import Dashboard from './Dashboard.vue'


import Home from './components/Home.vue'
import Certificate from './components/Certificate.vue'


const router = createRouter({
  history: createWebHistory(),
  routes: [
    {

      path: '/',
      name: 'Main',
      component: Main
    },
    {

      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/dashboard', redirect: '/dashboard/home', name: 'Dashboard'
    },
    {
      path: '/dashboard',
      name: 'Dashboard',
      component: Dashboard,
      children: [
        {
          path: '/dashboard/home',
          name: 'Home',
          component: Home
        },
        {
          path: '/dashboard/certificate',
          name: 'Certificate',
          component: Certificate
        },
      ]
    },



  ]
})

export default router