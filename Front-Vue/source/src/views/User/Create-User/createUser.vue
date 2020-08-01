<template lang="html">
  <section class="modals">
    <b-btn v-b-modal.modallg variant="primary">Novo Paciente <i class="mdi mdi-account-plus ml-1"></i></b-btn>
    <div class="card">
      <div class="card-body">
        <!-- Modal starts -->
        <b-modal id="modallg" title="Novo Paciente" size="lg">
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
        </b-modal>
        <!-- Modal Ends -->
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'CreateUser'
}
</script>

<style></style>
