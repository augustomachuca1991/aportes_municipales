<template>
    <!-- Ventana Modal -->
    <div
        v-if="item"
        class="modal fade"
        id="itemModal"
        tabindex="-1"
        aria-labelledby="itemModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel">Formulario</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar"
                    ></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label"
                                >Nombre</label
                            >
                            <input
                                v-model="item.nombre"
                                type="text"
                                class="form-control"
                                id="nombre"
                                placeholder="Ingrese su nombre"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="cuil" class="form-label">CUIL</label>
                            <input
                                type="text"
                                class="form-control"
                                id="cuil"
                                placeholder="Ingrese su CUIL"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="fechaNacimiento" class="form-label"
                                >Fecha de Nacimiento</label
                            >
                            <input
                                v-model="item.nac"
                                type="date"
                                class="form-control"
                                id="fechaNacimiento"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="estadoCivil" class="form-label"
                                >Estado Civil</label
                            >
                            <select class="form-select" id="estadoCivil">
                                <option value="">Seleccione</option>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viudo">Viudo</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo</label>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="sexo"
                                    id="sexoMasculino"
                                    value="masculino"
                                />
                                <label
                                    class="form-check-label"
                                    for="sexoMasculino"
                                >
                                    Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="sexo"
                                    id="sexoFemenino"
                                    value="femenino"
                                />
                                <label
                                    class="form-check-label"
                                    for="sexoFemenino"
                                >
                                    Femenino
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label"
                                >Dirección</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="direccion"
                                placeholder="Ingrese su dirección"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label"
                                >Teléfono</label
                            >
                            <input
                                type="tel"
                                class="form-control"
                                id="telefono"
                                placeholder="Ingrese su teléfono"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="fechaIngreso" class="form-label"
                                >Fecha de Ingreso</label
                            >
                            <input
                                type="date"
                                class="form-control"
                                id="fechaIngreso"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="fechaEgreso" class="form-label"
                                >Fecha de Egreso</label
                            >
                            <input
                                type="date"
                                class="form-control"
                                id="fechaEgreso"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="cargo" class="form-label">Cargo</label>
                            <input
                                type="text"
                                class="form-control"
                                id="cargo"
                                placeholder="Ingrese su cargo"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="situacion" class="form-label"
                                >Situación</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="situacion"
                                placeholder="Ingrese su situación"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label"
                                >Estado</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="estado"
                                placeholder="Ingrese su estado"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="basico" class="form-label"
                                >Básico</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="basico"
                                placeholder="Ingrese el básico"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="antiguedad" class="form-label"
                                >Antigüedad</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="antiguedad"
                                placeholder="Ingrese la antigüedad"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label"
                                >Título</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="titulo"
                                placeholder="Ingrese el título"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="presentismo" class="form-label"
                                >Presentismo</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="presentismo"
                                placeholder="Ingrese el presentismo"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="adicional" class="form-label"
                                >Adicional</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="adicional"
                                placeholder="Ingrese el adicional"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="resolucion" class="form-label"
                                >Resolución</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="resolucion"
                                placeholder="Ingrese la resolución"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="minGarantizado" class="form-label"
                                >Mínimo Garantizado</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="minGarantizado"
                                placeholder="Ingrese el mínimo garantizado"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="noRemunerativo" class="form-label"
                                >No Remunerativo</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="noRemunerativo"
                                placeholder="Ingrese el no remunerativo"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="plus" class="form-label">Plus</label>
                            <input
                                type="number"
                                class="form-control"
                                id="plus"
                                placeholder="Ingrese el plus"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="dedicacionFuncional" class="form-label"
                                >Dedicación Funcional</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="dedicacionFuncional"
                                placeholder="Ingrese la dedicación funcional"
                            />
                        </div>
                        <div class="mb-3">
                            <label
                                for="prolongacionDeJornada"
                                class="form-label"
                                >Prolongación de Jornada</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="prolongacionDeJornada"
                                placeholder="Ingrese la prolongación de jornada"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="productividad" class="form-label"
                                >Productividad</label
                            >
                            <input
                                type="number"
                                class="form-control"
                                id="productividad"
                                placeholder="Ingrese la productividad"
                            />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cerrar
                    </button>
                    <button type="button" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
    data: function () {
        return {};
    },
    mounted() {},
    methods: {
        createItem() {
            //this.addItem({ item: this.item })
            this.$store.dispatch("removeErrors");
            this.$store.dispatch("addItem", { item: this.item });
            //const params = { item: this.item };
            // Items.store(params)
            //     .then((response) => {
            //         const item = response.data;
            //         this.$emit("new", item);
            //     })
            //     .catch((err) => {
            //         this.errors = err.response.data.errors;
            //     });
        },
    },
    computed: {
        item() {
            return this.$store.state.item;
        },
    },
};
</script>
