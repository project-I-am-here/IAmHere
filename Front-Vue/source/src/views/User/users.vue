<template lang="html">
  <section class="user">
    <div class="row">
      <div class="col-9 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Usuários</h5>
            <b-form-group>
              <b-input-group>
                <b-form-input placeholder="Username"></b-form-input>
                <b-input-group-text slot="append" class="bg-info text-white">
                  <span>Pesquisar</span>
                </b-input-group-text>
              </b-input-group>
            </b-form-group>
            <div class="table-responsive">
              <table class="table center-aligned-table">
                <thead>
                  <tr>
                    <th class="border-bottom-0">ID</th>
                    <th class="border-bottom-0">Nome</th>
                    <th class="border-bottom-0">Email</th>
                    <th class="border-bottom-0">Telefone</th>
                    <th class="border-bottom-0">Data Nascimento</th>
                    <th class="border-bottom-0">Profissão</th>
                  </tr>
                </thead>
                <tbody>
                <tr v-for="listUser of listUsers" :key="listUser.id">
                  <td><img class="img-sm rounded-circle mb-2 mb-md-0" src="../../assets/images/faces/face1.jpg" alt="profile image">
                  </td>
                  <td>{{ listUser.name + ' ' + listUser.surname }}</td>
                  <td>{{ listUser.email }}</td>
                  <td>{{ listUser.phone }}</td>
                  <td>{{ listUser.birtdate }}</td>
                  <td>{{ listUser.profession }}</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</template>

<script lang="js">
import User from '../../services/users'

export default {
  name: 'Users',
  data () {
    return {
      listUsers: []
    }
  },
  mounted () {
    User.listar().then(response => {
      console.log(response.data)
      this.listUsers = response.data
    })
  }
}
</script>

<style scoped lang="scss">
</style>
