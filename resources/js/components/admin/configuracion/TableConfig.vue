<template>
	<main>
		<div class="container-xl px-4 mt-4">
			<div class="row">
				<div class="col">
					<div class="card">
						<div
							class="
								card-header
								p-4 p-md-5
								border-bottom-0
								bg-gradient-secondary
								text-white-50
							"
						>
							<div
								class="
									row
									gx-4
									justify-content-between
									align-items-center
								"
							>
								<div
									class="
										col-12 col-lg-auto
										mb-5 mb-lg-0
										text-center text-lg-start
									"
								>
									<img
										:src="'../image/logo-ips-header.png'"
										alt="IPS-Corrientes-Logo-Corrientes"
										class="invoice-brand-img mb-4"
									/>
									<div class="h2 text-white mb-0">
										Instituto de Previsión Social
									</div>
									Diseño web &amp; Desarrollo
								</div>
								<div class="col-12 col-lg-auto text-center text-lg-end">
									<div class="h3 text-white">Config.</div>
									#1234<br />Ultimo Acceso
								</div>
							</div>
						</div>
						<div class="card-body p-4 p-md-5">
							<div class="table-responsive">
								<table class="table table-borderless mb-0">
									<thead class="border-bottom">
										<tr class="small text-uppercase text-muted">
											<th scope="col">Concepto</th>
											<th scope="col">Subtipo de Codigos</th>
											<th scope="col">Tipo de Codigos</th>
											<th scope="col">Importe</th>
											<th scope="col"></th>
										</tr>
									</thead>
									<tbody>
										<tr
											class="border-bottom"
											v-for="(configuracion, i) in configuraciones"
											:key="i"
										>
											<td>
												<p
													class="
														text-justify
														d-flex
														flex-column
														mb-0
													"
												>
													{{
														configuracion.concepto.concepto
															| capitalize
													}}
												</p>
												<span
													class="text-muted"
													v-for="(organismo, j) in configuracion
														.concepto.organismos"
													:key="j"
												>
													{{ organismo.organismo }}</span
												>
											</td>
											<td>
												{{ configuracion.subtipocodigo.codigo }}
												-
												{{
													configuracion.subtipocodigo.descripcion
												}}
											</td>
											<td>
												{{ configuracion.tipocodigo.codigo }}
												-
												{{ configuracion.tipocodigo.descripcion }}
											</td>
											<td>$123</td>
											<td>
												<a
													href="#"
													id="show-modal"
													@click="isOpenConfig(i, configuracion)"
													><i class="fas fa-pen text-warning"></i
												></a>
											</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td>
												Lorem ipsum dolor sit amet consectetur,
												adipisicing elit. Pariatur vel veniam
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-auto">
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Configuracion</h3>

							<div class="card-tools">
								<button
									type="button"
									class="btn btn-tool"
									data-card-widget="collapse"
									title="Collapse"
								>
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="inputName">Tipos de Codigo</label>
								<div class="form-group">
									<div class="form-check">
										<input
											class="form-check-input"
											type="radio"
											name="tipo"
										/>
										<label class="form-check-label"
											>tipo codigo</label
										>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="inputDescription">Subtipos de Codigo</label>
								<div class="form-group">
									<div class="form-check">
										<input
											class="form-check-input"
											type="radio"
											name="subtipo"
										/>
										<label class="form-check-label">subtipo</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="departamento">Departamento</label>
								<select
									id="departamento"
									class="form-control custom-select"
								>
									<option selected disabled :value="''">
										Seleccione Departamento
									</option>
								</select>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button class="btn btn-block btn-primary" type="button">
								Guardar Cambios
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<edit-config
			v-if="showModal"
			@close="showModal = false"
			:configuracion="configuracion"
			@updatedConfig="updateConfig(...arguments)"
		>
		</edit-config>
	</main>
</template>

<script>
const apiUrl = "http://aportes.test/api/configuraciones";
import EditConfig from "./EditConfig.vue";
export default {
	components: {
		"edit-config": EditConfig,
	},
	data: function () {
		return {
			configuraciones: [],
			configuracion: {},
			configuracionIndex: "",
			showModal: false,
		};
	},
	mounted: function () {
		this.getConfiguraciones();
	},
	methods: {
		getConfiguraciones() {
			axios.get(`${apiUrl}`).then((response) => {
				let configuraciones = response.data;
				if (configuraciones.length) {
					this.configuraciones = configuraciones;
				}
			});
		},
		isOpenConfig(i, configuracion) {
			this.showModal = true;
			this.configuracion = configuracion;
			this.configuracionIndex = i;
		},
		updateConfig(configuracion) {
			this.configuraciones[this.configuracionIndex] = configuracion;
			var msj =
				configuracion.concepto.concepto +
				" se modificó de " +
				this.configuracion.tipocodigo.descripcion +
				" a " +
				configuracion.tipocodigo.descripcion;
			this.alertSuccess(msj);
		},
		alertSuccess(message) {
			Vue.swal(message);
		},
	},
};
</script>
