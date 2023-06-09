<template>
  <div class="form-row">
    <div class="col">
      <div class="input-group mb-2">
        <input
          id="inputSearch"
          type="search"
          class="form-control"
          aria-label="Type your keywords here"
          placeholder="Search"
          v-model="search"
          @keyup="searchText"
        />
        <div class="input-group-append">
          <button type="button" class="btn btn-secondary" @click="empty">
            Limpiar<i class="fa fa-broom"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      search: "",
      setTimeoutBuscador: "",
      timeOut: 400,
    };
  },
  methods: {
    searchText() {
      clearTimeout(this.setTimeoutBuscador);
      this.setTimeoutBuscador = setTimeout(() => {
        this.$emit("buscar", this.search);
      }, this.timeOut);
    },
    empty() {
      this.search = "";
      this.$emit("buscar", this.search);
    },
  },
};
</script>
