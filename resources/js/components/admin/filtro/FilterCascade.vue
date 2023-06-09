<template>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="origenFormControlSelect1" class="text-muted">Origen</label>
        <select
          class="form-control"
          id="origenFormControlSelect1"
          v-model="selectedOrigen"
        >
          <option :value="''" disabled selected>Seleccione Origen</option>
          <option
            v-for="(origen, index) in origenes"
            :key="index"
            :value="index"
          >
            {{ origen.codigo }}-{{ origen.origen }}
          </option>
        </select>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="jurisdiccionFormControlSelect1" class="text-muted">Jurisdiccion</label>
        <select
          :disabled="jurisdicciones.length == 0"
          class="form-control"
          id="jurisdiccionFormControlSelect1"
          v-model="selectedJurisdicion"
        >
          <option :value="''" disabled selected>Seleccione Jurisdiccion</option>
          <option
            v-for="(jurisdiccion, index) in jurisdicciones"
            :key="index"
            :value="index"
          >
            {{ jurisdiccion.codigo }}-{{ jurisdiccion.jurisdiccion }}
          </option>
        </select>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="organismoFormControlSelect1" class="text-muted">Organismo</label>
        <select
          :disabled="organismos.length == 0"
          class="form-control"
          id="organismoFormControlSelect1"
          v-model="selectedOrganismo"
        >
          <option :value="''" disabled selected>Seleccione Organismo</option>
          <option
            v-for="(organismo, index) in organismos"
            :key="index"
            :value="index"
          >
            {{ organismo.codigo }}-{{ organismo.organismo }}
          </option>
        </select>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data: function () {
    return {
      origenes: [],
      jurisdicciones: [],
      organismos: [],
      origen: {},
      jurisdiccion: {},
      organismo: {},
      selectedOrigen: "",
      selectedJurisdicion: "",
      selectedOrganismo: "",
    };
  },
  mounted() {
    this.getOrigenes();
  },
  methods: {
    getOrigenes: function () {
      axios.get("http://aportes.test/api/origenes").then((response) => {
        this.origenes = response.data;
      });
    },
  },
  watch: {
    selectedOrigen() {
      this.jurisdicciones = [];
      this.organismos = [];
      this.selectedJurisdicion = "";
      this.selectedOrganismo = "";
      if (this.selectedOrigen !== "") {
        this.origen = this.origenes[this.selectedOrigen];
        this.jurisdicciones = this.origen.jurisdicciones;
        this.$emit("origen", this.origen.id);
      }
    },
    selectedJurisdicion() {
      this.organismos = [];
      this.selectedOrganismo = "";
      if (this.selectedJurisdicion !== "") {
        this.jurisdiccion = this.jurisdicciones[this.selectedJurisdicion];
        this.organismos = this.jurisdiccion.organismos;
        this.$emit("jurisdiccion", this.jurisdiccion.id);
      }
    },
    selectedOrganismo() {
      if (this.selectedOrganismo !== "") {
        this.organismo = this.organismos[this.selectedOrganismo];
        this.$emit("organismo", this.organismo.id);
      }
    },
  },
};
</script>
