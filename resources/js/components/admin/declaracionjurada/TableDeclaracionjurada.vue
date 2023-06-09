<template>
  <div class="container">
    <filter-search @buscar="search(...arguments)"></filter-search>
    <filter-cascade @organismo="organismoId(...arguments)"></filter-cascade>
    <div class="row pb-2">
      <div class="col col-md-6">
        <filter-anio @year="getYear(...arguments)"></filter-anio>
      </div>
      <div class="col col-md-6">
        <filter-mes @month="getMonth(...arguments)"></filter-mes>
      </div>
    </div>
    <div
      v-for="(declaracion_jurada, index) in declaracionesJuradas"
      :key="index"
      class="card card-outline"
      :class="
        declaracion_jurada.tipoliquidacion.codigo === 1
          ? 'card-success'
          : 'card-warning'
      "
    >
      <div class="card-hearder">
        <div class="d-flex w-100 justify-content-between text-muted px-4 py-2">
          <h4 class="mb-1">
            Declaraciones Juradas {{ declaracion_jurada.id }}
          </h4>
          <small
            ><i class="fas fa-calendar-alt"></i
            >{{ declaracion_jurada.created_at | moment }}</small
          >
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <a
              class="btn"
              data-toggle="tooltip"
              data-placement="bottom"
              title="Descargar declaracion jurada"
            >
              <i class="far fa-file-excel fa-5x text-olive"></i>
            </a>
          </div>
          <div class="col-4">
            <ul class="list-unstyled">
              <li>{{ declaracion_jurada.organismo.organismo }}</li>
              <li>{{ declaracion_jurada.periodo.periodo }}</li>
              <li>
                <span
                  class="badge"
                  :class="
                    declaracion_jurada.tipoliquidacion.codigo === 1
                      ? 'badge-success'
                      : 'badge-warning'
                  "
                  >{{
                    declaracion_jurada.tipoliquidacion.tipoliquidacion
                  }}</span
                >
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-outline-info btn-block btn-sm">
              <i class="fas fa-eye"></i> Ver Info
            </button>
            <a
              href="http://aportes.test/admin/liquidaciones"
              class="btn btn-outline-danger btn-block btn-sm"
              data-toggle="modal"
              data-target="#modalDetail"
              @click="showDdjj(declaracion_jurada)"
            >
              <i class="fa fa-book"></i> Detalle
            </a>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-auto text-muted align-self-end text-xs">
            <i class="fas fa-clock">{{
              declaracion_jurada.created_at | formatDate
            }}</i>
          </div>
          <div class="col-auto text-muted align-self-end text-xs">
            <i class="fas fa-user">{{ declaracion_jurada.file.user.name }}</i>
          </div>
          <div class="col-auto align-self-end text-xs">
            <span class="badge bg-secondary">activo</span>
          </div>
        </div>
      </div>
    </div>
    <div v-if="existDetalle">
      <show-ddjj :declaracionjurada="declaracionjurada"></show-ddjj>
    </div>
    <infinite-loading
      :identifier="infiniteId"
      spinner="waveDots"
      @infinite="getDeclaracionesJuradas"
    >
      <div slot="no-more">No hay Mas Registros</div>
      <div slot="no-results">Sin Resultado Encontrados</div>
    </infinite-loading>
  </div>
</template>

<script>
const api_url = "http://aportes.test/api/declaraciones-juradas";
import ShowDeclaracionjurada from "../declaracionjurada/ShowDeclaracionjurada.vue";
import FilterSearch from "../filtro/FilterSearch.vue";
import FilterCascade from "../filtro/FilterCascade.vue";
import FilterAnio from "../filtro/FilterAnio.vue";
import FilterMes from "../filtro/FilterMes.vue";
export default {
  components: {
    "show-ddjj": ShowDeclaracionjurada,
    "filter-search": FilterSearch,
    "filter-cascade": FilterCascade,
    "filter-anio": FilterAnio,
    "filter-mes": FilterMes,
  },
  data: function () {
    return {
      declaracionesJuradas: [],
      declaracionjurada: {},
      existDetalle: false,
      setTimeoutBuscador: "",
      page: 1,
      timeOut: 300,
      infiniteId: +new Date(),
      filter: {
        text: "",
        organismo_id: "",
        anio:"",
        mes:""
      },
    };
  },
  mounted() {
    this.getDeclaracionesJuradas();
  },
  methods: {
    getDeclaracionesJuradas($state) {
      const params = this.filter;
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        axios
          .post(`${api_url}/filter?page=${this.page}`, params)
          .then((response) => {
            if (response.data.data.length) {
              this.page += 1;
              this.declaracionesJuradas.push(...response.data.data);
              $state.loaded();
            } else {
              $state.complete();
            }
          });
      }, this.timeOut);
    },
    showDdjj(declaracionjurada) {
      this.declaracionjurada = declaracionjurada;
      this.existDetalle = true;
      // this.url = `http://aportes.test/api/declaraciones-juradas/anio/${year}`;
      //   this.liquidaciones = [];
      //   this.getLiquidaciones;
    },
    search(text) {
      this.filter.text = text;
      this.refreshInfiniteLoading();
    },
    organismoId(organismo_id) {
      this.filter.organismo_id = organismo_id;
      this.refreshInfiniteLoading();
    },
    getYear(year) {
      this.filter.anio = year;
      this.refreshInfiniteLoading();
    },
    getMonth(month) {
      this.filter.mes = month;
      this.refreshInfiniteLoading();
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.declaracionesJuradas = [];
      this.infiniteId += 1;
    },
  },
};
</script>
