// 封装项目的axios插件

import request from 'axios';

var myPlugin = {

}

myPlugin.install = (Vue) => {
    var axiosObj = request.create({
      baseURL:'http://login.safeLogin.com/'
    });

    // 拦截器
    axiosObj.interceptors.request.use(config => {
        if (config.url != 'Login') {
          config.headers.Authorization = localStorage.getItem('token')
        }
        return config;
    },(err) => {
      console.log(err);
    });

  Vue.prototype.$axios = axiosObj
};


export default myPlugin
