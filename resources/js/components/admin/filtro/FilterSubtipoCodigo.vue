<template>
	<div class="form-group">
		<label for="selectSubtipoCodigo" class="sr-only">Subtipo Codigo</label>
		<select
			class="form-control"
			id="selectSubtipoCodigo"
			:class="selectedSubtype === '' ? 'text-muted' : 'text-dark'"
			v-model="selectedSubtype"
		>
			<option selected :value="''" disabled>Subtipo Codigo</option>
			<option v-for="(subtype, index) in subtypes" :key="index" :value="subtype.id">
				{{ subtype.descripcion }}
			</option>
		</select>
	</div>
</template>

<script>
export default {
	data: function () {
		return {
			subtypes: [],
			selectedSubtype: "",
		};
	},
	mounted() {
		axios.get("http://aportes.test/api/subcodigos").then((response) => {
			this.subtypes = response.data;
		});
	},
	methods: {
		empty() {
			this.selectedSubtype = "";
		},
	},
	watch: {
		selectedSubtype() {
			this.$emit("subtypeCode", this.selectedSubtype);
		},
	},
};
</script>
