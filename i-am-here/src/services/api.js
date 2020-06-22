import axios from "axios";
import { getToken } from "./auth"

export const api = axios.create({
    // baseURL: "http://induca.com.br/here/public/api",
    baseURL: "http://api.moveisdevalor.com.br/public/api",
    headers: {
        "Content-type": "application/json"
    }
});

api.interceptors.request.use(async config => {
    const token = getToken();
    if (token) {
        config.headers.Authorization = `Bearer ${token}`
        console.log(config.headers.Authorization)
    }
    return config;
})