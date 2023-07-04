<template>
    <div class="card py-4 px-3">
        <h2>Nuevo Registro</h2>
        <form @submit.prevent="createItem()">
            <div class="row">
                <div class="col-md-4">
                    <input-component
                        v-model="item.nombre"
                        label="NOMBRE (*)"
                        type="text"
                        name="nombre"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <input-component
                        v-model="item.cuil"
                        label="CUIL (*)"
                        type="text"
                        name="cuil"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <input-component
                        v-model="item.fechaIngreso"
                        label="FECHA DE INGRESO (*)"
                        type="date"
                        name="fechaIngreso"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input-component
                        v-model="item.nac"
                        label="FECHA DE NACIMIENTO (*)"
                        type="date"
                        name="nac"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <input-component
                        label="ESTADO CIVIL (*)"
                        name="estadoCivil"
                        type="select"
                        :options="civilOptions"
                        v-model="item.estadoCivil"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <label for="sexo">SEXO (*)</label>
                    <fieldset
                        class="border rounded px-2 py-1"
                        :class="{
                            'border-danger': errors['sexo'],
                        }"
                    >
                        <div class="form-check form-check-inline">
                            <input
                                v-model="item.sexo"
                                class="form-check-input"
                                type="radio"
                                name="sexo"
                                id="masculino"
                                value="1"
                            />
                            <label class="form-check-label" for="masculino"
                                >Masculino</label
                            >
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                v-model="item.sexo"
                                class="form-check-input"
                                type="radio"
                                name="sexo"
                                id="femenino"
                                value="2"
                            />
                            <label class="form-check-label" for="femenino"
                                >Femenino</label
                            >
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input-component
                        v-model="item.cargo"
                        label="CARGO (*)"
                        type="text"
                        name="cargo"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <input-component
                        label="SITUACIÓN DE REVISTA (*)"
                        name="situacion"
                        type="select"
                        :options="situacionOptions"
                        v-model="item.situacion"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <input-component
                        label="ESTADO (*)"
                        name="estado"
                        type="select"
                        :options="estados"
                        v-model="item.estado"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input-component
                        label="DIRECCIÓN"
                        name="direccion"
                        type="text"
                        v-model="item.direccion"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <input-component
                        label="TELEFONO"
                        name="telefono"
                        type="text"
                        v-model="item.telefono"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
                <div class="col-md-4">
                    <input-component
                        label="FECHA DE EGRESO"
                        name="fechaEgreso"
                        type="date"
                        v-model="item.fechaEgreso"
                        :errors="errors"
                        classes="form-control"
                    ></input-component>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <input-component
                            v-model="item.basico"
                            arial-label="BASICO"
                            type="number"
                            name="basico"
                            :errors="errors"
                            classes="form-control"
                            placeholder="basico"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.antiguedad"
                            arial-label="antiguedad"
                            type="number"
                            name="antiguedad"
                            :errors="errors"
                            classes="form-control"
                            placeholder="antiguedad"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.titulo"
                            arial-label="titulo"
                            type="number"
                            name="titulo"
                            :errors="errors"
                            classes="form-control"
                            placeholder="titulo"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.presentismo"
                            arial-label="presentismo"
                            type="number"
                            name="presentismo"
                            :errors="errors"
                            classes="form-control"
                            placeholder="presentismo"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.adicional"
                            arial-label="adicional"
                            type="number"
                            name="adicional"
                            :errors="errors"
                            classes="form-control"
                            placeholder="adicional"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.resolucion"
                            arial-label="resolucion"
                            type="number"
                            name="resolucion"
                            :errors="errors"
                            classes="form-control"
                            placeholder="resolucion"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.minGarantizado"
                            arial-label="minGarantizado"
                            type="number"
                            name="minGarantizado"
                            :errors="errors"
                            classes="form-control"
                            placeholder="min garantizado"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.noRemunerativo"
                            arial-label="noRemunerativo"
                            type="number"
                            name="noRemunerativo"
                            :errors="errors"
                            classes="form-control"
                            placeholder="no remunerativo"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.plus"
                            arial-label="plus"
                            type="number"
                            name="plus"
                            :errors="errors"
                            classes="form-control"
                            placeholder="plus"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.dedicacionFuncional"
                            arial-label="dedicacionFuncional"
                            type="number"
                            name="dedicacionFuncional"
                            :errors="errors"
                            classes="form-control"
                            placeholder="dedicacion funcional"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.prolongacionDeJornada"
                            arial-label="prolongacionDeJornada"
                            type="number"
                            name="prolongacionDeJornada"
                            :errors="errors"
                            classes="form-control"
                            placeholder="prolongacion de jornada"
                            min="0"
                        ></input-component>
                        <input-component
                            v-model="item.productividad"
                            arial-label="productividad"
                            type="number"
                            name="productividad"
                            :errors="errors"
                            classes="form-control"
                            placeholder="productividad"
                            min="0"
                        ></input-component>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col">
                    <input-component
                        label="PERIODO"
                        name="periodo"
                        type="select"
                        v-model="periodo"
                        :errors="errros"
                        :options="periodos"
                        classes="form-control"
                    >
                    </input-component>
                </div>
            </div> -->

            <input type="submit" class="btn btn-primary mt-3" value="Agregar" />
            <span> Los campos con (*) son obligatorios</span>
        </form>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import InputComponent from "../../generic/InputComponent.vue";
export default {
    data: function () {
        return {
            item: {
                nombre: "",
                dni: "",
                cuil: "",
                nac: "",
                estadoCivil: "",
                sexo: "1",
                direccion: "",
                telefono: "",
                fechaIngreso: "",
                fechaEgreso: "",
                cargo: "",
                situacion: "",
                estado: "",
                basico: "",
                antiguedad: "",
                titulo: "",
                presentismo: "",
                adicional: "",
                resolucion: "",
                minGarantizado: "",
                noRemunerativo: "",
                plus: "",
                dedicacionFuncional: "",
                prolongacionDeJornada: "",
                productividad: "",
            },
            generoOptions: ["Masculino", "Femenino"],
            civilOptions: [
                { value: "", label: "Seleccione..." },
                { value: "1", label: "Casado" },
                { value: "2", label: "Viudo" },
                { value: "3", label: "Soltero" },
                // Agrega aquí más opciones de países si lo deseas
            ],
            situacionOptions: [
                { value: "", label: "Seleccione..." },
                { value: "1", label: "Planta Permanente" },
                { value: "2", label: "Contratado" },
                { value: "3", label: "Pasante" },
                // Agrega aquí más opciones de países si lo deseas
            ],
        };
    },
    components: {
        InputComponent,
    },
    mounted() {
        this.item.fechaEgreso = this.getCurrentData;
        this.$store.dispatch("getEstados");
        this.$store.dispatch("getPeriodos");
    },
    methods: {
        createItem() {
            this.$store.dispatch("removeErrors");
            this.$store.dispatch("addItem", this.item);
        },
    },
    computed: {
        errors() {
            return this.$store.state.errors;
        },
        estados() {
            const estados = this.$store.state.estados.map((obj) => {
                return { value: obj.id, label: obj.estado };
            });
            return [{ value: "", label: "Seleccione..." }, ...estados];
        },
        periodos() {
            const periodos = this.$store.state.periodos.map((obj) => {
                return { value: obj.codigo, label: obj.anio + " - " + obj.periodo };
            });
            return [{ value: "", label: "Seleccione..." }, ...periodos];
        },
        getCurrentData() {
            var fechaActual = new Date();
            var formattedFechaActual = fechaActual.toISOString().split("T")[0];
            return formattedFechaActual;
        },
    },
};
</script>
