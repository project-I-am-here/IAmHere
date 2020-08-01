<template lang="html">
  <section class="dashboard">
    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap">
              <div>
                <i class="mdi mdi-cube text-danger icon-lg"></i>
              </div>
              <div>
                <p class="card-text text-right">Total Revenue</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-right mb-0">$65,650</h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3">
              <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap">
              <div>
                <i class="mdi mdi-receipt text-warning icon-lg"></i>
              </div>
              <div>
                <p class="card-text text-right">Orders</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-right mb-0">3455</h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3">
              <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap">
              <div>
                <i class="mdi mdi-poll-box text-teal icon-lg"></i>
              </div>
              <div>
                <p class="card-text text-right">Sales</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-right mb-0">5693</h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3">
              <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
            </p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap">
              <div>
                <i class="mdi mdi-account-location text-info icon-lg"></i>
              </div>
              <div>
                <p class="card-text text-right">Employees</p>
                <div class="fluid-container">
                  <h3 class="card-title font-weight-bold text-right mb-0">246</h3>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3">
              <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Usuários</h5>
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
                <tr v-for="listUser of listUsers" :key="listUser.id">
                  <td>{{ listUser.id }}</td>
                  <td>{{ listUser.name + ' ' + listUser.surname }}</td>
                  <td>{{ listUser.email }}</td>
                  <td>{{ listUser.phone }}</td>
                  <td>{{ listUser.birtdate }}</td>
                  <td>{{ listUser.profession }}</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-4">Manage Tickets</h5>
            <div class="fluid-container">
              <div class="row ticket-card mt-3 pb-2 border-bottom">
                <div class="col-md-1">
                  <img class="img-sm rounded-circle mb-2 mb-md-0" src="../assets/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="ticket-details col-md-9">
                  <div class="d-flex">
                    <p class="text-primary font-weight-bold mr-2 mb-0 no-wrap">James :</p>
                    <p class="font-weight-medium mr-1 mb-0">[#23047]</p>
                    <p class="font-weight-bold mb-0 ellipsis">Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>
                  <p class="text-small text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum sequi a, nostrum.</p>
                  <div class="row text-muted d-flex mb-2 mb-md-0">
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Last responded :</p>
                      <p class="Last-responded mr-2 mb-0">3 hours ago</p>
                    </div>
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Due in :</p>
                      <p class="Last-responded mr-2 mb-0">2 Days</p>
                    </div>
                  </div>
                </div>
                <div class="ticket-actions col-md-2">
                  <div class="btn-group dropdown">
                    <button type="button" class="btn btn-teal dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#"><i class="fa fa-reply fa-fw"></i>Quick reply</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-history fa-fw"></i>Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row ticket-card mt-3 pb-2 border-bottom">
                <div class="col-md-1">
                  <img class="img-sm rounded-circle mb-2 mb-md-0" src="../assets/images/faces/face2.jpg" alt="profile image">
                </div>
                <div class="ticket-details col-md-9">
                  <div class="d-flex">
                    <p class="text-primary font-weight-bold mr-2 mb-0 no-wrap">Stella :</p>
                    <p class="font-weight-medium mr-1 mb-0">[#23135]</p>
                    <p class="font-weight-bold mb-0 ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente.</p>
                  </div>
                  <p class="text-small text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptates fuga quae?</p>
                  <div class="row text-muted d-flex mb-2 mb-md-0">
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Last responded :</p>
                      <p class="Last-responded mr-2 mb-0">3 hours ago</p>
                    </div>
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Due in :</p>
                      <p class="Last-responded mr-2 mb-0">2 Days</p>
                    </div>
                  </div>
                </div>
                <div class="ticket-actions col-md-2">
                  <div class="btn-group dropdown">
                    <button type="button" class="btn btn-teal dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#"><i class="fa fa-reply fa-fw"></i>Quick reply</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-history fa-fw"></i>Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row ticket-card mt-3 pb-2 border-bottom">
                <div class="col-md-1">
                  <img class="img-sm rounded-circle mb-2 mb-md-0" src="../assets/images/faces/face3.jpg" alt="profile image">
                </div>
                <div class="ticket-details col-md-9">
                  <div class="d-flex">
                    <p class="text-primary font-weight-bold mr-2 mb-0 no-wrap">John Doe :</p>
                    <p class="font-weight-medium mr-1 mb-0">[#23246]</p>
                    <p class="font-weight-bold mb-0 ellipsis">Lorem ipsum dolor sit amet.</p>
                  </div>
                  <p class="text-small text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  <div class="row text-muted d-flex mb-2 mb-md-0">
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Last responded :</p>
                      <p class="Last-responded mr-2 mb-0">3 hours ago</p>
                    </div>
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Due in :</p>
                      <p class="Last-responded mr-2 mb-0">2 Days</p>
                    </div>
                  </div>
                </div>
                <div class="ticket-actions col-md-2">
                  <div class="btn-group dropdown">
                    <button type="button" class="btn btn-teal dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#"><i class="fa fa-reply fa-fw"></i>Quick reply</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-history fa-fw"></i>Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row ticket-card mt-3 pb-2 border-bottom">
                <div class="col-md-1">
                  <img class="img-sm rounded-circle mb-2 mb-md-0" src="../assets/images/faces/face4.jpg" alt="profile image">
                </div>
                <div class="ticket-details col-md-9">
                  <div class="d-flex">
                    <p class="text-primary font-weight-bold mr-2 mb-0 no-wrap">Marques Brownlee :</p>
                    <p class="font-weight-medium mr-1 mb-0">[#23047]</p>
                    <p class="font-weight-bold mb-0 ellipsis">Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>
                  <p class="text-small text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum sequi a, nostrum.</p>
                  <div class="row text-muted d-flex mb-2 mb-md-0">
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Last responded :</p>
                      <p class="Last-responded mr-2 mb-0">3 hours ago</p>
                    </div>
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Due in :</p>
                      <p class="Last-responded mr-2 mb-0">2 Days</p>
                    </div>
                  </div>
                </div>
                <div class="ticket-actions col-md-2">
                  <div class="btn-group dropdown">
                    <button type="button" class="btn btn-teal dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#"><i class="fa fa-reply fa-fw"></i>Quick reply</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-history fa-fw"></i>Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row ticket-card mt-3 pb-2">
                <div class="col-md-1">
                  <img class="img-sm rounded-circle mb-2 mb-md-0" src="../assets/images/faces/face5.jpg" alt="profile image">
                </div>
                <div class="ticket-details col-md-9">
                  <div class="d-flex">
                    <p class="text-primary font-weight-bold mr-2 mb-0 no-wrap">Marina John :</p>
                    <p class="font-weight-medium mr-1 mb-0">[#23034]</p>
                    <p class="font-weight-bold mb-0 ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi amet totam, dignissimos fugiat voluptates, ab magni, necessitatibus excepturi inventore, mollitia ipsa quaerat aliquam.</p>
                  </div>
                  <p class="text-small text-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae animi omnis, a?</p>
                  <div class="row text-muted d-flex mb-2 mb-md-0">
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Last responded :</p>
                      <p class="Last-responded mr-2 mb-0">3 hours ago</p>
                    </div>
                    <div class="col-xl-4 d-sm-flex">
                      <p class="mb-0 mr-2">Due in :</p>
                      <p class="Last-responded mr-2 mb-0">2 Days</p>
                    </div>
                  </div>
                </div>
                <div class="ticket-actions col-md-2">
                  <div class="btn-group dropdown">
                    <button type="button" class="btn btn-teal dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Manage
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#"><i class="fa fa-reply fa-fw"></i>Quick reply</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-history fa-fw"></i>Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"><i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                      <a class="dropdown-item" href="#"><i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                    </div>
                  </div>
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
import User from '../services/users'

export default {
  name: 'dashboard',
  data () {
    return {
      listUsers: []
    }
  },
  mounted () {
    User.listar().then(response => {
      console.log(response.data)
      this.listUsers = response.data
    })
  }
}
</script>

<style scoped lang="scss">
</style>
