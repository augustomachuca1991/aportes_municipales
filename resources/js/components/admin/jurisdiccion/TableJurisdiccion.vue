<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="text-center text-muted text-uppercase">
          Lista de Jurisdicciones
        </h1>
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-sm mb-1 mb-md-0">
                <filter-autocomplete
                @jurisdiccion="jurisdiccionId(...arguments)"
                ref="autoComplete"
              ></filter-autocomplete>
                </div>
                <div class="col-sm mb-1 mb-md-0">
                <filter-select
                ref="filterSelect"
                @origen="origenId(...arguments)"
              ></filter-select>
                </div>
                <div class="col-sm">
                <button @click="refresh" class="btn btn-outline-info btn-block rounded-pill">
                  <i class="fas fa-sync">Refresh</i>
                </button>
                </div>
            </div>
          </div>
        </div>

        <div
          class="card card-outline card-olive"
          v-for="(jurisdiccion, index) in jurisdicciones"
          :key="index"
        >
          <div class="card-header">
            #{{ jurisdiccion.codigo }} -
            {{ jurisdiccion.jurisdiccion }}
          </div>

          <div class="card-body">
            <p
              :class="{
                'badge bg-olive': jurisdiccion.origen.id === 1,
                'badge badge-warning': jurisdiccion.origen.id === 2,
                'badge badge-danger': jurisdiccion.origen.id === 3,
              }"
            >
              {{ jurisdiccion.origen.origen }}
            </p>
            <ul>
              <li
                v-for="organismo in jurisdiccion.organismos"
                :key="organismo.id"
              >
                {{ organismo.organismo }}
              </li>
              <p class="mt-3">
                <a
                  href="#"
                  class="text-cyan"
                  data-toggle="modal"
                  data-target="#infoModal"
                  @click="verJurisdiccion(jurisdiccion)"
                  ><i class="fas fa-eye"></i
                ></a>
                <a
                  href="#"
                  class="text-yellow"
                  data-toggle="modal"
                  data-target="#editModal"
                  @click="editarJurisdiccion(jurisdiccion, index)"
                  ><i class="fas fa-edit"></i
                ></a>
                <a href="#" @click="computos(jurisdiccion)"
                  ><i class="fas fa-list"></i
                ></a>
              </p>
            </ul>
          </div>
        </div>
        <!-- Modal -->
        <div v-if="Object.keys(jurisdiccion).length !== 0">
          <show-jurisdiccion :jurisdiccion="jurisdiccion"></show-jurisdiccion>
          <edit-jurisdiccion
            :jurisdiccion="jurisdiccion"
            :index="index"
            @updatedJurisdiccion="updateJurisdiccion(...arguments)"
          ></edit-jurisdiccion>
        </div>

        <infinite-loading
          :identifier="infiniteId"
          spinner="waveDots"
          @infinite="getJurisdicciones"
        >
          <div slot="no-more">No hay Mas Registros</div>
          <div slot="no-results">Sin Resultado Encontrados</div>
        </infinite-loading>
      </div>
    </div>
    <button @click="topFunction" id="backScrollTop" title="Go to top">
      <i class="fas fa-angle-up"></i>
    </button>
  </div>
</template>

<script>
// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {

//   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//     document.getElementById("backScrollTop").style.display = "block";
//   } else {
//     document.getElementById("backScrollTop").style.display = "none";
//   }
// }
import ShowJurisdiccion from "../../admin/jurisdiccion/ShowJurisdiccion.vue";
import EditJurisdiccion from "../../admin/jurisdiccion/EditJurisdiccion.vue";
import FilterAutocomplete from "../../admin/filtro/jurisdiccion/FilterAutocomplete.vue";
import FilterSelect from "../../admin/filtro/jurisdiccion/FilterSelect.vue";
export default {
  components: {
    "show-jurisdiccion": ShowJurisdiccion,
    "edit-jurisdiccion": EditJurisdiccion,
    "filter-autocomplete": FilterAutocomplete,
    "filter-select": FilterSelect,
  },
  data: function () {
    return {
      jurisdicciones: [],
      jurisdiccion: {},
      page: 1,
      index: "",
      timeOut: 300,
      infiniteId: +new Date(),
      filter: {
        jurisdiccion_id: "",
        origen_id: "",
      },
    };
  },
  methods: {
    getJurisdicciones($state) {
      const params = this.filter;
      axios
        .post(
          `http://aportes.test/api/jurisdicciones/filter?page=${this.page}`,
          params
        )
        .then((response) => {
          if (response.data.data.length) {
            this.page += 1;
            this.jurisdicciones.push(...response.data.data);
            $state.loaded();
          } else {
            $state.complete();
          }
        });
    },
    refresh() {
      this.filter.origen_id = "";
      this.filter.jurisdiccion_id = "";
      this.$refs.autoComplete.empty();
      this.$refs.filterSelect.empty();
      this.refreshInfiniteLoading();
    },
    verJurisdiccion(jurisdiccion) {
      this.jurisdiccion = jurisdiccion;
    },
    editarJurisdiccion(jurisdiccion, index) {
      this.jurisdiccion = jurisdiccion;
      this.index = index;
    },
    updateJurisdiccion(jurisdiccion) {
      this.jurisdicciones[this.index] = jurisdiccion;
    },
    computos(jurisdiccion) {
      window.location.href = "computos/" + jurisdiccion.id;
    },
    jurisdiccionId(jurisdiccion) {
      this.filter.origen_id = "";
      this.filter.jurisdiccion_id = jurisdiccion;
      this.refreshInfiniteLoading();
    },
    origenId(origen) {
      this.filter.jurisdiccion_id = "";
      this.filter.origen_id = origen;
      this.refreshInfiniteLoading();
    },
    refreshInfiniteLoading() {
      this.page = 1;
      this.jurisdicciones = [];
      this.infiniteId += 1;
    },
    topFunction() {
      document.documentElement.scrollTop = 0;
    },
  },
};
</script>
<style scoped>
.headline {
  z-index: 10;
  position: absolute;
}
#backScrollTop {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: red; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
}

#backScrollTop:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
</style>
