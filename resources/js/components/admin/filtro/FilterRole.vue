<template>
  <div>
    <label for="inputRole">Role</label>
    <select
      id="inputRole"
      class="form-control"
      :class="selectedRole === '' ? 'text-muted' : 'text-dark'"
      v-model="selectedRole"
    >
      <option selected :value="''" disabled>Seleccione Rol...</option>
      <option class="text-capitalize" v-for="(role, index) in roles" :key="index" :value="role.id">
        {{ role.name }}
      </option>
    </select>
  </div>
</template>

<script>
const api_url = "http://aportes.test/api/roles";
export default {
  data: function () {
    return {
      roles: [],
      selectedRole: "",
    };
  },
  mounted() {
    this.getRoles();
  },
  methods: {
    getRoles() {
        axios
          .get(api_url)
          .then((response) => {
            this.roles = response.data;
          });
    },
    empty() {
      this.selectedRole = "";
      this.$emit("role", this.selectedRole);
    },
  },
  watch: {
    selectedRole() {
      this.$emit("role", this.selectedRole);
    },
  },
};
</script>
