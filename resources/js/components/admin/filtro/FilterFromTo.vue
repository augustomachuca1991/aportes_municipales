<template>
  <form>
    <div class="form-row">
      <div class="col">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-calendar-alt text-muted"> Desde</i>
            </div>
          </div>
          <input type="month" class="form-control" v-model="from" />
        </div>
      </div>
      <div class="col">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fas fa-calendar-alt text-muted"> Hasta</i>
            </div>
          </div>
          <input type="month" class="form-control" v-model="to" />
        </div>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  data: function () {
    return {
      from: "",
      to: "",
    };
  },
  methods:{
      empty(){
          this.$emit('from' , "");
          this.$emit('to' , "");
      }
  },
  watch:{
      from(){

          let arrayFrom = this.from.split('-');
          let codFrom = arrayFrom[0].toString()+arrayFrom[1].toString()
          this.$emit('from' , codFrom);
      },
      to(){
          let arrayTo = this.to.split('-');
          let codTo = arrayTo[0].toString()+arrayTo[1].toString()
          this.$emit('to' , codTo);
      }
  }
};
</script>
