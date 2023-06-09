<template>
  <div class="form-row">
    <div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fas fa-calendar-alt text-muted"> Periodo</i>
          </div>
        </div>
        <input type="month" class="form-control" v-model="periodo" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      periodo: "",
    };
  },
  methods: {
    empty() {
      this.$emit("periodo", "");
    },
  },
  watch:{
      periodo(){

          let arrayPeriodo = this.periodo.split('-');
          let codPeriodo = arrayPeriodo[0].toString()+arrayPeriodo[1].toString()
          this.$emit('periodo' , codPeriodo);
      },
  }
};
</script>
