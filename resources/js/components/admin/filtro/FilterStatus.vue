<template>
  <div>
    <label for="inputStatus">Estado</label>
    <select
      id="inputStatus"
      class="form-control text-capitalize"
      :class="selectedEstado === '' ? 'text-muted' : 'text-dark'"
      v-model="selectedEstado"
    >
      <option selected :value="''" disabled>Seleccione Estado...</option>
      <option  v-for="(estado , index) in estados" :key="index" :value="index">
        {{ estado }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      estados: [],
      selectedEstado: "",
    };
  },
  mounted() {
    this.getEstados();
  },
  methods: {
    getEstados() {
        this.estados ={
            '0' : 'activos',
            '1' : 'inactivos',
            '2' : 'todos'
        }
    },
    empty() {
      this.selectedEstado = "";
      this.$emit("status", this.selectedEstado);
    },
  },
  watch: {
    selectedEstado() {
      this.$emit("status", this.selectedEstado);
    },
  },
};
</script>

