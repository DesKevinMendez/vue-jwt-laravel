import axios from 'axios';
// import store from '@/store';

const URL: string = 'http://127.0.0.1:8000/';
const http = axios.create({
  baseURL: URL,
  headers: {
    'Authorization': `Bearer ${window.localStorage.getItem('_token')}`,
  }
});
// Add a request interceptor
http.interceptors.request.use((config)=> {
  // Do something before request is sent
  return config;
}, (error)=> {
  // Do something with request error

  return Promise.reject(error);
});

// Add a response interceptor
http.interceptors.response.use( (response: any)=> {
  // Do something with response data
  return response;
}, (error)=> {
  // Do something with response error

  return Promise.reject(error);
});
export { http, URL };