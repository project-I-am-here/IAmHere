<template lang="html">
  <section class="Patient">
    <div class="row">
      <div class="col-9 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">{{ listClinics.name }}</h5>
            <p class="card-title mb-0">Phone: {{ listClinics.phone }}</p>
            <p class="card-title mb-0">Status: {{ listClinics.status }}</p>
          </div>
        </div>
      </div>
    </div>

  </section>
</template>

<script lang="js">
import Clinic from '../../services/clinic'

export default {
  name: 'Clinics',
  data () {
    return {
      listClinics: []
    }
  },
  mounted () {
    Clinic.listar().then(respost => {
      console.log(respost.data)
      this.listClinics = respost.data
    })
  }
}
</script>

<style scoped lang="scss">
</style>
