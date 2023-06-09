<template>
  <div class="container">
    <create-periodo
      @periodo="createPeriodo(...arguments)"
      ref="createPeriodo"
    ></create-periodo>
    <div class="small-box bg-info">
      <div class="inner">
        <h3>2022</h3>
        <p>{{ data }}</p>
      </div>
      <div class="icon">
        <i class="fas fa-calendar"></i>
      </div>
      <a
        href="#"
        class="small-box-footer"
        data-toggle="modal"
        data-target="#newPeriodo"
      >
        Nuevo Periodo <i class="fas fa-calendar-plus"></i>
      </a>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="row d-flex">
          <div class="mb-1 mb-md-0 col-md-4">
            <anio-component
              @year="getYear(...arguments)"
              ref="filterAnio"
            ></anio-component>
          </div>
          <div class="mb-1 mb-md-0 col-md-5">
            <mes-component
              @month="getMonth(...arguments)"
              ref="filterMes"
            ></mes-component>
          </div>
          <div class="mb-1 mb-md-0 col-md-3">
            <label for="refreshBtn">Refresh</label>
            <button
              id="refreshBtn"
              class="btn btn-block btn-outline-secondary rounded-pill"
              @click="clearFilter"
            >
              <i class="fas fa-broom"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="row text-bold text-uppercase py-3 my-2 bg-ligth">
      <div class="col">
        <a class="text-dark" href="#" @click="sortColumn('codigo')"
          >Codigo<i
            class="fas"
            :class="sort ? 'fa-sort-down' : 'fa-sort-up'"
          ></i>
        </a>
      </div>
      <div class="col">
        <a class="text-dark" href="#" @click="sortColumn('periodo')"
          >Periodo<i
            class="fas"
            :class="sort ? 'fa-sort-down' : 'fa-sort-up'"
          ></i>
        </a>
      </div>
      <div class="col">
        <a class="text-dark" href="#" @click="sortColumn('anio')"
          >Año<i class="fas" :class="sort ? 'fa-sort-down' : 'fa-sort-up'"></i>
        </a>
      </div>
      <div class="col">
        <a class="text-dark" href="#" @click="sortColumn('mes')"
          >Mes<i class="fas" :class="sort ? 'fa-sort-down' : 'fa-sort-up'"></i>
        </a>
      </div>
      <div class="col"></div>
    </div>
    <div
      class="row row-cols-5 p-3 my-2 bg-light shadow"
      v-for="(periodo, index) in periodos"
      :key="index"
    >
      <div class="col text-bold">#{{ periodo.codigo }}</div>
      <div class="col text-uppercase">{{ periodo.periodo }}</div>
      <div class="col">{{ periodo.anio }}</div>
      <div class="col">{{ periodo.mes }}</div>
      <div class="col">
        <div class="row mb-3">
          <div class="col-12 mb-1">
            <button
              class="btn btn-outline-primary btn-block rounded-pill"
              type="button"
            >
              Ver
            </button>
          </div>
          <div class="col-12">
            <button
              class="btn btn-outline-warning btn-block rounded-pill"
              type="button"
            >
              Editar
            </button>
          </div>
        </div>
      </div>
    </div>
    <infinite-loading
      :identifier="infiniteId"
      spinner="waveDots"
      @infinite="getPeriodos"
    >
      <div slot="no-more">No hay Mas Registros</div>
      <div slot="no-results">Sin Resultado Encontrados</div>
    </infinite-loading>
  </div>
</template>

<script>
import CreatePeriodo from "../../admin/periodo/CreatePeriodo.vue";
import FilterAnio from "../../admin/filtro/FilterAnio.vue";
import FilterMes from "../../admin/filtro/FilterMes.vue";
export default {
  components: {
    "create-periodo": CreatePeriodo,
    "anio-component": FilterAnio,
    "mes-component": FilterMes,
  },
  data: function () {
    return {
      periodos: [],
      errors: [],
      sort: false,
      page: 1,
      index: "",
      timeOut: 300,
      infiniteId: +new Date(),
      data: new Date(),
      filter: {
        anio: "",
        mes: "",
      },
    };
  },
  mounted() {
    this.getPeriodos();
  },
  methods: {
    getPeriodos($state) {
      const params = this.filter;
      axios
        .post(
          `http://aportes.test/api/periodos/filter?page=${this.page}`,
          params
        )
        .then((response) => {
          if (response.data.data.length) {
            this.page += 1;
            this.periodos.push(...response.data.data);
            $state.loaded();
          } else {
            $state.complete();
          }
        });
    },
    createPeriodo(periodo) {
      Vue.swal.fire({
        position: "top-end",
        icon: "success",
        title: periodo.periodo + " fue creado con exito",
        showConfirmButton: false,
        timer: 2000,
      });
      this.periodos.unshift(periodo);
      this.$refs.createPeriodo.clear();
    },
    sortColumn(column) {
      console.log(column);
      this.sort = !this.sort;
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
      this.periodos = [];
      this.infiniteId += 1;
    },
    clearFilter() {
      this.filter.anio = "";
      this.filter.mes = "";
      this.$refs.filterAnio.empty();
      this.$refs.filterMes.empty();
    },
  },
};
</script>
