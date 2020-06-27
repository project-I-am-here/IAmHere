import { http } from './config'

export default {
  login: (data) => {
    return http.post('/login', data)
  }
}
