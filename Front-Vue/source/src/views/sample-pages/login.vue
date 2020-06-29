<template lang="html">

  <section class="login">
    <div class="wrapper d-flex align-items-center auth login-full-bg">
      <div class="row w-100">
        <div class="col-lg-6 mx-auto">
          <div class="auth-form-dark text-left p-5">
            <h2>Login</h2>
            <h4 class="font-weight-light">Hello! let's get started</h4>
            <form class="pt-5">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" v-model="email">
                  <i class="mdi mdi-account"></i>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" v-model="password">
                  <i class="mdi mdi-eye"></i>
                </div>
                <div class="mt-5">
                  <a class="btn btn-block btn-warning btn-lg font-weight-medium" @click="loginFunction">Login</a>
                </div>
                <div class="mt-3 text-center">
                  <a class="auth-link text-white">Forgot password?</a>
                </div>
              </form>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</template>

<script lang="js">
import Auth from '../../services/login'
import {tokenLogin} from '../../services/auth'
import Router from 'vue-router'

const router = new Router({})

export default {
  name: 'login',
  data () {
    return {
      email: '',
      password: ''
    }
  },
  methods: {
    loginFunction: function () {
      Auth.login({email: this.email, password: this.password}).then((response) => {
        tokenLogin(response.data.token)
        router.push({name: 'dashboard'})
        console.log(response.data.token)
      })
    }
  }

}
</script>

<style scoped lang="scss">
.login {

}
</style>
