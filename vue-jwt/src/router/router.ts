import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/login',
      name: 'login',
      component: () => import(/* webpackChunkName: "login" */ '@/views/Login.vue'),
      meta: { Auth: false, title: 'Login' },
      beforeEnter: (to: any, from: any, next: any) => {
          // Si existe un token, la sesion existe, por lo cual, redirecciona a home
          // if (window.localStorage.getItem('_token')) {
          if (!!window.localStorage.getItem('_token')) {
            next({ path: '/' });
          } else {
            next();
          }
      },
    },
    {
      path: '/register',
      name: 'register',
      component: () => import(/* webpackChunkName: "register" */ '@/views/Register.vue'),
      meta: { Auth: false, title: 'Register' },
      beforeEnter: (to: any, from: any, next: any) => {
          // Si existe un token, la sesion existe, por lo cual, redirecciona a home
          // if (window.localStorage.getItem('_token')) {
          if (!!window.localStorage.getItem('_token')) {
            next({ path: '/' });
          } else {
            next();
          }
      },
    },
    {
      path: '/about',
      name: 'about',
      component: () => import(/* webpackChunkName: "about" */ '@/views/About.vue'),
      meta: { Auth: true, title: 'About' },
    },
    {
      path: '/',
      name: 'blogs',
      component: () => import(/* webpackChunkName: "blogs" */ '@/views/Blog.vue'),
      meta: { Auth: true, title: 'Blogs' },
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import(/* webpackChunkName: "perfil" */ '@/views/Profile.vue'),
      meta: { Auth: true, title: 'Profile' },
    }
  ]
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title;
  if (to.meta.Auth && !window.localStorage.getItem('_token')) {
    next({ path: '/login' });
  } else {
   
    next();
  }
});
export default router;