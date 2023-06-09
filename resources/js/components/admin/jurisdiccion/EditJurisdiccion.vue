<template>
  <div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">
            {{ jurisdiccion.jurisdiccion }}
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="formGroupjurisdiccionInput">JURISDICCIÓN</label>
              <input
                type="text"
                class="form-control"
                id="formGroupjurisdiccionInput"
                :placeholder="jurisdiccion.jurisdiccion"
                :disabled="!editMode"
                v-model="descripcion"
              />
              <span class="text-xs text-danger font-italic">{{
                errors.jurisdiccion
              }}</span>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            v-if="!editMode"
            type="button"
            class="btn btn-secondary"
            @click="edit(jurisdiccion)"
          >
            Editar
          </button>
          <button v-else type="button" class="btn btn-primary" @click="update">
            Confirmar Cambios
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["jurisdiccion", "index"],
  data: function () {
    return {
      descripcion: "",
      editMode: false,
      errors: [],
    };
  },
  mounted() {},
  methods: {
    edit(jurisdiccion) {
      this.descripcion = jurisdiccion.jurisdiccion;
      this.editMode = true;
    },
    update() {
      //this.jurisdiccion.jurisdiccion = this.descripcion;
      this.editMode = false;
      const params = {
        jurisdiccion: this.descripcion,
      };
      axios
        .put(
          `http://aportes.test/api/jurisdicciones/update/${this.jurisdiccion.id}`,
          params
        )
        .then((response) => {
          this.$emit("updatedJurisdiccion", response.data);
          $("#editModal").modal("hide");
          this.clear;
        })
        .catch((err) => {
          //console.log(err.response.data.errors.jurisdiccion);
          this.errors = err.response.data.errors;
        });
    },
    clear() {
      this.errors = [];
      this.descripcion = "";
    },
  },
};
</script>
