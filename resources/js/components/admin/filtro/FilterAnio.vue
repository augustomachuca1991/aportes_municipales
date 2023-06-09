<template>
  <div>
    
    <select
      class="form-control"
      :class="selectedYear === '' ? 'text-muted' : 'text-dark'"
      id="periodoFormControlSelect1"
      v-model="selectedYear"
    >
      <option selected :value="''" disabled>Año</option>
      <option v-for="(year, index) in years" :key="index" :value="year">
        {{ year }}
      </option>
    </select>
  </div>
</template>
<script>
export default {
  //props: ["clear"],
  data: function () {
    return {
      years: [],
      selectedYear: "",
    };
  },
  mounted() {
    const yearsBack = (back) => {
      const year = new Date().getFullYear();
      return Array.from({ length: back }, (v, i) => year - back + i + 1);
    };
    this.years = yearsBack(110).reverse();
  },
  methods: {
      empty(){
              this.selectedYear = '';
      }
  },
  watch: {
    selectedYear() {
      this.$emit("year", this.selectedYear);
    },
  },
};
</script>
