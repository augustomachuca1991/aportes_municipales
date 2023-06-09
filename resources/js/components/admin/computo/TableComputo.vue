<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-4">
        <h2 class="heading-section">Computos</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <filter-cascade
              @origen="getOrigenId(...arguments)"
              @jurisdiccion="getJurisdiccionId(...arguments)"
              @organismo="getOrganismoId(...arguments)"
            ></filter-cascade>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <label for="tipoFormControlSelect1" class="text-muted">Tipo</label>
                <filter-tipo @type="getTipoId(...arguments)"></filter-tipo>
              </div>
              <div class="col">
                <label for="inputText">Buscar Agente</label>
                <filter-search @buscar="getText(...arguments)"></filter-search>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <filter-from-to
              @from="getCodFrom(...arguments)"
              @to="getCodTo(...arguments)"
            ></filter-from-to>
          </div>
        </div>
        <div class="table-wrap table-responsive">
          <table class="table table-hover" id="accordion">
            <thead class="table-info">
              <tr>
                <th>#Origen | Jurisdicción | Organismo</th>
                <th>Periodo</th>
                <th>Basico</th>
                <th>Antiguedad</th>
                <th>Remunerativo</th>
                <th>bonificable</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody
              v-for="(computo, index) in computos"
              :key="computo.id"
              class="border-0"
            >
              <tr
                data-toggle="collapse"
                :data-target="'#collapse' + index"
                aria-expanded="true"
                :aria-controls="'collapse' + index"
              >
                <th scope="row">
                  <span
                    class="text-uppercase badge badge-primary rounded-pill"
                    >{{
                      computo.declaracionjurada.organismo.jurisdiccion.origen
                        .origen
                    }}</span
                  >
                  <span class="text-uppercase badge badge-info rounded-pill">{{
                    computo.declaracionjurada.organismo.jurisdiccion
                      .jurisdiccion
                  }}</span>
                  <span
                    class="text-uppercase badge badge-secondary rounded-pill"
                    >{{ computo.declaracionjurada.organismo.organismo }}</span
                  >
                </th>
                <td>
                  <i class="far fa-calendar text-muted"></i>&nbsp;{{
                    computo.declaracionjurada.periodo.periodo
                  }}
                </td>
                <td>$ {{ computo.basico }}</td>
                <td>$ {{ computo.antiguedad }}</td>
                <td>$ {{ computo.remunerativo }}</td>
                <td>$ {{ computo.bonificable }}</td>
                <td>
                  <i
                    class="fas fa-arrow-alt-circle-down text-success"
                    aria-hidden="true"
                  ></i>
                </td>
              </tr>
              <tr>
                <td
                  colspan="7"
                  :id="'collapse' + index"
                  class="collapse collapsing bg-white"
                  data-parent="#accordion"
                >
                  <ul class="list-group list-group-flush text-capitalize">
                    <li class="list-group-item">
                      <p>
                        {{ computo.agentes[0].nombre }}
                        <span class="text-muted">{{
                          computo.agentes[0].cuil
                        }}</span>
                      </p>
                    </li>
                    <li class="list-group-item">
                      {{
                        computo.declaracionjurada.tipoliquidacion
                          .tipoliquidacion
                      }}
                    </li>
                    <li class="list-group-item">
                      {{ computo.clases[0].clase }}
                    </li>
                  </ul>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="2">Totales en Pesos $</th>
                <th>$ {{ totales.total_basico }}</th>
                <th>$ {{ totales.total_antiguedad }}</th>
                <th>$ {{ totales.total_remunerativo }}</th>
                <th>$ {{ totales.total_bonificable }}</th>
                <th>
                  <i
                    class="fas fa-arrow-alt-circle-down text-success"
                    aria-hidden="true"
                  ></i>
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <infinite-loading
      :identifier="infiniteId"
      spinner="waveDots"
      @infinite="getComputos"
    >
      <div slot="no-more">No hay Mas Registros</div>
      <div slot="no-results">Sin Resultado Encontrados</div>
    </infinite-loading>
  </div>
</template>

<script>
const apiUrl = "http://aportes.test/api/computos";
import FilterCascade from "../../admin/filtro/FilterCascade.vue";
import FilterTipo from "../filtro/FilterTipo.vue";
import FilterSearch from "../filtro/FilterSearch.vue";
import FilterFromTo from "../filtro/FilterFromTo.vue";
export default {
  components: {
    "filter-cascade": FilterCascade,
    "filter-tipo": FilterTipo,
    "filter-search": FilterSearch,
    "filter-from-to": FilterFromTo,
  },
  data: function () {
    return {
      computos: [],
      errors: [],
      page: 1,
      setTimeoutBuscador: "",
      timeOut: 500,
      infiniteId: +new Date(),
      totales: {},
      filter: {
        origen_id: "",
        jurisdiccion_id: "",
        organismo_id: "",
        text: "",
        desde: "",
        hasta: "",
        tipoliquidacion_id: "",
      },
    };
  },
  methods: {
    getComputos($state) {
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        axios
          .post(`${apiUrl}/filter?page=${this.page}`, this.filter)
          .then((response) => {
            let computos = response.data.computos.data;
            this.totales = response.data.totales;
            if (computos.length) {
              this.page += 1;
              this.computos.push(...computos);
              $state.loaded();
            } else {
              $state.complete();
            }
          });
      }, this.timeOut);
    },
    getOrigenId(origenId) {
      this.filter.origen_id = origenId;
      this.refreshInfiniteLoading();
    },
    getJurisdiccionId(jurisdiccionId) {
      this.filter.origen_id = "";
      this.filter.jurisdiccion_id = jurisdiccionId;
      this.refreshInfiniteLoading();
    },
    getOrganismoId(organismoId) {
      this.filter.origen_id = "";
      this.filter.jurisdiccion_id = "";
      this.filter.organismo_id = organismoId;
      this.refreshInfiniteLoading();
    },
    getTipoId(tipoId) {
      this.filter.tipoliquidacion_id = tipoId;
      this.refreshInfiniteLoading();
    },
    getText(text) {
      this.filter.text = text;
      this.refreshInfiniteLoading();
    },
    getCodFrom(codFrom) {
      this.filter.desde = codFrom;
      this.refreshInfiniteLoading();
    },
    getCodTo(codTo) {
      this.filter.hasta = codTo;
      this.refreshInfiniteLoading();
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.computos = [];
      this.infiniteId += 1;
    },
  },
};
</script>
