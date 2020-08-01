<template lang="html">
  <section class="Patient">
    <div class="row">
      <div class="col-9 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Pacientes</h5>
            <div class="row">
              <div class="col-6">
                <CreatePatient
                  buttonTitle="Novo Paciente"
                  icon="mdi-account-plus"
                />
              </div>
              <div class="col-6">
                <b-form-group>
                  <b-input-group>
                    <b-form-input placeholder="Paciente"></b-form-input>
                    <b-btn slot="append" class="bg-info text-white">
                      <i class="mdi mdi-magnify ml-1"></i>
                    </b-btn>
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
                    <td>
                      <img
                        class="img-sm rounded-circle mb-2 mb-md-0"
                        src="../../assets/images/faces/face1.jpg"
                        alt="profile image"
                      />
                    </td>
                    <td>{{ listPatient.name + ' ' + listPatient.surname }}</td>
                    <td>{{ listPatient.email }}</td>
                    <td>{{ listPatient.phone }}</td>
                    <td>{{ listPatient.birtdate }}</td>
                    <td>{{ listPatient.profession }}</td>
                    <td>
                      <CreatePatient
                        buttonTitle="Editar"
                        icon="mdi-account-settings-variant"
                      />
                    </td>
                    <td>
                      <b-btn v-b-modal.modallg variant="primary"
                        >Remover <i class="mdi mdi-account-remove ml-1"></i
                      ></b-btn>
                    </td>
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
import CreatePatient from './Create-Patient/CreatePatient'

export default {
  components: {
    CreatePatient
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

<style scoped lang="scss"></style>
