<template>
    <div class="card">
        <div class="card-header">Subir Archivos Excel</div>

        <div class="card-body">
            <form @submit.prevent="submitFile()">
                <p v-if="hasError" class="text-danger">
                    <b>Por favor, corrija el siguiente error:</b>
                    <ul>
                        <li v-for="error in errors.file" :key="error.id">{{ error }}</li>
                        <li v-for="error in errors.name" :key="error.id">{{ error }}</li>
                        <li v-for="error in errors.periodo_id" :key="error.id">{{ error }}</li>
                        <li v-for="error in errors.tipo_id" :key="error.id">{{ error }}</li>
                        <li v-for="error in errors.organismo_id" :key="error.id">{{ error }}</li>
                    </ul>
                </p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Importar Archivo</span>
                    </div>
                    <div class="custom-file">
                        <input
                            type="file"
                            class="custom-file-input"
                            id="file"
                            name="file"
                            ref="file"
                            lang="es"
                            @change="handleFileUpload"
                        />
                        <label class="custom-file-label" for="file" data-browse="Seleccionar">Elegir Archivo</label>
                    </div>
                </div>
                <button class="btn bg-olive"><i class="fas fa-upload"></i> Subir</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
  props: ["user"],
  data: function () {
    return {
      errors: [],
      file: "",
      name:"",
      periodo_id: "",
      tipo_id : "",
      organismo_id: "",
      hasError:false,
    };
  },
  methods: {
    handleFileUpload: function () {
      this.errors = [];
      this.$refs.file.nextElementSibling.innerText = this.$refs.file.files[0].name;
      this.file = this.$refs.file.files[0];
      this.name = this.file.name;
      var porciones = this.name.split('_');
      this.periodo_id = porciones[1]
      this.tipo_id = porciones[2]
      this.organismo_id = porciones[3].slice(0,(porciones[3].length-4))
    },
    submitFile: function () {

      let formData = new FormData();
      formData.append("file", this.file);
      formData.append("user_id", this.user);
      formData.append("name", this.name);
      formData.append("periodo_id", this.periodo_id);
      formData.append("tipo_id", this.tipo_id);
      formData.append("organismo_id", this.organismo_id);
      const cabecera = {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      };
      this.createFile(formData, cabecera);
    },
    createFile: function (formData, cabecera) {
      axios
        .post("http://aportes.test/api/files/create", formData, cabecera)
        .then((response) => {
            this.$emit("file", response.data);
            this.clear()
        })
        .catch((err) => {
          this.hasError = true
          this.errors = err.response.data.errors;
        });
    },
    clear(){
      this.$refs.file.value = null;
      this.$refs.file.nextElementSibling.innerText = "Elegir Archivo";
      this.hasError = false
    }
  },
};
</script>
