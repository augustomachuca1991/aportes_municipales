<template>
	<div class="container">
		<div
			v-for="(tipo, i) in tipoCodigos"
			:key="i"
			class="accordion"
			:id="'accordion-tipo-' + i"
		>
			<div class="card">
				<div
					class="card-header callout callout-warning"
					:id="'heading-tipo-' + i"
				>
					<h2 class="mb-0">
						<button
							class="
								btn btn-link btn-block
								text-right text-decoration-none
							"
							type="button"
							data-toggle="collapse"
							:data-target="'#collapse-tipo-' + i"
							aria-expanded="true"
							:aria-controls="'collapse-tipo-' + i"
						>
							#{{ tipo.codigo }} {{ tipo.descripcion }} ({{
								tipo.subtipocodigos.length
							}})
						</button>
					</h2>
				</div>

				<div
					:id="'collapse-tipo-' + i"
					class="collapse"
					:aria-labelledby="'heading-tipo-' + i"
					:data-parent="'#accordion-tipo-' + i"
				>
					<div class="card-body">
						<div
							v-for="(subtipo, j) in tipo.subtipocodigos"
							:key="j"
							class="accordion"
							:id="'accordion-subtipo-' + i + '-' + j"
						>
							<div class="card">
								<div
									class="card-header callout callout-warning"
									:id="'heading-subtipo-' + i + '-' + j"
								>
									<h2 class="mb-0">
										<button
											class="btn btn-link btn-block text-left"
											type="button"
											data-toggle="collapse"
											:data-target="
												'#collapse-subtipo-' + i + '-' + j
											"
											aria-expanded="true"
											:aria-controls="
												'collapse-subtipo-' + i + '-' + j
											"
										>
											#{{ subtipo.codigo }} {{ subtipo.descripcion }}
										</button>
									</h2>
								</div>

								<div
									:id="'collapse-subtipo-' + i + '-' + j"
									class="collapse"
									:aria-labelledby="'heading-subtipo-' + i + '-' + j"
									:data-parent="'#accordion-subtipo-' + i + '-' + j"
								>
									<div class="card-body">
										<ul
											class="list-group list-group-flush"
											v-for="(concepto, k) in subtipo.conceptos"
											:key="k"
										>
											<li class="list-group-item">
												{{ concepto.codigo }}
											</li>
											<li class="list-group-item">
												{{ concepto.concepto | capitalize }}
											</li>
											<li class="list-group-item">
												{{ concepto.unidad }}
											</li>
											<li
												class="list-group-item"
												v-for="(
													organismo, l
												) in concepto.organismos"
												:key="l"
											>
												{{ organismo.organismo }}
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import ShowCodigo from "./ShowCodigo.vue";
export default {
	components: {
		"show-codigo": ShowCodigo,
	},
	data: function () {
		return {
			tipoCodigos: [],
			tipoCodigo: {},
			search: "",
			selectOrder: true,
			timeOut: 600,
		};
	},
	mounted() {
		//console.log("agente filter component mounted");
		this.getTipoCodigos();
	},
	methods: {
		getTipoCodigos: function () {
			window.axios.defaults.headers.common['Authorization'] = "Bearer 3|z9qHDq1u3tO3p2YZPxVHabU6vpN9RtUSYAqPk7Se";
			
      axios.get("http://aportes.test/api/codigos").then((response) => {
				this.tipoCodigos = response.data;
			});
			// axios.get("http://aportes.test/api/codigos").then((response) => {
			// 	this.tipoCodigos = response.data;
			// });
		},
		searchTipoCodigo: function () {
			const params = {
				search: this.search,
			};
			axios
				.post("http://aportes.test/api/codigos/search", params)
				.then((response) => {
					setTimeout(() => {
						this.tipoCodigos = response.data;
						console.log(this.tipoCodigos);
					}, this.timeOut);
				});
		},
		showTipoCodigo: function (tipoCodigo) {
			this.tipoCodigo = tipoCodigo;
			console.log(this.tipoCodigo);
		},
	},
	watch: {
		selectOrder() {
			const params = {
				by: this.selectOrder,
				//order: !this.order,
			};
			axios
				.post("http://aportes.test/api/codigos/order-by", params)
				.then((response) => {
					console.log(response.data);
					this.tipoCodigos = response.data;
				});
		},
	},
};
</script>
