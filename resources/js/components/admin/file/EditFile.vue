<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title">Rectificar Archivo</h3>
              <button type="button" class="close">
                <span @click="$emit('close')">&times;</span>
              </button>
            </div>
            <form @submit.prevent="submitFile()">
              <div class="modal-body">
                <div class="form-group">
                  <label for="inputFile" class="sr-only">Subir Archivo</label>
                  <input
                    type="file"
                    class="form-control"
                    id="inputFile"
                    ref="fileEdit"
                    @change="handleFileEditUpload"
                  />
                  <div v-if="hasError">
                    <small
                      v-for="(error, index) in errors.file"
                      :key="'file'+index"
                      class="form-text text-danger text-italic"
                    >
                      {{ error }}
                    </small>
                    <small
                      v-for="(error, index) in errors.name"
                      :key="'name'+index"
                      class="form-text text-danger text-italic"
                    >
                      {{ error }}
                    </small>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
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
  props: ["file", "user"],
  data: function () {
    return {
      fileEdit: "",
      name: "",
      periodo_id: "",
      tipo_id: "",
      organismo_id: "",
      errors: [],
      hasError: false,
    };
  },
  mounted() {},
  methods: {
    handleFileEditUpload() {
      this.errors = [];
      this.fileEdit = this.$refs.fileEdit.files[0];
      this.name = this.fileEdit.name;
      var porciones = this.name.split("_");
      this.periodo_id = porciones[1];
      this.tipo_id = porciones[2];
      this.organismo_id = porciones[3].slice(0, porciones[3].length - 4);
    },
    submitUpdateFile() {
      let formFile = new FormData();
      formFile.append("fileEdit", this.fileEdit);
      formFile.append("user_id", this.user);
      const cabecera = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      };

      this.updateFile(formFile, cabecera);
    },

    submitFile() {
      let formData = new FormData();
      formData.append("file", this.fileEdit);
      formData.append("user_id", this.user);
      formData.append("old_name", this.file.name);
      formData.append("name", this.name);
      formData.append("periodo_id", this.periodo_id);
      formData.append("tipo_id", this.tipo_id);
      formData.append("organismo_id", this.organismo_id);
      const cabecera = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      };
      this.update(formData, cabecera);
    },
    update(formData, cabecera) {
      axios
        .post(
          `http://aportes.test/api/files/update/${this.file.id}`,
          formData,
          cabecera
        )
        .then((response) => {
          this.$emit("fileEdit", response.data);
          this.$emit("close");
          this.empty();
        })
        .catch((err) => {
          this.hasError = true;
          this.errors = err.response.data.errors;
        });
    },
    empty() {
      this.$refs.fileEdit.value = null;
      this.$refs.fileEdit.nextElementSibling.innerText = "Elegir Archivo";
      this.errors = [];
    },
  },
};
</script>
