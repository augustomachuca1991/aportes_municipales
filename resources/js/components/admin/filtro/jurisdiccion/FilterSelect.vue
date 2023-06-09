<template>
  <div class="">
    <select
      class="form-select"
      :class="{
        'text-muted': selectedOrigen === '',
      }"
      aria-label="Default select example"
      v-model="selectedOrigen"
    >
      <option disabled value="" class="text-muted">Seleccione Origen</option>
      <option v-for="origen in origenes" :key="origen.id" :value="origen.id">
        {{ origen.origen }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      origenes: [],
      selectedOrigen: "",
    };
  },

  mounted() {
    axios.get("http://aportes.test/api/origenes").then((response) => {
      this.origenes = response.data;
    });
  },
  methods: {
    empty() {
      this.selectedOrigen = "";
      this.$emit("origen", this.selectedOrigen);
    },
  },
  watch: {
    selectedOrigen() {
      this.$emit("origen", this.selectedOrigen);
    },
  },
};
</script>
