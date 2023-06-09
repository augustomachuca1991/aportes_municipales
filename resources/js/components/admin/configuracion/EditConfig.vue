<template>
	<transition name="modal">
		<div class="modal-mask">
			<div class="modal-wrapper">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title">Editar Concepto</h3>
							<button type="button" class="close">
								<span @click="$emit('close')">&times;</span>
							</button>
						</div>
						<form @submit.prevent="updateConfig()">
							<div class="modal-body">
								<p>
									Este concepto pertenece a
									{{ configuracion.concepto.organismos[0].organismo }}
								</p>
								<div v-if="editMode">
									<div class="form-group">
										<label for="inputTipoDescripcion" class="sr-only"
											>Tipo</label
										>
										<input
											type="text"
											class="form-control"
											id="inputTipoDescripcion"
											v-model="descripcion"
										/>
										<small
											v-for="(error, index) in errors.concepto"
											:key="index"
											class="form-text text-danger text-italic"
										>
											{{ error }}
										</small>
									</div>
									<filter-tipo-codigo
										@typeCode="getTypeCode(...arguments)"
									></filter-tipo-codigo>
									<small
										v-for="(error, index) in errors.tipoCodigo"
										:key="'tipoCodigo'+index"
										class="form-text text-danger text-italic"
									>
										{{ error }}
									</small>
									<filter-subtipo-codigo
										@subtypeCode="getSubtypeCode(...arguments)"
									></filter-subtipo-codigo>
									<small
										v-for="(error, index) in errors.subtipoCodigo"
										:key="'subtipoCodigo'+index"
										class="form-text text-danger text-italic"
									>
										{{ error }}
									</small>
								</div>
								<div v-else>
									<p>
										Concepto:
										{{ configuracion.concepto.concepto | capitalize }}
									</p>
									<p>
										Tipo de Codigo:
										{{ configuracion.tipocodigo.descripcion }}
									</p>
									<p>
										Subtipo de Codigo:
										{{ configuracion.subtipocodigo.descripcion }}
									</p>
								</div>
							</div>
							<div class="modal-footer">
								<!-- <div class="custom-control custom-switch">
                                    <label
                                        class="custom-control-label"
                                        for="switchEdit"
                                        >Desea modificar?</label
                                    >
                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="switchEdit"
                                        v-model="editMode"
                                    />
                                    
                                </div> -->
								<div v-if="editMode">
									<slot name="footer">
										<!-- <button
											type="button"
											class="btn btn-secondary"
											@click="close()"
										>
											Cancelar
										</button> -->
										<button
											type="submit"
											class="btn btn-dark text-white"
										>
											<i class="far fa-save"></i> Confirmar Cambios
										</button>
									</slot>
								</div>
								<div class="custom-control custom-switch">
									<input
										type="checkbox"
										class="custom-control-input"
										id="customSwitchEdit"
										v-model="editMode"
									/>
									<label
										class="custom-control-label"
										for="customSwitchEdit"
										>desea modificar?</label
									>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
import FilterTipoCodigo from "../filtro/FilterTipoCodigo.vue";
import FilterSubtipoCodigo from "../filtro/FilterSubtipoCodigo.vue";
export default {
	props: ["configuracion"],
	components: {
		"filter-tipo-codigo": FilterTipoCodigo,
		"filter-subtipo-codigo": FilterSubtipoCodigo,
	},
	data: function () {
		return {
			descripcion: "",
			tipoCodigo: "",
			subtipoCodigo: "",
			errors: [],
			editMode: false,
		};
	},
	mounted() {
		this.descripcion = this.configuracion.concepto.concepto;
	},
	methods: {
		updateConfig() {
			const param = {
				concepto: this.descripcion,
				tipoCodigo: this.tipoCodigo,
				subtipoCodigo: this.subtipoCodigo,
			};
			axios
				.put(
					`http://aportes.test/api/configuraciones/update/${this.configuracion.id}`,
					param
				)
				.then((response) => {
					this.close();
					this.$emit("updatedConfig", response.data);
					//this.$emit("success", "Se actualizó correctamente");
				})
				.catch((err) => {
					this.errors = err.response.data.errors;
				});
		},
		close() {
			this.$emit("close");
			this.editMode = false;
			this.descripcion = "";
		    this.tipoCodigo = "";
			this.subtipoCodigo = "";
		},
		checked() {
			this.editMode = !this.editMode;
		},
		getTypeCode(tipoCodigo) {
			this.tipoCodigo = tipoCodigo;
		},
		getSubtypeCode(subtipoCodigo) {
			this.subtipoCodigo = subtipoCodigo;
		},
	},
	// watch:{
	//     editMode(){
	//         this.editMode = !this.editMode;
	//     }
	// }
};
</script>


<style scoped>
.modal-mask {
	position: fixed;
	z-index: 9998;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 0.5);
	display: table;
	transition: opacity 0.3s ease;
}

.modal-wrapper {
	display: table-cell;
	vertical-align: middle;
}
</style>