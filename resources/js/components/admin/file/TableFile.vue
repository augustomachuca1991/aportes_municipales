<template>
  <div class="container">
    <alert-notification :auth="user"></alert-notification>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <create-file :user="user" @file="newFile(...arguments)"></create-file>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3 class="text-muted text-center"> Lista de Archivos importados</h3>
        <div class="row">
          <div class="col">
            <filter-search @buscar="search(...arguments)"></filter-search>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-6">
            <filter-periodo
              @periodo="getPeriodo(...arguments)"
            ></filter-periodo>
          </div>
          <div class="col-md-12 col-lg-6">
            <filter-tipo @type="getTipo(...arguments)"></filter-tipo>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3 justify-content-center" v-if="files.length">
      <div class="col-md-8">
        <div class="card" v-for="(file, index) in files" :key="file.id">
          <div class="card-body">
            <section
              class="
                ps-container
                scrollbar-container
                ps ps--theme_default ps--active-y
              "
            >
              <ul class="todo-list-wrapper list-group list-group-flush">
                <li class="list-group-item">
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper row">
                      <div class="widget-content-left col mb-4 mb-lg-0">
                        <div class="widget-content-left text-olive">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            width="42"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            />
                          </svg>
                          {{ file.name }}
                        </div>
                        <div class="widget-heading py-2">
                          <span v-if="file.apply" class="badge bg-olive"
                            >Finalizado</span
                          >
                          <span v-else>{{ file.user.name }}</span>
                        </div>
                        <div class="text-muted" v-if="file.secuencia">
                          Rectificativa:
                          {{ file.secuencia }}
                        </div>
                        <div v-if="!file.status" class="row">
                          <div
                            v-if="!file.apply && !file.rectificar"
                            class="col"
                          >
                            <button
                              class="btn btn-secondary"
                              @click="task(index, file)"
                            >
                              <i class="fas fa-upload"></i>Aplicar
                            </button>
                          </div>
                          <div
                            v-else-if="!file.apply && file.rectificar"
                            class="col"
                          >
                            <a href="#" @click="rectificar(index, file)">
                              <i class="fas fa-upload text-warning">
                                actualizar</i
                              >
                            </a>
                          </div>
                          <div v-else class="col">
                            <a
                              id="show-modal"
                              href="#"
                              @click="isOpen(index, file)"
                              ><i class="fas fa-pen text-danger text-md"
                                >rectificar</i
                              ></a
                            >
                            <a href="#" @click="download(file.path)">
                              <i class="fas fa-file-download text-Lightblue">
                                descargar</i
                              >
                            </a>
                          </div>
                        </div>
                        <div v-else class="row">
                          <div class="col">
                            <button
                              class="btn btn-outline-info border-0"
                              type="button"
                              disabled
                            >
                              <span
                                class="spinner-grow spinner-grow-sm"
                                role="status"
                                aria-hidden="true"
                              ></span>
                              Loading...
                            </button>
                          </div>
                        </div>
                      </div>
                      <div
                        class="
                          widget-content-right widget-content-actions
                          col-12 col-lg-auto
                          text-muted
                        "
                      >
                        <ul>
                          <li>
                            <span>{{ file.periodo.periodo }}</span>
                          </li>
                          <li>
                            Tipo
                            <span
                              class="badge"
                              :class="
                                file.tipoliquidacion.codigo === 1
                                  ? 'bg-olive'
                                  : 'bg-yellow'
                              "
                              >{{ file.tipoliquidacion.tipoliquidacion }}</span
                            >
                          </li>
                          <li>
                            <span
                              >Importado {{ file.created_at | moment }}</span
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </section>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center" v-else>
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">No Hay Resultados</h3>
          </div>
        </div>
      </div>
    </div>

    <edit-file
      v-if="showModal"
      @close="showModal = false"
      @fileEdit="updateFile(...arguments)"
      :file="file"
      :user="user"
    >
    </edit-file>

    <infinite-loading
      :identifier="infiniteId"
      spinner="waveDots"
      @infinite="getFiles"
    >
      <div slot="no-more">No hay Mas Registros</div>
      <div slot="no-results">Sin Resultado Encontrados</div>
    </infinite-loading>
  </div>
</template>

<script>
import CreateFile from "./CreateFile.vue";
import EditFile from "./EditFile.vue";
import AlertNotification from "./alerts/AlertNotification.vue";
import FilterSearch from "../filtro/FilterSearch.vue";
import FilterTipo from "../filtro/FilterTipo.vue";
import FilterPeriodo from "../filtro/FilterPeriodo.vue";
export default {
  props: ["user"],
  components: {
    "create-file": CreateFile,
    "edit-file": EditFile,
    "alert-notification": AlertNotification,
    "filter-search": FilterSearch,
    "filter-tipo": FilterTipo,
    "filter-periodo": FilterPeriodo,
  },
  data: function () {
    return {
      files: [],
      file: {},
      index: "",
      page: 1,
      setTimeoutBuscador: "",
      timeOut: 500,
      infiniteId: +new Date(),
      showModal: false,
      filter: {
        text: "",
        tipo: "",
        periodo: "",
      },
    };
  },
  mounted() {
    window.Echo.private(`App.Models.User.${this.user}`).notification(
      (notification) => {
        Vue.swal
          .fire({
            icon: "success",
            title: "Importación de Archivo",
            text: notification.message,
          })
          .then(function () {
            window.location.reload();
          });
      }
    );
    //setTimeout(this.getFiles, this.timeOut);
  },
  methods: {
    newFile: function (file) {
      this.files.unshift(file);
      this.showAlert("Archivo " + file.name + " Listo para ser procesado");
    },
    getFiles: function ($state) {
      //   axios
      //     .get(`http://aportes.test/api/files/${this.user}`)
      //     .then((response) => {
      //       this.files = response.data;
      //     });

      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        axios
          .post(
            `http://aportes.test/api/files/filter?page=${this.page}`,
            this.filter
          )
          .then((response) => {
            let files = response.data.data;
            if (files.length) {
              this.page += 1;
              this.files.push(...files);
              $state.loaded();
            } else {
              $state.complete();
            }
          });
      }, this.timeOut);
    },
    task: function (index, file) {
      this.files[index].status = true;
      axios
        .post("http://aportes.test/api/declaraciones-juradas/create", {
          file_id: file.id,
        })
        .then((response) => {
          this.files[index] = response.data;
        })
        .catch((error) => {
          this.files[index].status = false;
        });
    },
    rectificar: function (index, file) {
      this.index = index;
      this.file = file;
      this.files[index].status = true;
      axios
        .put(
          `http://aportes.test/api/declaraciones-juradas/update/${this.file.id}`
        )
        .then((response) => {
          this.files[index] = response.data;
        })
        .catch((error) => {
          this.files[index].status = false;
        });
    },
    download: function (pathToFile) {
      const params = {
        path: pathToFile,
      };
      axios
        .post("http://aportes.test/api/files/download", params, {
          responseType: "arraybuffer",
        })
        .then((response) => {
          var fileUrl = window.URL.createObjectURL(new Blob([response.data]));
          var fileLink = document.createElement("a");
          fileLink.href = fileUrl;

          fileLink.setAttribute("download", this.file.name);
          document.body.appendChild(fileLink);
          fileLink.click();
        });
    },
    updateFile: function (fileEdit) {
      this.files[this.index] = fileEdit;
      this.showAlert(
        "Archivo " +
          fileEdit.name +
          " Sera rectificado los cambios se realizarán de forma permanente."
      );
    },
    showAlert(message) {
      Vue.swal(message);
    },
    isOpen(i, file) {
      this.showModal = true;
      this.file = file;
      this.index = i;
    },
    search(text) {
      this.filter.text = text;
      this.refreshInfiniteLoading();
    },
    getTipo(tipo) {
      this.filter.tipo = tipo;
      this.refreshInfiniteLoading();
    },
    getPeriodo(periodo) {
      this.filter.periodo = periodo;
      this.refreshInfiniteLoading();
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.files = [];
      this.infiniteId += 1;
    },
  },
};
</script>


<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
</style>
