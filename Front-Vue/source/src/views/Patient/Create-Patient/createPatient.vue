<template lang="html">
  <div>
    <b-btn v-b-modal.modallg variant="primary" v-on:click="hover"
      >{{ buttonTitle }} <i class="mdi ml-1" :class="icon"></i
    ></b-btn>
    <div class="card" v-if="toggle">
      <div>
        <!-- Modal starts -->
        <b-modal
          id="modallg"
          title="Novo Paciente"
          size="ml"
          @show="toggle"
          @hidden="hover"
          @ok="hover"
        >
          <div class="container">
            <div class="row">
              <div class="col-6 ">
                <b-form-group vertical label="Nome">
                  <b-form-input
                    v-model="patient.name"
                    placeholder="Nome"
                  ></b-form-input>
                </b-form-group>
              </div>
              <div class="col-6 ">
                <b-form-group vertical label="Sobrenome">
                  <b-form-input
                    v-model="patient.surname"
                    placeholder="Sobrenome"
                  ></b-form-input>
                </b-form-group>
              </div>
              <div class="col-12">
                <b-form-group vertical label="E-mail">
                  <b-form-input
                    v-model="patient.email"
                    placeholder="E-mail"
                  ></b-form-input>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="Data de Nascimento">
                  <b-form-input
                    v-model="patient.birtdate"
                    type="date"
                    placeholder="DD/MM/AAAA"
                  ></b-form-input>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="Telefone">
                  <input
                    class="form-control"
                    v-model="patient.phone"
                    v-mask="'(##) #####-####'"
                    placeholder="(99) 99999-9999"
                  />
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="RG">
                  <b-form-input
                    v-model="patient.rg"
                    placeholder="RG"
                  ></b-form-input>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="CPF">
                  <input
                    class="form-control"
                    v-mask="'###.###.###-##'"
                    v-model="patient.cpf"
                    placeholder="CPF"
                  />
                </b-form-group>
              </div>
            </div>
          </div>
          <template v-slot:modal-footer>
            <b-button variant="outline-secondary" size="sm" @click="hover">
              Cancelar
            </b-button>
            <b-button variant="primary" size="sm" @click="savePatient">
              Salvar
            </b-button>
          </template>
        </b-modal>
        <!-- Modal Ends -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CreatePatient',
  props: ['buttonTitle', 'icon'],
  data: function() {
    return {
      toggle: false,
      patient: {
        name: '',
        surname: '',
        email: '',
        birtdate: '',
        phone: '',
        rg: '',
        cpf: ''
      }
    }
  },
  methods: {
    hover: function() {
      this.patient = {}
      this.toggle = !this.toggle
    },
    savePatient: function() {
      console.log(this.patient)
      this.hover()
    },
    phoneFormater: function() {
      return '(00) 0000-0000'
    }
  }
}
</script>

<style></style>
