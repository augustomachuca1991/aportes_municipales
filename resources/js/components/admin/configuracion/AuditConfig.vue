<template>
	<div>
		<h1>auditoria</h1>
		<ul>
			<li v-for="auditoria in auditorias" :key="auditoria.key">
				<small class="badge badge-danger">Old{{ auditoria.old_values }}</small> --> <small class="badge badge-success">New{{ auditoria.new_values }}</small> <small class="badge badge-warning text-dark"><i class="far fa-clock"></i> {{auditoria.updated_at | moment}}</small> <small class="badge badge-primary"><i class="far fa-user"></i> {{auditoria.user.name | capitalize}}</small>
			</li>
		</ul>
	</div>
</template>

<script>
const apiUrl = "http://aportes.test/api/configuraciones/audit";
export default {
	data: function () {
		return {
			auditorias: [],
		};
	},
	mounted() {
		axios.get(apiUrl).then((response) => {
			let auditorias = response.data;
			this.auditorias = auditorias;
		});
	},
};
</script>