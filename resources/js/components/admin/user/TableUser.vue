<template >
  <div id="lista_usuarios">
    <div class="container">
      <h2 class="text-center display-4 text-muted">
        <svg
          aria-hidden="true"
          focusable="false"
          data-prefix="fal"
          data-icon="users"
          role="img"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 640 512"
          width="96"
          class="svg-inline--fa fa-users fa-w-20 fa-7x"
        >
          <path
            fill="currentColor"
            d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM320 256c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm244 192h-40c-15.2 0-29.3 4.8-41.1 12.9 9.4 6.4 17.9 13.9 25.4 22.4 4.9-2.1 10.2-3.3 15.7-3.3h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm304.1 180c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM480 432c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zM157.1 268.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4z"
            class=""
          ></path>
        </svg>
        Usuarios
      </h2>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <filter-search
              @buscar="buscarUser(...arguments)"
              ref="searchUser"
            ></filter-search>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" class="form-control" id="inputCity" />
        </div>
        <div class="form-group col-md-4">
          <filter-role @role="getRole(...arguments)"></filter-role>
        </div>
        <div class="form-group col-md-2">
          <filter-status @status="getStatus(...arguments)"></filter-status>
        </div>
      </div>
      <div class="row mt-2">
        <div
          class="
            col-12 col-sm-6 col-md-4
            d-flex
            align-items-stretch
            flex-column
          "
          v-for="(user, index) in users"
          :key="index"
        >
          <div class="card d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
              <div v-if="user.deleted_at" class="ribbon-wrapper">
                <div class="ribbon bg-maroon">locked</div>
              </div>
              <nav class="navbar">
                <p class="navbar-brand text-muted">
                  <img
                    src="/image/logo-ips-header.png"
                    width="180"
                    height="40"
                    alt="ips - logo - Corrientes - institutto de prevision social"
                  />
                </p>
              </nav>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-7">
                  <div v-if="editMode && user_id == user.id">
                    <div class="input-group mb-1">
                      <button v-if="user.deleted_at" class="btn btn-success"><i class="fas fa-unlock">Desbloquear</i></button>
                    </div>
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="inputName"
                        v-model="name"
                      />
                    </div>
                    <div class="input-group mb-1">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user-tag"></i>
                        </div>
                      </div>
                      <select name="" id="selectRoles" class="custom-select">
                        <option value="">Admin</option>
                        <option value="">User</option>
                      </select>
                    </div>
                    <ul class="ml-0 mb-0 fa-ul text-muted">
                      <li class="small">
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                          </div>
                          <input
                            type="email"
                            class="form-control"
                            id="inputEmail"
                            v-model="email"
                          />
                        </div>
                      </li>
                      <li class="small">
                        <div class="input-group mb-1">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-lg fa-phone text-xs"></i>
                            </div>
                          </div>
                          <input
                            type="text"
                            class="form-control"
                            id="inputPhone"
                            v-model="phone"
                          />
                        </div>
                      </li>
                    </ul>

                  </div>

                  <div v-else>
                    <h2 class="lead text-capitalize">
                      {{ user.name }}
                      <a
                        href="#"
                        class="text-muted"
                        @click="editUser(user, index)"
                        ><i class="fas fa-pen"></i
                      ></a>
                    </h2>
                    <span
                      class="text-muted text-capitalize"
                      v-for="(rol, index) in user.roles"
                      :key="index"
                      >{{ rol.name }}
                      <i v-if="index < user.roles.length - 1">/</i>
                    </span>

                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small">
                        <span class="fa-li"
                          ><i class="fas fa-lg fa-at"></i
                        ></span>
                        <div class="d-flex">{{ user.email }}</div>
                      </li>
                      <li class="small">
                        <span class="fa-li"
                          ><i class="fas fa-lg fa-phone"></i
                        ></span>
                        <div class="d-flex">+5493794123456</div>
                      </li>
                    </ul>
                  </div>


                </div>
                <div class="col-5 text-center">
                  <img
                    :src="
                      'https://ui-avatars.com/api/?name=' +
                      user.name +
                      '&color=7F9CF5&background=EBF4FF'
                    "
                    alt="user-avatar"
                    class="img-circle img-fluid shadow"
                  />
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <div v-if="editMode && user_id == user.id">
                  <button class="btn btn-secondary" @click="cancel()">
                    Cancelar
                  </button>
                  <button class="btn btn-primary" @click="saveChange()">
                    Confirmar
                  </button>
                </div>
                <div v-else>
                  <a
                    v-if="!user.deleted_at"
                    href="#"
                    class="btn btn-sm bg-gradient-red text-white"
                    @click="lock(user, index)"
                  >
                    <i class="fas fa-lock"></i>
                  </a>
                  <a href="#" class="btn btn-sm bg-gradient-primary text-white">
                    <i class="fas fa-user"></i> Ver Perfil
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <infinite-loading
      :identifier="infiniteId"
      spinner="waveDots"
      @infinite="getUsers"
    >
      <div slot="no-more">No hay Mas Registros</div>
      <div slot="no-results">Sin Resultado Encontrados</div>
    </infinite-loading>
  </div>
</template>

<script>
const apiUrl = "http://aportes.test/api/users";
import FilterSearch from "../filtro/FilterSearch.vue";
import FilterRole from "../filtro/FilterRole.vue";
import FilterStatus from "../filtro/FilterStatus.vue";
export default {
  components: {
    "filter-search": FilterSearch,
    "filter-role": FilterRole,
    "filter-status": FilterStatus,
  },
  data: function () {
    return {
      users: [],
      name: "",
      email: "",
      phone: "",
      user_id: "",
      page: 1,
      timeOut: 500,
      search: "",
      infiniteId: +new Date(),
      filter: {
        text: "",
        role_id: "",
        status: "",
      },
      editMode: true,
    };
  },
  methods: {
    getUsers($state) {
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        axios
          .post(`${apiUrl}/filter?page=${this.page}`, this.filter)
          .then((response) => {
            if (response.data.data.length) {
              this.page += 1;
              this.users.push(...response.data.data);
              $state.loaded();
            } else {
              $state.complete();
            }
          });
      }, this.timeOut);
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.users = [];
      this.infiniteId += 1;
    },
    buscarUser(text) {
      this.filter.text = text;
      this.refreshInfiniteLoading();
      //
    },
    getRole(role) {
      this.filter.role_id = role;
      this.refreshInfiniteLoading();
    },
    getStatus(status) {
      this.filter.status = status;
      this.refreshInfiniteLoading();
    },
    lock(user, index) {
      Vue.swal
        .fire({
          title: `Seguro quiere realizar estos cambios para <i class="text-secondary">${user.name}<i> ?`,
          showCancelButton: true,
          confirmButtonText: "Confirmar",
          cancelButtonText: "Cancelar",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios.delete(`${apiUrl}/delete/${user.id}`).then((response) => {
              if (response.data.isValid) {
                this.users[index].deleted_at = new Date();
                Vue.swal.fire("Guardado!", "", "success");
              } else {
                Vue.swal.fire("Algo Salío Mal!", "", "error");
              }
            });
            this.refreshInfiniteLoading();
          }
        });
    },
    cancel() {
      this.editMode = false;
    },
    editUser(user, index) {
      this.editMode = true;
      this.name = user.name;
      this.email = user.email;
      this.phone = user.phone;
      this.user_id = user.id;
    },
    saveChange() {
      alert("confirmar cambios");
    },
  },
};
</script>
