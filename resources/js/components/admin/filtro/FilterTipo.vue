<template>
  <div class="form-row">
    <div class="col">
      <div class="input-group">
        <select
          class="form-control"
          :class="selectedType === '' ? 'text-muted' : 'text-dark'"
          id="tipoFormControlSelect1"
          v-model="selectedType"
        >
          <option selected :value="''" disabled>Tipo Liquidación</option>
          <option v-for="(type, index) in types" :key="index" :value="type.id">
            {{ type.tipoliquidacion }}
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
      types: [],
      selectedType: "",
    };
  },
  mounted() {
    axios.get("http://aportes.test/api/tipo-liquidaciones").then((response) => {
      this.types = response.data;
    });
  },
  methods: {
    empty() {
      this.selectedType = "";
    },
  },
  watch: {
    selectedType() {
      this.$emit("type", this.selectedType);
    },
  },
};
</script>
