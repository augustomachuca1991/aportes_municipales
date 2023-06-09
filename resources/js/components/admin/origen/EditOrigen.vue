<template>
  <form @submit.prevent="update()" class="form-row justify-content-start">
    <div class="form-group mb-2">
      <label
        class="text-danger text-italic"
        for="inputOrigen"
        v-for="(error, index) in errors.origen"
        :key="index"
        >{{ error }}</label
      >
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <input
        type="text"
        class="form-control"
        id="inputOrigen"
        v-model="descripcion"
      />
    </div>
    <button type="submit" class="btn bg-blue mb-2 mr-1">
      <i class="far fa-save"></i> Confirmar
    </button>
    <button
      type="button"
      class="btn btn-secondary mb-2"
      @click="$emit('cancel')"
    >
      Cancelar
    </button>
  </form>
</template>

<script>
export default {
  props: ["origen"],
  data: function () {
    return {
      descripcion: "",
      errors: [],
    };
  },
  mounted() {
    this.descripcion = this.origen.origen;
  },
  methods: {
    update() {
      const param = { origen: this.descripcion };
      axios
        .put(`http://aportes.test/api/origenes/update/${this.origen.id}`, param)
        .then((response) => {
          if (response.status == 200) {
            this.$emit("updatedOrigen", response.data);
            this.$emit("success", "Se actualizó " + response.data.origen);
          }
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
  },
};
</script>