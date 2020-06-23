import { http } from  './config'

export default {

  listar: () => {
    return http.get('user')
  },
  profile: () => {
    return http.get('profile')
  }
}
