import axios from "axios";
const api = axios.create();
api.interceptors.request.use((config) => {
    config.headers['X-Socket-ID'] = window.Echo.socketId() // Echo instance
    // the function socketId () returns the id of the socket connection
    return config
  })
export default api

