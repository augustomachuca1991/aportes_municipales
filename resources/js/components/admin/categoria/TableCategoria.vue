<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3 class="text-center">LISTA DE CATEGORIAS</h3>
        <filter-search @buscar="search(...arguments)"></filter-search>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div
          v-for="(categoria, i) in categorias"
          :key="i"
          class="accordion"
          :id="'accordion' + i"
        >
          <div class="card card-outline card-cyan">
            <div class="card-header" :id="'headingOne' + i">
              <h2 class="mb-0 d-inline-flex">
                <button
                  class="btn btn-link btn-block text-left"
                  type="button"
                  data-toggle="collapse"
                  :data-target="'#collapse-' + i"
                  aria-expanded="true"
                  :aria-controls="'collapse-' + i"
                >
                  {{ categoria.categoria }}
                </button>
                <a
                  id="show-modal"
                  @click="isOpen(i, categoria)"
                  href="#"
                  class="justify-items-start mx-1"
                  ><i class="far fa-edit text-warning text-md"></i
                ></a>
              </h2>
            </div>

            <div
              :id="'collapse-' + i"
              class="collapse"
              :aria-labelledby="'headingOne' + i"
              :data-parent="'#accordion' + i"
            >
              <div class="card-body">
                <div
                  v-for="(clase, j) in categoria.clases"
                  :key="j"
                  class="accordion"
                  :id="'accordion-' + i + '-' + j"
                >
                  <div class="card">
                    <div class="card-header" :id="'headingOne-' + i + '-' + j">
                      <h2 class="d-inline-flex mb-0">
                        <button
                          class="btn btn-link btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          :data-target="'#collapseOne' + i + '-' + j"
                          aria-expanded="true"
                          :aria-controls="'collapseOne' + i + '-' + j"
                        >
                          {{ clase.clase }}
                        </button>
                        <!-- <a href="#" class="justify-items-start mx-1"
                          ><i class="far fa-eye text-primary text-md"></i
                        ></a> -->
                      </h2>
                    </div>

                    <div
                      :id="'collapseOne' + i + '-' + j"
                      class="collapse"
                      :aria-labelledby="'headingOne-' + i + '-' + j"
                      :data-parent="'#accordion-' + i + '-' + j"
                    >
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"># {{ clase.codigo }}</li>
                          <li class="list-group-item">{{ clase.clase }}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
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
      @infinite="getCategorias"
    >
      <div slot="no-more">No hay Mas Registros</div>
      <div slot="no-results">Sin Resultado Encontrados</div>
    </infinite-loading>

    <edit-categoria
      v-if="showModal"
      @close="showModal = false"
      @updatedCategoria="updateCategoria(...arguments)"
      @success="alertSuccess(...arguments)"
      :categoria="categoria"
    >
    </edit-categoria>
  </div>
</template>

<script>
import EditCategoria from "./EditCategoria.vue";
import FilterSearch from "../filtro/FilterSearch.vue";
const main_url = "http://aportes.test/api/categorias/filter";

export default {
  components: {
    "edit-categoria": EditCategoria,
    "filter-search": FilterSearch,
  },
  data: function () {
    return {
      categorias: [],
      categoria: {},
      categoriaIndex: "",
      page: 1,
      infiniteId: +new Date(),
      setTimeoutBuscador: "",
      timeOut: 500,
      showModal: false,
      filter: {
        text: "",
        clase_id: "",
      },
    };
  },
  methods: {
    getCategorias($state) {
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        axios
          .post(`${main_url}?page=${this.page}`, this.filter)
          .then((response) => {
            let categorias = response.data.data;
            if (categorias.length) {
              this.page += 1;
              this.categorias.push(...categorias);
              $state.loaded();
            } else {
              $state.complete();
            }
          });
      }, this.timeOut);
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.categorias = [];
      this.infiniteId += 1;
    },
    isOpen(i, categoria) {
      this.showModal = true;
      this.categoria = categoria;
      this.categoriaIndex = i;
    },
    updateCategoria(categoria) {
      this.categorias[this.categoriaIndex] = categoria;
    },
    alertSuccess(message) {
      Vue.swal(message);
    },
    search(text) {
      this.filter.text = text;
      this.refreshInfiniteLoading();
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
