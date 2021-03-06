import Vue from 'vue'
import Router from 'vue-router'

// Dashboard Components
import dashboard from '../views/dashboard'

// Users
import users from '../views/User/users'
import usersForms from '../views/User/usersForms'

// Widgets
import widgets from '../views/widgets'

// UI Components
import alerts from '../views/ui-components/alerts'
import badges from '../views/ui-components/badges'
import breadcrumbs from '../views/ui-components/breadcrumbs'
import buttons from '../views/ui-components/buttons'
import carousel from '../views/ui-components/carousel'
import dropdowns from '../views/ui-components/dropdowns'
import icons from '../views/ui-components/icons'
import modals from '../views/ui-components/modals'
import paginations from '../views/ui-components/paginations'
import progress from '../views/ui-components/progress'
import tables from '../views/ui-components/tables'
import typography from '../views/ui-components/typography'
import tabs from '../views/ui-components/tabs'
import tooltips from '../views/ui-components/tooltips'

// Sample Pages
import error404 from '../views/sample-pages/error-404'
import error500 from '../views/sample-pages/error-500'

import login from '../views/sample-pages/login'
import register from '../views/sample-pages/register'

import patient from '../views/Patient/patient'
import clinic from '../views/Clinic/clinic'
import professional from '../views/professional/professional'
import schedule from '../views/schedule/schedule'

// Sample Pages
import profile from '../views/User/profile'

Vue.use(Router)

const isAuthenticated = !!localStorage.getItem('@soull-token')

export default new Router({
  linkActiveClass: 'active',
  routes: [
    {
      path: '/widgets',
      name: 'widgets',
      component: widgets
    },
    {
      path: '/404',
      name: 'error-404',
      component: error404
    },
    {
      path: '/500',
      name: 'error-500',
      component: error500
    },
    {
      path: '/register',
      name: 'register',
      component: register
    },
    {
      path: '/alerts',
      name: 'alerts',
      component: alerts
    },
    {
      path: '/badges',
      name: 'badges',
      component: badges
    },
    {
      path: '/breadcrumbs',
      name: 'breadcrumbs',
      component: breadcrumbs
    },
    {
      path: '/buttons',
      name: 'buttons',
      component: buttons
    },
    {
      path: '/carousel',
      name: 'carousel',
      component: carousel
    },
    {
      path: '/dropdowns',
      name: 'dropdowns',
      component: dropdowns
    },
    {
      path: '/icons',
      name: 'icons',
      component: icons
    },
    {
      path: '/modals',
      name: 'modals',
      component: modals
    },
    {
      path: '/paginations',
      name: 'paginations',
      component: paginations
    },
    {
      path: '/progress',
      name: 'progress',
      component: progress
    },
    {
      path: '/tables',
      name: 'tables',
      component: tables
    },
    {
      path: '/typography',
      name: 'typography',
      component: typography
    },
    {
      path: '/tabs',
      name: 'tabs',
      component: tabs
    },
    {
      path: '/tooltips',
      name: 'tooltips',
      component: tooltips
    },
    {
      path: '/',
      name: 'dashboard',
      component: dashboard,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/users',
      name: 'users',
      component: users,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/profile',
      name: 'profile',
      component: profile,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/userForm',
      name: 'userForm',
      component: usersForms,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/patient',
      name: 'patient',
      component: patient,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/professional',
      name: 'professional',
      component: professional,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/clinic',
      name: 'clinic',
      component: clinic,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/schedule',
      name: 'schedule',
      component: schedule,
      beforeEnter: (to, from, next) => {
        if (isAuthenticated) next()
        else next('/login')
      }
    },
    {
      path: '/login',
      name: 'login',
      component: login,
      beforeEnter: (to, from, next) => {
        if (!isAuthenticated) next()
        else next('/')
      },
      beforeRouteLeave: (to, from, next) => {
        if (!isAuthenticated) next()
        else next('/')
      }
    }
  ]
})
