<template>
    <div class="card py-4 px-3">
        <h2>Nuevo Registro edit</h2>
        <form @submit.prevent="createItem()">
            <div class="row">
                <div class="col-md-4">
                    <label for="nombre">NOMBRE*</label>
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
                    <label for="cuil">CUIL*</label>
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
                        <input
                            v-model="item.cuil.middle"
                            type="text"
                            class="form-control"
                            :class="{
                                'is-invalid': errors['item.cuil.middle'],
                            }"
                            id="cuil2"
                        />
                        <input
                            v-model="item.cuil.last"
                            type="text"
                            class="form-control"
                            :class="{
                                'is-invalid': errors['item.cuil.last'],
                            }"
                            id="cuil3"
                        />
                    </div>
                    <div
                        class="invalid-feedback"
                        v-if="errors['item.cuil.first']"
                    >
                        {{ errors["item.cuil.first"] | firstElement }}
                    </div>
                    <div
                        class="invalid-feedback"
                        v-if="errors['item.cuil.middle']"
                    >
                        {{ errors["item.cuil.middle"] | firstElement }}
                    </div>
                    <div
                        class="invalid-feedback"
                        v-if="errors['item.cuil.last']"
                    >
                        {{ errors["item.cuil.last"] | firstElement }}
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="fechaIngreso">FECHA INGRESO*</label>
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
                    <label for="fecha-nac">FECHA DE NACIMIENTO*</label>
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
                    <label for="estadoCivil">ESTADO CIVIL*</label>
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
                    <label for="sexo">SEXO*</label>
                    <fieldset
                        class="border rounded px-2 py-1"
                        :class="{
                            'border-error': errors['item.sexo'],
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
                    <div class="invalid-feedback" v-if="errors['item.sexo']">
                        {{ errors["item.sexo"] | firstElement }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="cargo">CARGO*</label>
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
                    <label for="situacion">SITUACIÓN*</label>
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
                    <label for="estado">ESTADO*</label>
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
        </form>
    </div>
    <!-- <nav id="sidebar">
        <form>
            <div class="sidebar-header">
                <h3>Nuevo Registro</h3>
            </div>
            <ul class="list-unstyled components">
                <div class="row g-3 px-3 py-2">
                    <div class="col-12">
                        <label for="inputNombre" class="form-label"
                            >Nombre Completo(*)</label
                        >
                        <input
                            v-model="item.nombre"
                            type="text"
                            class="form-control"
                            id="inputNombre"
                            name="inputNombre"
                            :class="{ 'is-invalid': errors['item.nombre'] }"
                        />
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, index) in errors['item.nombre']"
                                :key="index"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <label for="inputCuil2" class="form-label"
                            >CUIL/CUIT(*)</label
                        >
                        <div class="input-group">
                            <input
                                v-model="item.cuil.first"
                                type="text"
                                aria-label="First name"
                                class="form-control"
                                name="first_cuil"
                                :class="{
                                    'is-invalid': errors['item.cuil.first'],
                                }"
                            />
                            <input
                                v-model="item.cuil.middle"
                                type="text"
                                aria-label="Middle name"
                                class="form-control w-50"
                                name="middle_cuil"
                                :class="{
                                    'is-invalid': errors['item.cuil.middle'],
                                }"
                            />
                            <input
                                v-model="item.cuil.last"
                                type="text"
                                aria-label="Last name"
                                class="form-control"
                                name="last_cuil"
                                :class="{
                                    'is-invalid': errors['item.cuil.last'],
                                }"
                            />
                            <ul>
                                <li
                                    class="text-danger"
                                    v-for="(error, i) in errors[
                                        'item.cuil.first'
                                    ]"
                                    :key="i"
                                >
                                    {{ error }}
                                </li>
                                <li
                                    class="text-danger"
                                    v-for="(error, i) in errors[
                                        'item.cuil.middle'
                                    ]"
                                    :key="i"
                                >
                                    {{ error }}
                                </li>
                                <li
                                    class="text-danger"
                                    v-for="(error, i) in errors[
                                        'item.cuil.last'
                                    ]"
                                    :key="i"
                                >
                                    {{ error }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="inputNac" class="form-label"
                            >Fecha de Nacimiento(*)</label
                        >
                        <input
                            v-model="item.nac"
                            type="date"
                            class="form-control"
                            id="inputNac"
                            name="inputNac"
                            :class="{ 'is-invalid': errors['item.nac'] }"
                        />
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, i) in errors['item.nac']"
                                :key="i"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-12">
                        <label for="inputCivil" class="form-label"
                            >Estado Civil(*)</label
                        >
                        <select
                            v-model="item.estadoCivil"
                            id="inputCivil"
                            class="form-select"
                            name="inputCivil"
                            :class="{
                                'is-invalid': errors['item.estadoCivil'],
                            }"
                        >
                            <option value="" selected>Seleccione...</option>
                            <option value="1">Soltero/a</option>
                            <option value="2">Casado/a</option>
                            <option value="3">Viudo/a</option>
                            <option value="4">Otro</option>
                        </select>
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, i) in errors['item.estadoCivil']"
                                :key="i"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <label for="inputSexo" class="form-label w-100"
                            >Sexo(*)</label
                        >
                        <div class="form-check form-check-inline">
                            <input
                                v-model="item.sexo"
                                class="form-check-input"
                                type="radio"
                                name="radioSexo"
                                id="inputRadioM"
                                value="M"
                                checked
                            />
                            <label class="form-check-label" for="inputRadioM">
                                Hombre
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                v-model="item.sexo"
                                class="form-check-input"
                                type="radio"
                                name="radioSexo"
                                id="inputRadioF"
                                value="F"
                            />
                            <label class="form-check-label" for="inputRadioF">
                                Mujer
                            </label>
                        </div>
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, i) in errors['item.sexo']"
                                :key="i"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-12">
                        <label for="inputDireccion" class="form-label"
                            >Direccion</label
                        >
                        <input
                            v-model="item.direccion"
                            type="text"
                            class="form-control"
                            id="inputDireccion"
                            name="inputDireccion"
                        />
                    </div>
                    <div class="col-12">
                        <label for="inputTelefono" class="form-label"
                            >Telefono</label
                        >
                        <input
                            v-model="item.telefono"
                            type="text"
                            class="form-control"
                            id="inputTelefono"
                            name="inputTelefono"
                        />
                    </div>
                    <div class="col-12">
                        <label for="inputIngreso" class="form-label"
                            >Fecha Ingreso(*)</label
                        >
                        <input
                            v-model="item.fechaIngreso"
                            type="date"
                            class="form-control"
                            id="inputIngreso"
                            name="inputIngreso"
                            :class="{
                                'is-invalid': errors['item.fechaIngreso'],
                            }"
                        />
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, i) in errors[
                                    'item.fechaIngreso'
                                ]"
                                :key="i"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <label for="inputEgreso" class="form-label"
                            >Feche de Egreso<span class="badge badge-primary"
                                >!</span
                            ></label
                        >
                        <input
                            v-model="item.fechaEgreso"
                            type="date"
                            class="form-control"
                            id="inputEgreso"
                            name="inputEgreso"
                        />
                    </div>
                    <div class="col-12">
                        <label for="inoutCargo" class="form-label"
                            >Cargo(*)</label
                        >
                        <input
                            v-model="item.cargo"
                            type="text"
                            class="form-control"
                            id="inputCargo"
                            name="inputCargo"
                            :class="{ 'is-invalid': errors['item.cargo'] }"
                        />
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, i) in errors['item.cargo']"
                                :key="i"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <label for="inputSituacion" class="form-label"
                            >Situacion(*)</label
                        >
                        <select
                            v-model="item.situacion"
                            id="inputSituacion"
                            name="inputSituacion"
                            class="form-select"
                            :class="{ 'is-invalid': errors['item.situacion'] }"
                        >
                            <option value="" selected>Seleccione...</option>
                            <option value="1">Planta Permanente</option>
                            <option value="2">Contratado</option>
                        </select>
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, i) in errors['item.situacion']"
                                :key="i"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <label for="inputEstado" class="form-label"
                            >Estado(*)</label
                        >
                        <select
                            v-model="item.estado"
                            id="inputEstado"
                            name="inputEstado"
                            class="form-select"
                            :class="{ 'is-invalid': errors['item.estado'] }"
                        >
                            <option value="" selected>Seleccione...</option>
                            <option value="0">Activo</option>
                            <option value="1">Baja Temporal</option>
                        </select>
                        <ul>
                            <li
                                class="text-danger"
                                v-for="(error, i) in errors['item.estado']"
                                :key="i"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                    <div class="input-group">
                        <label for="inputConcepto" class="form-label"
                            >Conceptos(*)</label
                        >
                        <input
                            v-model="item.basico"
                            type="text"
                            aria-label="Basico"
                            class="form-control w-100"
                            placeholder="Basico $"
                            name="inputBasico"
                        />
                        <input
                            v-model="item.antiguedad"
                            type="text"
                            aria-label="Antiguedad"
                            class="form-control w-100"
                            placeholder="Antiguedad $"
                            name="inputAntiguedad"
                        />
                        <input
                            v-model="item.titulo"
                            type="text"
                            aria-label="Titulo"
                            class="form-control w-100"
                            placeholder="Titulo $"
                            name="inputTitulo"
                        />
                        <input
                            v-model="item.presentismo"
                            type="text"
                            aria-label="Presentismo"
                            class="form-control w-100"
                            placeholder="Presentismo $"
                            name="inputPresentismo"
                        />
                        <input
                            v-model="item.adicional"
                            type="text"
                            aria-label="Adicional"
                            class="form-control w-100"
                            placeholder="Adicional $"
                            name="inputAdicional"
                        />
                        <input
                            v-model="item.resolucion"
                            type="text"
                            aria-label="Resolucion"
                            class="form-control w-100"
                            placeholder="Resolucion $"
                            name="inputResolucion"
                        />
                        <input
                            v-model="item.minGarantizado"
                            type="text"
                            aria-label="Min Garantizado"
                            class="form-control w-100"
                            placeholder="Min Garantizado $"
                            name="inputMinGarantizado"
                        />
                        <input
                            v-model="item.noRemunerativo"
                            type="text"
                            aria-label="No Remunerativo"
                            class="form-control w-100"
                            placeholder="No Remunerativo $"
                            name="inputNoRemunerativo"
                        />
                        <input
                            v-model="item.plus"
                            type="text"
                            aria-label="Plus"
                            class="form-control w-100"
                            placeholder="Plus $"
                            name="inputPlus"
                        />
                        <input
                            v-model="item.dedicacionFuncional"
                            type="text"
                            aria-label="Dedicacion Funcional"
                            class="form-control w-100"
                            placeholder="Dedicacion Funcional $"
                            name="inputDedicicacionFuncional"
                        />
                        <input
                            v-model="item.prolongacionDeJornada"
                            type="text"
                            aria-label="Prolongacion de Jornada"
                            class="form-control w-100"
                            placeholder="Prolongacion de Jornada $"
                            name="inputProlongacionDeJornada"
                        />
                        <input
                            v-model="item.productividad"
                            type="text"
                            aria-label="Productividad"
                            class="form-control w-100"
                            placeholder="Productividad $"
                            name="inputProductividad"
                        />
                    </div>
                </div>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a @click="createItem" href="#" class="download">Done</a>
                </li>
                <li>
                    <a @click="reset" href="#" class="article">Clear</a>
                </li>
            </ul>
        </form>
    </nav> -->
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
        reset() {
            this.item = {
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
            };
        },
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

<style scoped>
.border-error {
    border: 1px solid red;
    border-radius: 4px;
}

body {
    font-family: "Poppins", sans-serif;
    background: #fafafa;
}

p {
    font-family: "Poppins", sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

/* ---------------------------------------------------
        SIDEBAR STYLE
    ----------------------------------------------------- */

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #7386d5;
    background: #fff;
}

#sidebar ul li.active > a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}

ul li a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386d5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}
</style>
