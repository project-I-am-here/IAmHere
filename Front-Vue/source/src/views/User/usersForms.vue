<template lang="html">
  <section class="UsersForms">
    <div class="row">
      <div class="col-9 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Usuários</h5>
            <b-form-group label="Nome" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Email"  label-for="input1">
              <b-form-input type="email" id="input1" placeholder="Email address"></b-form-input>
            </b-form-group>
            <b-form-group label="Password"  label-for="input2">
              <b-form-input type="password" id="input2" placeholder="Password"></b-form-input>
            </b-form-group>
            <b-form-group label="Telefone" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Data Nascimento" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="CPF" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="RG" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Naturalidade" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Profissão" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Endereço" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="n°" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Bairro" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Cidade" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>
            <b-form-group label="Estado" label-for="input11">
              <b-form-input type="text" id="nome" placeholder="Username" size="lg"></b-form-input>
            </b-form-group>

          </div>
        </div>
      </div>
    </div>

  </section>
</template>

<script lang="js">
import User from '../../services/users'

export default {
  name: 'usersForms',
  data () {
    return {
      listUser: []
    }
  },
  mounted () {
    User.listar().then(response => {
      console.log(response.data)
      this.listUser = response.data
    })
  }
}
</script>

<style scoped lang="scss">
</style>
