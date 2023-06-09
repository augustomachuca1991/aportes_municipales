<template>
  <div
    class="modal fade"
    id="newPeriodo"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newPeriodoLabel"
    aria-hidden="true"
    ref="modalCreatePeriodo"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Nuevo Periodo</h3>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form @submit.prevent="submitPeriodo()">
            <div class="card-body">
              <ul class="text-danger">
                <li v-for="error in errors.codigo" :key="error.id">
                  {{ error }}
                </li>
              </ul>
              <div class="form-group">
                <filter-anio
                  @year="getAnio(...arguments)"
                  ref="filterAnio"
                ></filter-anio>
                <ul class="text-danger">
                  <li v-for="error in errors.anio" :key="error.id">
                    {{ error }}
                  </li>
                </ul>
              </div>
              <div class="form-group">
                <filter-mes
                  @month="getMes(...arguments)"
                  ref="filterMes"
                ></filter-mes>
                <ul class="text-danger">
                  <li v-for="error in errors.mes" :key="error.id">
                    {{ error }}
                  </li>
                </ul>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn bg-cyan">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FilterAnio from "../../admin/filtro/FilterAnio.vue";
import FilterMes from "../../admin/filtro/FilterMes.vue";
import ApiAuth from "../../../apiAuth";
export default {
  components: {
    "filter-anio": FilterAnio,
    "filter-mes": FilterMes,
  },
  data: function () {
    return {
      year: "",
      month: "",
      milisegundos: "",
      periodo: "",
      errors: [],
    };
  },
  methods: {
    getAnio(year) {
      this.year = year;
    },
    getMes(month) {
      this.month = month;
    },
    submitPeriodo() {
      this.getMilisegundos();
      this.getPeriodo();
      const periodo = {
        codigo: this.year + this.month,
        mes: this.month,
        anio: this.year,
        periodo_milisegundos: this.milisegundos,
        periodo: this.periodo,
      };
      ApiAuth
        .post("periodos/create", periodo)
        .then((response) => {
          this.$emit("periodo", response.data);
          this.$refs.filterAnio.empty();
          this.$refs.filterMes.empty();
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    getMilisegundos() {
      var stringDate = this.year + "-" + this.month + "-01";
      var date = new Date(stringDate);
      this.milisegundos = date.getTime();
    },
    getPeriodo() {
      switch (this.month) {
        case "01":
          this.periodo = "Enero de " + this.year;
          break;
        case "02":
          this.periodo = "Febrero de " + this.year;
          break;
        case "03":
          this.periodo = "Marzo de " + this.year;
          break;
        case "04":
          this.periodo = "Abril de " + this.year;
          break;
        case "05":
          this.periodo = "Mayo de " + this.year;
          break;
        case "06":
          this.periodo = "Junio de " + this.year;
          break;
        case "07":
          this.periodo = "Julio de " + this.year;
          break;
        case "08":
          this.periodo = "Agosto de " + this.year;
          break;
        case "09":
          this.periodo = "Septiembre de " + this.year;
          break;
        case "10":
          this.periodo = "Octubre de " + this.year;
          break;
        case "11":
          this.periodo = "Noviembre de " + this.year;
          break;
        default:
          this.periodo = "Diciembre de " + this.year;
      }
    },
    clear() {
      this.year = "";
      this.month = "";
      this.milisegundos = "";
      this.periodo = "";
      this.errors = [];
    },
  },
};
</script>

<style></style>
