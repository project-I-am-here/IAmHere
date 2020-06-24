<template lang="html">
  <section class="profile">
    <div class="row">
      <div class="col-9 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Meus dados</h5>
            <p>Nome: {{ user.name }}</p>
            <p>Email: {{ user.email }}</p>
            <p>Telefone: {{ user.phone }}</p>
            <p>Profissão</p>

            <h5 class="card-title mb-4">Endereço</h5>
            <p>Rua</p>
            <p>Cidade</p>
            <p>Estado</p>
            <p>CEP</p>
          </div>
        </div>
      </div>
      <div class="col-3 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Clinica</h5>
            <div class="row">
              <div class="col-md-3"><img class="rounded-circle w-100" src="../../assets/images/samples/300x300/01.jpg" alt=""></div>
              <div class="col-md-9">
                <h5 class="mb-1">{{ clinic.name }}</h5>
                <p class="mb-0">{{ clinic.phone }}</p>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</template>

<script lang="js">
import Clinic from '../../services/clinic'
import Users from '../../services/users'

export default {
  name: 'Clinics',
  data () {
    return {
      clinic: [],
      user: []
    }
  },
  mounted () {
    Clinic.listar().then(respost => {
      console.log(respost.data)
      this.clinic = respost.data
    })
    Users.listar().then(respost => {
      console.log(respost.data)
      this.user = respost.data
    })
  }
}
</script>

<style scoped lang="scss">
</style>
