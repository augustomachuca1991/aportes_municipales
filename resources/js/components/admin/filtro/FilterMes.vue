<template>
  <div>
    
    <select
      class="form-control text-capitalize"
      :class="selectedMonth === '' ? 'text-muted' : 'text-dark'"
      id="mesFormControlSelect1"
      v-model="selectedMonth"
    >
      <option selected :value="''" disabled>Mes</option>
      <option v-for="(month, index) in months" :key="index" :value="index">
        {{ month }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      months: [],
      selectedMonth: "",
    };
  },
  mounted() {
    this.months = {
      "01": "enero",
      "02": "febrero",
      "03": "marzo",
      "04": "abril",
      "05": "mayo",
      "06": "junio",
      "07": "julio",
      "08": "agosto",
      "09": "septiembre",
      "10": "octubre",
      "11": "noviembre",
      "12": "diciembre",
    };
  },
  methods: {
    empty() {
      this.selectedMonth = "";
    },
  },
  watch: {
    selectedMonth() {
      this.$emit("month", this.selectedMonth);
    },
  },
};
</script>
