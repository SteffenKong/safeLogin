// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import './assets/style/global.css'
import ElementUI from 'element-ui';

// 载入加解密库
import { JSEncrypt } from 'jsencrypt'

import 'element-ui/lib/theme-chalk/index.css';
import Axios from './assets/js/axios.js';

Vue.use(ElementUI)

Vue.use(Axios)





Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
