<template lang="html">

  <section class="app-sidebar">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="profile-image"> <img src="../../assets/images/faces/face4.jpg" alt="image"/> <span class="online-status online"></span> </div>
            <div class="profile-name">
              <p class="name">Edson Rodrigues</p>
              <p class="designation">SEO</p>
              <div class="badge badge-teal mx-auto mt-3">Online</div>
            </div>
          </div>
        </li>
        <li class="nav-item"><router-link class="nav-link" to="/"><img class="menu-icon" src="../../assets/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">Dashboard</span></router-link></li>
        <li class="nav-item"><router-link class="nav-link" to="/widgets/"><img class="menu-icon" src="../../assets/images/menu_icons/02.png" alt="menu icon"><span class="menu-title">Pacientes</span></router-link></li>
        <li class="nav-item"><router-link class="nav-link" to="/widgets/"><img class="menu-icon" src="../../assets/images/menu_icons/02.png" alt="menu icon"><span class="menu-title">Agenda</span></router-link></li>
        <li class="nav-item">
          <span class="nav-link" v-b-toggle="'sample-pages'">
            <img class="menu-icon" src="../../assets/images/menu_icons/08.png" alt="menu icon"><span class="menu-title">Pacientes</span><i class="menu-arrow"></i>
          </span>
          <b-collapse id="sample-pages">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><router-link class="nav-link" to="/clinic/">Dados</router-link></li>
              <li class="nav-item"><router-link class="nav-link" to="/professional/">Profissionais</router-link></li>
            </ul>
          </b-collapse>
        </li><li class="nav-item">
          <span class="nav-link" v-b-toggle="'sample-pages'">
            <img class="menu-icon" src="../../assets/images/menu_icons/08.png" alt="menu icon"><span class="menu-title">Pacientes</span><i class="menu-arrow"></i>
          </span>
        <b-collapse id="sample-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><router-link class="nav-link" to="/patient/">login</router-link></li>
          </ul>
        </b-collapse>
      </li>
        <li class="nav-item"><router-link class="nav-link" to="/forms/"><img class="menu-icon" src="../../assets/images/menu_icons/04.png" alt="menu icon"><span class="menu-title">Config</span></router-link></li>
      </ul>
    </nav>
  </section>

</template>

<script lang="js">
  export default {
    name: 'app-sidebar'
  }
</script>

<style scoped lang="scss">
  .app-sidebar {

  }
</style>
