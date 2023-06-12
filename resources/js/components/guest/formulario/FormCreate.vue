<template>
    <div class="card py-4 px-3">
        <h2>Nuevo Registro</h2>
        <form @submit.prevent="createItem()">
            <div class="row">
                <div class="col-md-4">
                    <label for="nombre">NOMBRE(*)</label>
                    <input
                        v-model="item.nombre"
                        type="text"
                        class="form-control"
                        :class="{ 'is-invalid': errors['item.nombre'] }"
                        id="nombre"
                    />
                    <div class="invalid-feedback" v-if="errors['item.nombre']">
                        {{ errors["item.nombre"] | firstElement }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="cuil">CUIL(*)</label>
                    <div class="input-group">
                        <input
                            v-model="item.cuil.first"
                            type="text"
                            class="form-control"
                            :class="{
                                'is-invalid': errors['item.cuil.first'],
                            }"
                            id="cuil1"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.cuil.first']"
                        >
                            {{ errors["item.cuil.first"] | firstElement }}
                        </div>
                        <input
                            v-model="item.cuil.middle"
                            type="text"
                            class="form-control"
                            :class="{
                                'is-invalid': errors['item.cuil.middle'],
                            }"
                            id="cuil2"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.cuil.middle']"
                        >
                            {{ errors["item.cuil.middle"] | firstElement }}
                        </div>
                        <input
                            v-model="item.cuil.last"
                            type="text"
                            class="form-control"
                            :class="{
                                'is-invalid': errors['item.cuil.last'],
                            }"
                            id="cuil3"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.cuil.last']"
                        >
                            {{ errors["item.cuil.last"] | firstElement }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="fechaIngreso">FECHA INGRESO(*)</label>
                    <input
                        v-model="item.fechaIngreso"
                        type="date"
                        class="form-control"
                        id="fechaIngreso"
                        :class="{
                            'is-invalid': errors['item.fechaIngreso'],
                        }"
                    />
                    <div
                        class="invalid-feedback"
                        v-if="errors['item.fechaIngreso']"
                    >
                        {{ errors["item.fechaIngreso"] | firstElement }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="fecha-nac">FECHA DE NACIMIENTO(*)</label>
                    <input
                        v-model="item.nac"
                        type="date"
                        class="form-control"
                        :class="{ 'is-invalid': errors['item.nac'] }"
                        id="fecha-nac"
                    />
                    <div class="invalid-feedback" v-if="errors['item.nac']">
                        {{ errors["item.nac"] | firstElement }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="estadoCivil">ESTADO CIVIL(*)</label>
                    <select
                        v-model="item.estadoCivil"
                        class="form-select"
                        :class="{
                            'is-invalid': errors['item.estadoCivil'],
                        }"
                        id="estadoCivil"
                    >
                        <option value="" selected>Seleccione...</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Viudo</option>
                    </select>
                    <div
                        class="invalid-feedback"
                        v-if="errors['item.estadoCivil']"
                    >
                        {{ errors["item.estadoCivil"] | firstElement }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sexo">SEXO(*)</label>
                    <div class="invalid-feedback">obligatorio</div>
                    <fieldset
                        class="border rounded px-2 py-1"
                        :class="{
                            'border-danger': errors['item.sexo'],
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
                            <div class="invalid-feedback">obligatorio</div>
                            <label class="form-check-label" for="femenino"
                                >Femenino</label
                            >
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="cargo">CARGO(*)</label>
                    <input
                        v-model="item.cargo"
                        type="text"
                        class="form-control"
                        id="cargo"
                        :class="{ 'is-invalid': errors['item.cargo'] }"
                    />
                    <div class="invalid-feedback" v-if="errors['item.cargo']">
                        {{ errors["item.cargo"] | firstElement }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="situacion">SITUACIÓN(*)</label>
                    <select
                        v-model="item.situacion"
                        id="situacion"
                        class="form-select"
                        :class="{ 'is-invalid': errors['item.situacion'] }"
                    >
                        <option value="" selected>Seleccione...</option>
                        <option value="1">Planta Permanente</option>
                        <option value="2">Contratado</option>
                    </select>
                    <div
                        class="invalid-feedback"
                        v-if="errors['item.situacion']"
                    >
                        {{ errors["item.situacion"] | firstElement }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="estado">ESTADO(*)</label>
                    <select
                        v-model="item.estado"
                        class="form-select"
                        :class="{
                            'is-invalid': errors['item.estado'],
                        }"
                        id="estado"
                    >
                        <option value="" selected>Seleccione...</option>
                        <option value="1">Contratado</option>
                        <option value="2">Freelancer</option>
                        <option value="3">OTRO</option>
                    </select>
                    <div class="invalid-feedback" v-if="errors['item.estado']">
                        {{ errors["item.estado"] | firstElement }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="direccion">DIRECCIÓN</label>
                    <input
                        v-model="item.direccion"
                        type="text"
                        class="form-control"
                        id="direccion"
                    />
                </div>
                <div class="col-md-4">
                    <label for="telefono">TELÉFONO</label>
                    <input
                        v-model="item.telefono"
                        type="text"
                        class="form-control"
                        id="numeroTelefono"
                    />
                </div>
                <div class="col-md-4">
                    <label for="fechaEgreso">FECHA EGRESO !</label>
                    <input
                        v-model="item.fechaEgreso"
                        type="date"
                        class="form-control"
                        id="fechaEgreso"
                    />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="Conceptos">CONCEPTOS</label>
                    <div class="input-group">
                        <input
                            v-model="item.basico"
                            type="text"
                            aria-label="Basico"
                            class="form-control"
                            placeholder="Basico $"
                            name="inputBasico"
                            :class="{
                                'is-invalid': errors['item.basico'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.basico']"
                        >
                            {{ errors["item.basico"] | firstElement }}
                        </div>
                        <input
                            v-model="item.antiguedad"
                            type="text"
                            aria-label="Antiguedad"
                            class="form-control"
                            placeholder="Antiguedad $"
                            name="inputAntiguedad"
                            :class="{
                                'is-invalid': errors['item.antiguedad'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.antiguedad']"
                        >
                            {{ errors["item.antiguedad"] | firstElement }}
                        </div>
                        <input
                            v-model="item.titulo"
                            type="text"
                            aria-label="Titulo"
                            class="form-control"
                            placeholder="Titulo $"
                            name="inputTitulo"
                            :class="{
                                'is-invalid': errors['item.titulo'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.titulo']"
                        >
                            {{ errors["item.titulo"] | firstElement }}
                        </div>
                        <input
                            v-model="item.presentismo"
                            type="text"
                            aria-label="Presentismo"
                            class="form-control"
                            placeholder="Presentismo $"
                            name="inputPresentismo"
                            :class="{
                                'is-invalid': errors['item.presentismo'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.presentismo']"
                        >
                            {{ errors["item.presentismo"] | firstElement }}
                        </div>
                        <input
                            v-model="item.adicional"
                            type="text"
                            aria-label="Adicional"
                            class="form-control"
                            placeholder="Adicional $"
                            name="inputAdicional"
                            :class="{
                                'is-invalid': errors['item.adicional'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.adicional']"
                        >
                            {{ errors["item.adicional"] | firstElement }}
                        </div>
                        <input
                            v-model="item.resolucion"
                            type="text"
                            aria-label="Resolucion"
                            class="form-control"
                            placeholder="Resolucion $"
                            name="inputResolucion"
                            :class="{
                                'is-invalid': errors['item.resolucion'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.resolucion']"
                        >
                            {{ errors["item.resolucion"] | firstElement }}
                        </div>
                        <input
                            v-model="item.minGarantizado"
                            type="text"
                            aria-label="Min Garantizado"
                            class="form-control"
                            placeholder="Min Garantizado $"
                            name="inputMinGarantizado"
                            :class="{
                                'is-invalid': errors['item.minGarantizado'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.minGarantizado']"
                        >
                            {{ errors["item.minGarantizado"] | firstElement }}
                        </div>
                        <input
                            v-model="item.noRemunerativo"
                            type="text"
                            aria-label="No Remunerativo"
                            class="form-control"
                            placeholder="No Remunerativo $"
                            name="inputNoRemunerativo"
                            :class="{
                                'is-invalid': errors['item.noRemunerativo'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.noRemunerativo']"
                        >
                            {{ errors["item.noRemunerativo"] | firstElement }}
                        </div>
                        <input
                            v-model="item.plus"
                            type="text"
                            aria-label="Plus"
                            class="form-control"
                            placeholder="Plus $"
                            name="inputPlus"
                            :class="{
                                'is-invalid': errors['item.plus'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.plus']"
                        >
                            {{ errors["item.plus"] | firstElement }}
                        </div>
                        <input
                            v-model="item.dedicacionFuncional"
                            type="text"
                            aria-label="Dedicacion Funcional"
                            class="form-control"
                            placeholder="Dedicacion Funcional $"
                            name="inputDedicicacionFuncional"
                            :class="{
                                'is-invalid':
                                    errors['item.dedicacionFuncional'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.dedicacionFuncional']"
                        >
                            {{
                                errors["item.dedicacionFuncional"]
                                    | firstElement
                            }}
                        </div>
                        <input
                            v-model="item.prolongacionDeJornada"
                            type="text"
                            aria-label="Prolongacion de Jornada"
                            class="form-control"
                            placeholder="Prolongacion de Jornada $"
                            name="inputProlongacionDeJornada"
                            :class="{
                                'is-invalid':
                                    errors['item.prolongacionDeJornada'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.prolongacionDeJornada']"
                        >
                            {{
                                errors["item.prolongacionDeJornada"]
                                    | firstElement
                            }}
                        </div>
                        <input
                            v-model="item.productividad"
                            type="text"
                            aria-label="Productividad"
                            class="form-control"
                            placeholder="Productividad $"
                            name="inputProductividad"
                            :class="{
                                'is-invalid': errors['item.productividad'],
                            }"
                        />
                        <div
                            class="invalid-feedback"
                            v-if="errors['item.productividad']"
                        >
                            {{ errors["item.productividad"] | firstElement }}
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Agregar</button>
            <span> Los campos con (*) son obligatorios</span>
        </form>
    </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
    data: function () {
        return {
            item: {
                nombre: "",
                dni: "",
                cuil: {
                    first: "",
                    middle: "",
                    last: "",
                },
                nac: "",
                estadoCivil: "",
                sexo: "",
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
            hasServerError: false,
            
        };
    },
    mounted() {
        var fechaActual = new Date();
        var formattedFechaActual = fechaActual.toISOString().split("T")[0];
        document.getElementById("fechaEgreso").value = formattedFechaActual;
    },
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
        // reset() {
        //     this.item = {
        //         nombre: "",
        //         dni: "",
        //         cuil: {
        //             first: "",
        //             middle: "",
        //             last: "",
        //         },
        //         nac: "",
        //         estadoCivil: "",
        //         sexo: "",
        //         direccion: "",
        //         telefono: "",
        //         fechaIngreso: "",
        //         fechaEgreso: "",
        //         cargo: "",
        //         situacion: "",
        //         estado: "",
        //         basico: "",
        //         antiguedad: "",
        //         titulo: "",
        //         presentismo: "",
        //         adicional: "",
        //         resolucion: "",
        //         minGarantizado: "",
        //         noRemunerativo: "",
        //         plus: "",
        //         dedicacionFuncional: "",
        //         prolongacionDeJornada: "",
        //         productividad: "",
        //     };
        // },
    },
    computed: {
        errors() {
            return this.$store.state.errors;
        },
    },
    filters: {
        firstElement: function (array) {
            if (!array.length) return "";
            return array[0];
        },
    },
};
</script>
