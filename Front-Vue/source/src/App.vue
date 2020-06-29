<template lang="html">
  <div id="app">
    <div class="container-scroller">
      <app-header v-if="authenticated"/>
      <div class="container-fluid page-body-wrapper">
        <app-sidebar v-if="authenticated"/>
        <div class="main-panel">
          <div class="content-wrapper">
            <router-view></router-view>
          </div>
          <app-footer/>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="js">
import AppHeader from '../src/components/partials/AppHeader'
import AppSidebar from '../src/components/partials/AppSidebar'
import AppFooter from '../src/components/partials/AppFooter'
import Login from './views/sample-pages/login'
import {isAuthenticated} from './services/auth'

export default{
  name: 'app',
  components: {
    AppHeader,
    AppSidebar,
    AppFooter,
    Login
  },
  data: () => {
    return {
      authenticated: isAuthenticated
    }
  }
}
</script>

<style>
  @import "../node_modules/mdi/css/materialdesignicons.min.css";
  @import "../node_modules/flag-icon-css/css/flag-icon.min.css";
  @import "../node_modules/font-awesome/css/font-awesome.min.css";
</style>

<style lang="scss">
@import "./assets/scss/style";
</style>
