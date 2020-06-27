import axios from 'axios'
import { getToken } from './auth'

export const http = axios.create({
  baseURL: 'http://api.moveisdevalor.com.br/public/api/'
})

http.interceptors.request.use(async config => {
  const token = getToken()
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})
