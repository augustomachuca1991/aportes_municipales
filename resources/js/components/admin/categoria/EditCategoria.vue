<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Editar Categoria</h3>
              <button type="button" class="close">
                <span @click="$emit('close')">&times;</span>
              </button>
            </div>
            <form @submit.prevent="update()">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputCategoria" class="sr-only">Categoria</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputCategoria"
                    v-model="descripcion"
                  />
                  <small
                    v-for="(error, index) in errors.categoria"
                    :key="index"
                    class="form-text text-danger text-italic"
                  >
                    {{ error }}
                  </small>
                </div>
              </div>
              <div class="modal-footer">
                <slot name="footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    @click="$emit('close')"
                  >
                    Cancelar
                  </button>
                  <button type="submit" class="btn btn-dark text-white">
                    <i class="far fa-save"></i> Confirmar Cambios
                  </button>
                </slot>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: ["categoria"],
  data: function () {
    return {
      descripcion: "",
      errors: [],
    };
  },
  mounted() {
    this.descripcion = this.categoria.categoria;
  },
  methods: {
    update() {
      const param = { categoria: this.descripcion };
      axios
        .put(
          `http://aportes.test/api/categorias/update/${this.categoria.id}`,
          param
        )
        .then((response) => {
          this.$emit("close");
          this.$emit("updatedCategoria", response.data);
          this.$emit("success", 'Se actualizó correctamente');
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
  },
};
</script>
