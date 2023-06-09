<template>
  <div class="container">
    <section class="content mb-3">
      <h4 class="text-center text-muted display-4">Liquidaciones</h4>
      <div class="row">
        <div class="col">
          <div class="input-group">
            <input
              type="search"
              class="form-control"
              aria-label="Type your keywords here"
              placeholder="nombre agente, puesto laboral, cuil, etc..."
              v-model="search"
              @keyup="buscarLiquidacion"
            />
            <div class="input-group-append">
              <button
                type="button"
                class="btn btn-secondary"
                @click="clearText"
              >
                Limpiar<i class="fa fa-broom"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="row">
      <div class="col-12">
        <div class="card card-outline card-pink">
          <div class="card-header">
            <h3 class="card-title">Filtros</h3>

            <div class="card-tools">
              <button
                type="button"
                class="btn btn-tool"
                data-card-widget="collapse"
              >
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <filter-component
              @organismo="idOrganismo(...arguments)"
            ></filter-component>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="card w-100 card-outline card-pink" v-if="shown">
        <div class="card-header">
          <h5 class="card-title text-capitalize">Liquidaciones</h5>
          <p class="d-flex justify-content-end text-muted text-capitalize">
            Instituto de Previsión Social
          </p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Agente</th>
                <th scope="col">
                  <label for="periodoFormControlSelect1" class="text-muted">Año</label>
                  <anio-component
                    @year="getYear(...arguments)"
                  ></anio-component>
                </th>
                <th scope="col">
                  <label for="mesFormControlSelect1" class="text-muted">Mes</label>
                  <mes-component
                    @month="getMonth(...arguments)"
                  ></mes-component>
                </th>
                <th scope="col">
                  <label for="tipoFormControlSelect1" class="text-muted">Tipo</label>
                  <tipo-component
                    @type="getType(...arguments)"
                  ></tipo-component>
                </th>
                <th scope="col">P. Laboral</th>
                <th scope="col">Organismo | Jurisdicción</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(liquidacion, index) in liquidaciones" :key="index">
                <th
                  scope="row"
                  v-for="agente in liquidacion.agentes"
                  :key="agente.id"
                  class="text-capitalize"
                >
                  {{ agente.cuil }}
                  <p class="text-muted text-sm">
                    {{ agente.nombre }}
                  </p>
                </th>
                <td>
                  {{ liquidacion.declaracionjurada.periodo.anio }}
                  <p class="text-muted text-sm"></p>
                </td>
                <td>
                  {{ liquidacion.declaracionjurada.periodo.mes }}
                </td>
                <td>
                  <span
                    class="badge"
                    :class="
                      liquidacion.declaracionjurada.tipoliquidacion.codigo === 1
                        ? 'badge-success'
                        : 'badge-warning'
                    "
                  >
                    {{
                      liquidacion.declaracionjurada.tipoliquidacion
                        .tipoliquidacion
                    }}
                  </span>
                </td>
                <td v-for="(agente, index) in liquidacion.agentes" :key="index">
                  #785694-{{ agente.pivot.codigo }}
                  <p class="text-muted text-sm">
                    {{ agente.pivot.fecha_ingreso }}
                  </p>
                </td>

                <td>
                  {{
                    liquidacion.declaracionjurada.organismo.organismo
                      | capitalize
                  }}
                  <p class="text-muted text-sm text-lowercase">
                    {{
                      liquidacion.declaracionjurada.organismo.jurisdiccion
                        .jurisdiccion
                    }}
                  </p>
                </td>
                <td>
                  <button
                    class="btn btn-success"
                    data-toggle="modal"
                    data-target="#liquidacionDetalle"
                    @click="showLiquidacion(liquidacion)"
                  >
                    <span>Recibo</span>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>

          <infinite-loading
            :identifier="infiniteId"
            spinner="waveDots"
            @infinite="getLiquidaciones"
          >
            <div slot="no-more">No hay Mas Registros</div>
            <div slot="no-results">Sin Resultado Encontrados</div>
          </infinite-loading>
        </div>
      </div>
      <div class="card" v-else>
        <div class="card-body">
          <p class="text-center">
            cargando...
            <span>
              <img height="80px" src="/image/ips_loading.gif" />
            </span>
          </p>
        </div>
      </div>
    </div>
    <div v-if="existLiquidacion">
      <show-liquidacion :liquidacion="liquidacion"></show-liquidacion>
    </div>
  </div>
</template>

<script>
const apiUrl = "http://aportes.test/api/liquidaciones";
import ShowLiquidacion from "../../admin/liquidacion/ShowLiquidacion.vue";
import FilterCascade from "../../admin/filtro/FilterCascade.vue";
import FilterAnio from "../../admin/filtro/FilterAnio.vue";
import FilterMes from "../../admin/filtro/FilterMes.vue";
import FilterTipo from "../../admin/filtro/FilterTipo.vue";

export default {
  components: {
    "show-liquidacion": ShowLiquidacion,
    "filter-component": FilterCascade,
    "anio-component": FilterAnio,
    "mes-component": FilterMes,
    "tipo-component": FilterTipo,
  },
  data: function () {
    return {
      liquidaciones: [],
      liquidacion: {},
      page: 1,
      setTimeoutBuscador: "",
      timeOut: 500,
      shown: true,
      totalSum: "",
      existLiquidacion: false,
      search: "",
      infiniteId: +new Date(),
      filter: {
        text: "",
        organismo_id: "",
        anio: "",
        mes: "",
        tipoliquidacion_id: "",
      },
    };
  },
  methods: {
    getLiquidaciones($state) {
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        axios
          .post(
            `${apiUrl}/filter?page=${this.page}`,
            this.filter
          )
          .then((response) => {
            let liquidaciones = response.data.data;
            //this.totalSum = response.data.sum
            if (liquidaciones.length) {
              this.page += 1;
              this.liquidaciones.push(...liquidaciones);
              $state.loaded();
            } else {
              $state.complete();
            }
          });
      }, this.timeOut);
    },
    showLiquidacion(liquidacion) {
      this.existLiquidacion = true;
      this.liquidacion = liquidacion;
    },
    idOrganismo(id) {
      this.filter.organismo_id = id;
      this.refreshInfiniteLoading();
    },
    buscarLiquidacion() {
      this.filter.text = this.search;
      this.refreshInfiniteLoading();
      //this.getLiquidaciones();
    },
    getYear(year) {
      this.filter.anio = year;
      this.refreshInfiniteLoading();
    },
    getMonth(month) {
      this.filter.mes = month;
      this.refreshInfiniteLoading();
    },
    getType(type) {
      this.filter.tipoliquidacion_id = type;
      this.refreshInfiniteLoading();
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.liquidaciones = [];
      this.infiniteId += 1;
    },
    clearText() {
      this.search = "";
      this.filter.text = this.search;
      this.refreshInfiniteLoading();
      this.getLiquidaciones();
    },
  },
};
</script>
