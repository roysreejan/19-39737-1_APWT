import axios from 'axios';

const Instance = axios.create({
    baseURL: 'http://127.0.0.1:8000/api'
});

Instance.interceptors.request.use(function (config) {
    config.headers.common['Authorization'] =  localStorage.getItem("user");
    // console.log( config.headers.common['Authorization']);
    // console.log("intercepted");
    return config;
  }, function (error) {
    return Promise.reject(error);
  });
export default Instance;