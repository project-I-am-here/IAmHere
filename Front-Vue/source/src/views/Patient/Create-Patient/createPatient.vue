<template lang="html">
  <div>
    <b-btn v-b-modal.modallg variant="primary" v-on:click="hover"
      >{{ buttonTitle }} <i class="mdi ml-1" :class="icon"></i
    ></b-btn>
    <div class="card" v-if="hovering">
      <div>
        <!-- Modal starts -->
        <b-modal
          id="modallg"
          title="Novo Paciente"
          size="ml"
          @show="hovering"
          @hidden="hover"
          @ok="hover"
        >
          <div class="container">
            <div class="row">
              <div class="col-6 ">
                <b-form-group vertical label="Nome">
                  <b-form-input placeholder="Nome"></b-form-input>
                </b-form-group>
              </div>
              <div class="col-6 ">
                <b-form-group vertical label="Sobrenome">
                  <b-form-input placeholder="Sobrenome"></b-form-input>
                </b-form-group>
              </div>
              <div class="col-12">
                <b-form-group vertical label="E-mail">
                  <b-form-input placeholder="E-mail"></b-form-input>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="Data de Nascimento">
                  <b-form-input placeholder="DD/MM/AAAA"></b-form-input>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="Telefone">
                  <b-form-input placeholder="(99) 99999-9999"></b-form-input>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="RG">
                  <b-form-input placeholder="RG"></b-form-input>
                </b-form-group>
              </div>
              <div class="col-md-6">
                <b-form-group vertical label="CPF">
                  <b-form-input placeholder="CPF"></b-form-input>
                </b-form-group>
              </div>
            </div>
          </div>
          <template v-slot:modal-footer>
            <b-button variant="outline-secondary" size="sm" @click="hover">
              Cancelar
            </b-button>
            <b-button variant="primary" size="sm" @click="hover">
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
      hovering: false
    }
  },
  methods: {
    hover: function() {
      this.hovering = !this.hovering
    }
  }
}
</script>

<style></style>
