<template lang="html">
  <section class="Patient">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Agenda</h5>
            <div class="row">
              <div class="col-2" style="border-right: 1px solid #c1c1c1">
                <div id="__BVID__84" role="group" class="b-form-group form-group">
                  <label for="input12" class="col-form-label pt-0">Profissional</label>
                  <div class=""><select class="form-control custom-select">
                    <option value="">Selecione</option>
                    <option value="a">Alexandre Oliveira</option>
                  </select>
                  </div>
                </div>
                <div role="group" class="b-form-group form-group">
                  <label for="input1" class="col-form-label pt-0">Data</label>
                  <div class="">
                    <input id="input2" type="email" placeholder="Profissional" class="form-control">
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Pesquisar</button>
                <button type="button" class="btn btn-light">Imprimir</button>
              </div>
              <div class="col-10">
                <div class="table-responsive">
                  <table class="table border">
                    <thead>
                    <tr>
                      <th class="border-bottom-0" width="5%">Horario</th>
                      <th class="border-bottom-0" width="5%">Indicador</th>
                      <th class="border-bottom-0">Paciente</th>
                      <th class="border-bottom-0">Telefone</th>
                      <th class="border-bottom-0">Profisional</th>
                      <th class="border-bottom-0" width="5%">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="listSchedule of listSchedules" :key="listSchedule.id">
                      <td>{{ listSchedule.hour }}</td>
                      <td><label class="badge badge-teal">Consulta</label></td>
                      <td>{{ listSchedule.patient.phone }}</td>
                      <td>{{ listSchedule.phone }}</td>
                      <td>{{ listSchedule.professionaname }}</td>
                      <td>
                        <b-dropdown id="ddown25" variant="secondary">
                          <template slot="button-content">
                            <i class="mdi mdi-account"></i>
                          </template>
                          <b-dropdown-item>Agendar</b-dropdown-item>
                          <b-dropdown-item>Remover</b-dropdown-item>
                          <b-dropdown-item>Bloquear</b-dropdown-item>
                          <b-dropdown-divider></b-dropdown-divider>
                        </b-dropdown>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
</template>
<script lang="js">
import Schedule from '../../services/schedule'

export default {
  name: 'schedule',
  data () {
    return {
      listSchedules: []
    }
  },
  mounted () {
    Schedule.listar().then(response => {
      console.log(response.data)
      this.listSchedules = response.data
    })
  }
}
</script>

<style scoped lang="scss">
</style>
