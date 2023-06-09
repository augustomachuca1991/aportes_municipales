<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="text-center text-muted text-uppercase">
          Lista de Organismos
        </h1>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="mb-1 mb-md-0 col-md-5 col-lg-5">
                <input type="text" class="form-control" placeholder="Search" />

                <!-- <ul
                                    class="list-group list-group-flush headline"
                                >
                                    <a
                                        href="#"
                                        class="list-group-item list-group-item-action list-group-item-info"
                                    >
                                        <p>asd</p>
                                    </a>
                                </ul> -->
              </div>
              <div class="mb-1 mb-md-0 col-md-6 col-lg-6">
                <select class="form-select" aria-label="Default select example">
                  <option value="1">Sisper</option>
                  <option value="2">Municipios</option>
                  <option value="3">Entidades Autonomas</option>
                </select>
              </div>
              <div class="mb-1 mb-md-0 col-md-1 align-self-center">
                <a href="#"><i class="fas fa-filter"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div
          class="card card-outline card-success"
          v-for="organismo in organismos"
          :key="organismo.id"
        >
          <div class="card-header">
            #{{ organismo.codigo }} - {{ organismo.organismo }}
          </div>

          <div class="card-body">
            <p>{{ organismo.jurisdiccion.jurisdiccion }}</p>
            <ul>
              <li>cvbcvb</li>
              <p class="mt-3">
                <a
                  href="#"
                  class="text-cyan"
                  data-toggle="modal"
                  data-target="#infoModal"
                  ><i class="fas fa-eye"></i
                ></a>
                <a
                  href="#"
                  class="text-yellow"
                  data-toggle="modal"
                  data-target="#editModal"
                  ><i class="fas fa-edit"></i
                ></a>
                <a href="#"><i class="fas fa-list"></i></a>
              </p>
            </ul>
          </div>
        </div>
        <!-- Modal component -->
        <div></div>

        <infinite-loading @infinite="getOrganismos"></infinite-loading>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      organismos: [],
      organismo: {},
      search_data: [],
      page: 1,
      search: "",
      selectedJurisdiccion: "",
      index: "",
      timeOut: 300,
    };
  },
  mounted() {
    //this.getOrganismos();
  },
  methods: {
    getOrganismos($state) {
      axios
        .get(`http://aportes.test/api/organismos?page=${this.page}`)
        .then((response) => {
          if (response.data.data.length) {
            this.page += 1;
            this.organismos.push(...response.data.data);
            $state.loaded();
          } else {
            $state.complete();
          }
        });
    },
    // autocomplete() {
    //     this.search_data = [];
    //     if (this.search) {
    //         axios
    //             .post("http://aportes.test/api/jurisdicciones/search", {
    //                 search: this.search,
    //             })
    //             .then((response) => {
    //                 setTimeout(() => {
    //                     this.search_data = response.data;
    //                 }, this.timeOut);
    //             });
    //     }
    // },
    // loadInput(data) {
    //     this.jurisdicciones = [];
    //     this.search_data = [];
    //     this.jurisdicciones.push(data);
    // },
    // refresh() {
    //     this.search_data = [];
    //     this.page = 1;
    //     this.search = "";
    //     this.selectedOrigen = "";
    //     this.getJurisdicciones;
    // },
    // verJurisdiccion(jurisdiccion) {
    //     this.jurisdiccion = jurisdiccion;
    // },
    // editarJurisdiccion(jurisdiccion, index) {
    //     this.jurisdiccion = jurisdiccion;
    //     this.index = index;
    // },
    // updateJurisdiccion(jurisdiccion) {
    //     this.jurisdicciones[this.index] = jurisdiccion;
    // },
  },
  watch: {
    // selectedOrigen() {
    //     const params = {
    //         origen_id: this.selectedOrigen,
    //     };
    //     axios
    //         .post("http://aportes.test/api/jurisdicciones/filter", params)
    //         .then((response) => {
    //             this.jurisdicciones = response.data.data;
    //         });
    // },
  },
};
</script>
<style>
.headline {
  z-index: 10;
  position: absolute;
}
</style>
