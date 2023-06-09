<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="text-center text-muted text-uppercase">
          Tabla de Organismos
        </h2>
        <filter-search @buscar="buscar(...arguments)"></filter-search>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- <div
          class="accordion"
          v-for="(origen, i) in origenes"
          :key="origen.id"
          :id="'collapse' + origen.id"
        >
          <div class="card">
            <div class="card-header" :id="'headingOne' + i">
              <h2 class="mb-0">
                <button
                  class="btn btn-link btn-block text-left"
                  type="button"
                  data-toggle="collapse"
                  :data-target="'#collapse-' + i"
                  aria-expanded="true"
                  :aria-controls="'collapse-' + i"
                >
                  #{{ origen.codigo }} - {{ origen.origen }}
                </button>
              </h2>
            </div>

            <div
              :id="'collapse-' + i"
              class="collapse"
              :aria-labelledby="'headingOne' + i"
              :data-parent="'#collapse' + origen.id"
            >
              <div class="card-body">
                <div
                  class="card shadow"
                  v-for="(jurisdiccion, j) in origen.jurisdicciones"
                  :key="j"
                >
                  <div class="card-header">
                    <form
                      @submit.prevent="updateJurisdiccion()"
                      class="form-row justify-content-center"
                      v-if="
                        editMode &&
                        i == origenIndex &&
                        j == jurisdiccionIndex &&
                        jurText
                      "
                    >
                      <div class="form-group mb-2">
                        <label
                          class="text-danger text-italic"
                          for="inputOrigen"
                          v-for="(error, index) in errors.jurisdiccion"
                          :key="index"
                          >{{ error }}</label
                        >
                      </div>
                      <div class="form-group mx-sm-3 mb-2">
                        <input
                          type="text"
                          class="form-control"
                          id="inputOrigen"
                          v-model="jurText"
                        />
                      </div>
                      <button type="submit" class="btn bg-blue mb-2 mr-1">
                        <i class="far fa-save"></i> Confirmar
                      </button>
                      <button
                        type="button"
                        @click="clear"
                        class="btn btn-secondary mb-2"
                      >
                        Cancelar
                      </button>
                    </form>
                    <p v-else class="text-center">
                      {{ jurisdiccion.codigo }} -
                      {{ jurisdiccion.jurisdiccion }}
                      <a @click="editJurisdiccion(jurisdiccion, i, j)"
                        ><span><i class="fas fa-edit text-orange"></i></span
                      ></a>
                    </p>
                  </div>
                  <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li
                        class="list-group-item"
                        v-for="(organismo, k) in jurisdiccion.organismos"
                        :key="k"
                      >
                        <form
                          @submit.prevent="updateOrganismo()"
                          class="form-inline"
                          v-if="
                            editMode &&
                            i == origenIndex &&
                            j == jurisdiccionIndex &&
                            k == organismoIndex &&
                            orgText
                          "
                        >
                          <div class="form-group mx-sm-4 mb-2">
                            <label
                              class="text-danger text-italic"
                              for="inputOrganismo"
                              v-for="(error, index) in errors.organismo"
                              :key="index"
                              >{{ error }}</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="inputOrganismo"
                              v-model="orgText"
                            />
                          </div>
                          <button type="submit" class="btn bg-blue mb-2 mr-1">
                            <i class="far fa-save"></i> Confirmar
                          </button>
                          <button
                            type="button"
                            @click="clear"
                            class="btn btn-secondary mb-2"
                          >
                            Cancelar
                          </button>
                        </form>
                        <div v-else>
                          {{ organismo.codigo }} - {{ organismo.organismo }}
                          <a @click="editOrganismo(organismo, i, j, k)"
                            ><span><i class="fas fa-edit text-orange"></i></span
                          ></a>
                          <a @click="isShow(i, j, k)"
                            ><i class="fas fa-users text-primary"></i
                          ></a>
                        </div>
                        <div class="container" v-if="viewAgentes && i == origenIndex &&
                            j == jurisdiccionIndex &&
                            k == organismoIndex ">
                          <div v-if="organismo.agentes.length">
                            <div class="row">
                              <div class="col">Nº</div>
                              <div class="col">Nombre</div>
                              <div class="col">Cuil</div>
                              <div class="col">Fecha Nac</div>
                              <div class="col">Puesto Laboral</div>
                            </div>
                            <div
                              v-for="(agente, l) in organismo.agentes"
                              :key="l"
                            >
                              <div class="row text-muted">
                                <div class="col">
                                  {{ l + 1 }}
                                </div>
                                <div class="col">
                                  {{ agente.nombre | capitalize }}
                                </div>
                                <div class="col">
                                  {{ agente.cuil | formatCuil }}
                                </div>
                                <div class="col">
                                  {{ agente.fecha_nac }}
                                </div>
                                <div class="col">-</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <code class="text-pink">.ocultar</code> class.
              </div>
            </div>
          </div>
        </div> -->

        <div
          class="accordion"
          v-for="(origen, i) in origenes"
          :key="origen.id"
          :id="'accordion-origen-' + i"
        >
          <div
            class="card card-outline"
            :class="
              origen.codigo === 1
                ? 'card-olive'
                : origen.codigo === 2
                ? 'card-warning'
                : 'card-danger'
            "
          >
            <div class="card-header" :id="'heading-origen-' + i">
              <edit-origen
                v-if="editMode && i == origenIndex && input == 'origen'"
                :origen="origen"
                @success="alertSuccess(...arguments)"
                @updatedOrigen="updateOrigen(...arguments)"
                @cancel="editMode=false"
              ></edit-origen>
              <div v-else class="row justify-content-between">
                <div class="col-10">
                  <button
                    class="btn btn-link text-left"
                    type="button"
                    data-toggle="collapse"
                    :data-target="'#collapse-origen-' + i"
                    aria-expanded="true"
                    :aria-controls="'collapse-origen-' + i"
                  >
                    #{{ origen.codigo }} {{ origen.origen }} ({{
                      origen.jurisdicciones.length
                    }})
                  </button>
                </div>
                <div class="col-1 align-self-center">
                  <a href="#" @click="editOrigen(origen, i)"
                    ><i class="fas fa-pen text-warning"></i
                  ></a>
                </div>
              </div>
            </div>

            <div
              :id="'collapse-origen-' + i"
              class="collapse"
              :aria-labelledby="'heading-origen-' + i"
              :data-parent="'#accordion-origen-' + i"
            >
              <div class="card-body">
                <!------------------------------------------------------------------------------------------------------->
                <div
                  class="accordion"
                  v-for="(jurisdiccion, j) in origen.jurisdicciones"
                  :key="j"
                  :id="'accordion-jurisdiccion-' + i + '-' + j"
                >
                  <div class="card">
                    <div
                      class="card-header"
                      :id="'heading-jurisdiccion' + i + '-' + j"
                    >
                      <h2 class="mb-0 text-center">
                        <button
                          class="btn btn-link"
                          type="button"
                          data-toggle="collapse"
                          :data-target="'#collapse-jurisdiccion-' + i + '-' + j"
                          aria-expanded="true"
                          :aria-controls="
                            'collapse-jurisdiccion-' + i + '-' + j
                          "
                        >
                          <form
                            @submit.prevent="updateJurisdiccion()"
                            class="form-row justify-content-center"
                            v-if="
                              editMode &&
                              i == origenIndex &&
                              j == jurisdiccionIndex &&
                              input == 'jurisdiccion'
                            "
                          >
                            <div class="form-group mb-2">
                              <label
                                class="text-danger text-italic"
                                for="inputOrigen"
                                v-for="(error, index) in errors.jurisdiccion"
                                :key="index"
                                >{{ error }}</label
                              >
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                              <input
                                type="text"
                                class="form-control"
                                id="inputOrigen"
                                v-model="jurText"
                              />
                            </div>
                            <button type="submit" class="btn bg-blue mb-2 mr-1">
                              <i class="far fa-save"></i> Confirmar
                            </button>
                            <button
                              type="button"
                              @click="clear"
                              class="btn btn-secondary mb-2"
                            >
                              Cancelar
                            </button>
                          </form>
                          <div v-else>
                            #{{ jurisdiccion.codigo }}
                            {{ jurisdiccion.jurisdiccion }}
                            ({{ jurisdiccion.organismos.length }})
                            <a @click="editJurisdiccion(jurisdiccion, i, j)">
                              <span
                                ><i class="fas fa-pen text-warning text-md"></i
                              ></span>
                            </a>
                          </div>
                        </button>
                      </h2>
                    </div>

                    <div
                      :id="'collapse-jurisdiccion-' + i + '-' + j"
                      class="collapse"
                      :aria-labelledby="'heading-jurisdiccion' + i + '-' + j"
                      :data-parent="'#accordion-jurisdiccion-' + i + '-' + j"
                    >
                      <div class="card-body">
                        <!-----------------------------------------------------------organismos-------------------------------------->
                        <div
                          class="accordion"
                          v-for="(organismo, k) in jurisdiccion.organismos"
                          :key="k"
                          :id="'accordion-organismo-' + i + '-' + j + '-' + k"
                        >
                          <div class="card">
                            <div
                              class="card-header"
                              :id="'heading-organismo-' + i + '-' + j + '-' + k"
                            >
                              <h2 class="mb-0">
                                <button
                                  class="btn btn-link btn-block text-right"
                                  type="button"
                                  data-toggle="collapse"
                                  :data-target="
                                    '#collapse-organismo-' +
                                    i +
                                    '-' +
                                    j +
                                    '-' +
                                    k
                                  "
                                  aria-expanded="true"
                                  :aria-controls="
                                    'collapse-organismo-' +
                                    i +
                                    '-' +
                                    j +
                                    '-' +
                                    k
                                  "
                                >
                                  <i
                                    class="
                                      fas
                                      fa-users
                                      text-primary text-uppercase
                                    "
                                  >
                                    #{{ organismo.codigo }}
                                    {{ organismo.organismo }}
                                    ({{ organismo.agentes.length }})</i
                                  >
                                </button>
                              </h2>
                            </div>

                            <div
                              :id="
                                'collapse-organismo-' + i + '-' + j + '-' + k
                              "
                              class="collapse"
                              :aria-labelledby="
                                'heading-organismo-' + i + '-' + j + '-' + k
                              "
                              :data-parent="
                                '#accordion-organismo-' + i + '-' + j + '-' + k
                              "
                            >
                              <div class="card-body">
                                <div
                                  v-for="(agente, index) in organismo.agentes"
                                  :key="index"
                                >
                                  <div class="row text-muted">
                                    <div class="col">
                                      {{ agente.id }}
                                    </div>
                                    <div class="col">
                                      {{ agente.nombre | capitalize }}
                                    </div>
                                    <div class="col">
                                      {{ agente.cuil | formatCuil }}
                                    </div>
                                    <div class="col">
                                      {{ agente.fecha_nac }}
                                    </div>
                                    <div class="col">-</div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    total agentes
                                    {{ organismo.agentes.length }}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!------------------------------------------------------------------------------------------------->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class. -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <infinite-loading
      :identifier="infiniteId"
      spinner="waveDots"
      @infinite="getOrigenes"
    >
      <div slot="no-more">No hay Mas Registros</div>
      <div slot="no-results">Sin Resultado Encontrados</div>
    </infinite-loading>
  </div>
</template>

<script>
const apiUrl = "http://aportes.test/api/origenes";
import FilterSearch from "../filtro/FilterSearch.vue";
import EditOrigen from "../origen/EditOrigen.vue";
export default {
  components: {
    "filter-search": FilterSearch,
    "edit-origen": EditOrigen,
  },
  data: function () {
    return {
      origenes: [],
      errors: [],
      page: 1,
      setTimeoutBuscador: "",
      timeOut: 500,
      infiniteId: +new Date(),
      editMode: false,
      origenIndex: "",
      jurisdiccionIndex: "",
      organismoIndex: "",
      origen: {},
      jurisdiccion: {},
      organismo: {},
      input: "",
      jurText: "",
      orgText: "",
      filter: {
        text: "",
      },
    };
  },
  mounted() {
    this.getOrigenes();
  },
  methods: {
    getOrigenes($state) {
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        axios
          .post(`${apiUrl}/filter?page=${this.page}`, this.filter)
          .then((response) => {
            let origenes = response.data.data;
            if (origenes.length) {
              this.page += 1;
              this.origenes.push(...origenes);
              $state.loaded();
            } else {
              $state.complete();
            }
          });
      }, this.timeOut);
    },
    buscar(text) {
      this.filter.text = text;
      this.refreshInfiniteLoading();
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.origenes = [];
      this.infiniteId += 1;
    },
    editOrigen(origen, i) {
      this.origen = origen;
      this.input = "origen";
      this.editMode = true;
      this.origenIndex = i;
    },
    editJurisdiccion(jurisdiccion, i, j) {
      this.input = "jurisdiccion";
      this.jurText = jurisdiccion.jurisdiccion;
      this.jurisdiccion = jurisdiccion;
      this.editMode = true;
      this.origenIndex = i;
      this.jurisdiccionIndex = j;
    },

    editOrganismo(organismo, i, j, k) {
      this.input = "organismo";
      this.orgText = organismo.organismo;
      this.organismo = organismo;
      this.editMode = true;
      this.origenIndex = i;
      this.jurisdiccionIndex = j;
      this.organismoIndex = k;
    },
    updateOrigen(origen) {
      this.origenes[this.origenIndex] = origen;
    },
    alertSuccess(message) {
      this.editMode = false
      this.input = "";
      Vue.swal(message);
    },
    updateJurisdiccion() {
      const param = {
        jurisdiccion: this.jurText,
      };
      axios
        .put(
          `http://aportes.test/api/jurisdicciones/update/${this.jurisdiccion.id}`,
          param
        )
        .then((response) => {
          if (response.status == 200) {
            this.origenes[this.origenIndex].jurisdicciones[
              this.jurisdiccionIndex
            ].jurisdiccion = this.jurText;
            this.clear();
          }
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },

    updateOrganismo() {
      const param = {
        organismo: this.orgText,
      };
      axios
        .put(
          `http://aportes.test/api/organismos/update/${this.organismo.id}`,
          param
        )
        .then((response) => {
          if (response.status == 200) {
            this.origenes[this.origenIndex].jurisdicciones[
              this.jurisdiccionIndex
            ].organismos[this.organismoIndex].organismo = this.orgText;
            this.clear();
          }
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    clear() {
      this.editMode = false;
      this.origen = {};
      this.jurisdiccion = {};
      this.organismo = {};
      this.origenIndex = "";
      this.jurisdiccionIndex = "";
      this.organismoIndex = "";
      this.jurText = "";
      this.orgText = "";
      this.errors = [];
    }
  },
};
</script>
