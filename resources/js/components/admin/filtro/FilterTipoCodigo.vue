<template>
	<div class="form-group">
		<label for="selectTipoCodigo" class="sr-only">Tipo Codigo</label>
		<select
			class="form-control"
			id="selectTipoCodigo"
			:class="selectedType === '' ? 'text-muted' : 'text-dark'"
			v-model="selectedType"
		>
			<option selected :value="''" disabled>Tipo Codigo</option>
			<option v-for="(type, index) in types" :key="index" :value="type.id">
				{{ type.descripcion }}
			</option>
		</select>
	</div>
</template>

<script>
export default {
	data: function () {
		return {
			types: [],
			selectedType: "",
		};
	},
	mounted() {
		axios.get("http://aportes.test/api/codigos").then((response) => {
			this.types = response.data;
		});
	},
	methods: {
		empty() {
			this.selectedType = "";
		},
	},
	watch: {
		selectedType() {
			this.$emit("typeCode", this.selectedType);
		},
	},
};
</script>
