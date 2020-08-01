<template lang="html">
  <section class="Patient">

    <div class="row">
      <div class="col-9 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Pacientes</h5>
            <div class="row">
              <div class="col-6">
                <CreateUser/>
            </div>
              <div class="col-6">
            <b-form-group>
              <b-input-group>
                <b-form-input placeholder="Username"></b-form-input>
                <b-input-group-text slot="append" class="bg-info text-white">
                  <span>Pesquisar</span>
                </b-input-group-text>
              </b-input-group>
            </b-form-group>
            </div>
            </div>
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
                <tr v-for="listPatient of listPatients" :key="listPatient.id">
                  <td><img class="img-sm rounded-circle mb-2 mb-md-0" src="../../assets/images/faces/face1.jpg" alt="profile image">
                  </td>
                  <td>{{ listPatient.name + ' ' + listPatient.surname }}</td>
                  <td>{{ listPatient.email }}</td>
                  <td>{{ listPatient.phone }}</td>
                  <td>{{ listPatient.birtdate }}</td>
                  <td>{{ listPatient.profession }}</td>
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
import Patient from '../../services/patient'
import CreateUser from '../User/Create-User/CreateUser'

export default {
  components: {
    CreateUser
  },
  name: 'Patients',
  data () {
    return {
      listPatients: []
    }
  },
  mounted () {
    Patient.listar().then(response => {
      console.log(response.data)
      this.listPatients = response.data
    })
  }
}
</script>

<style scoped lang="scss">
</style>
