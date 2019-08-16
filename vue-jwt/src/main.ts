import Vue from 'vue'
import App from './App.vue'
import router from '@/router/router'
import store from '@/store/store'

import 'bootstrap'; 
import 'bootstrap/dist/css/bootstrap.min.css';
import '@/assets/scss/clean-blog.scss';

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
