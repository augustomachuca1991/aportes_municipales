<template>
    <div class="container mt-5">
        <form-create></form-create>

        <div class="table-responsive py-5">
            <h2 class="text-center">Lista de Registros</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="sr-only">ACCIONES</th>
                        <th>NOMBRE</th>
                        <th>DNI</th>
                        <th>CUIL</th>
                        <th>FECHA NAC</th>
                        <th>ESTADO CIVIL</th>
                        <th>SEXO</th>
                        <th>DOMICILIO</th>
                        <th>TELEFONO</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-if="items.length === 0">
                        <tr>
                            <td colspan="9">NO DATA</td>
                        </tr>
                    </template>
                    <template v-for="(item, i) in items">
                        <tr
                            data-bs-toggle="collapse"
                            :data-bs-target="`#collapse${i}`"
                            aria-expanded="false"
                            :aria-controls="`collapse${i}`"
                        >
                            <td>
                                <button
                                    :id="`btn-collapse${i}`"
                                    class="btn btn-outline-success"
                                    @click="toggleCollapse(i)"
                                >
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                            <td>{{ item.nombre }}</td>
                            <td>{{ item.dni }}</td>
                            <td>{{ item.cuil }}</td>
                            <td>{{ item.nac | formatDate }}</td>
                            <td>{{ item.estadoCivil }}</td>
                            <td>{{ item.sexo }}</td>
                            <td>{{ item.direccion }}</td>
                            <td>{{ item.telefono }}</td>
                        </tr>
                        <tr :key="i" :id="`collapse${i}`" class="collapse">
                            <td colspan="12">
                                <div class="card card-body">
                                    <h5 class="card-title text-center">
                                        Información de Empleado
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p>
                                                <strong
                                                    >Fecha de Ingreso:</strong
                                                >
                                                {{ item.fechaIngreso }}
                                            </p>
                                            <p>
                                                <strong
                                                    >Fecha de Egreso:</strong
                                                >
                                                {{
                                                    item.fechaEgreso
                                                        ? item.fechaEgreso
                                                        : "Continua"
                                                }}
                                            </p>
                                            <p>
                                                <strong>Cargo:</strong>
                                                {{ item.cargo }}
                                            </p>
                                            <p>
                                                <strong
                                                    >Situación de
                                                    Revista:</strong
                                                >
                                                {{ item.situacion }}
                                            </p>
                                            <p>
                                                <strong>Estado:</strong>
                                                {{ item.estado }}
                                            </p>
                                            <p>
                                                <strong
                                                    >Años Antiguedad:</strong
                                                >
                                                {{ lengthOfService.anio }} Años
                                                y
                                                {{ lengthOfService.meses }}
                                                Meses
                                            </p>
                                            <p>
                                                <button
                                                    class="btn btn-yellow"
                                                    @click="editItem(i, item)"
                                                    type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#itemModal"
                                                >
                                                    Edit
                                                </button>
                                                <button
                                                    class="btn btn-red"
                                                    @click="deleteItem(i, item)"
                                                >
                                                    Delete
                                                </button>
                                            </p>
                                        </div>
                                        <div class="col">
                                            <!-- <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            Básico
                                                        </th>
                                                        <th scope="col">
                                                            Antiguedad
                                                        </th>
                                                        <th scope="col">
                                                            Título
                                                        </th>
                                                        <th scope="col">
                                                            Presentismo
                                                        </th>
                                                        <th scope="col">
                                                            Adicional
                                                        </th>
                                                        <th scope="col">
                                                            Resolucion
                                                        </th>
                                                        <th scope="col">
                                                            Min Garantizado
                                                        </th>
                                                        <th scope="col">
                                                            No Remunerativo
                                                        </th>
                                                        <th scope="col">
                                                            Plus
                                                        </th>
                                                        <th scope="col">
                                                            Dedicación Funcional
                                                        </th>
                                                        <th scope="col">
                                                            Prolongación De
                                                            Jornada
                                                        </th>
                                                        <th scope="col">
                                                            productividad
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            {{ item.basico }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                item.antiguedad
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{ item.titulo }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                item.presentismo
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{ item.adicional }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                item.resolucion
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                item.minGarantizado
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                item.noRemunerativo
                                                            }}
                                                        </td>
                                                        <td>{{ item.plus }}</td>
                                                        <td>
                                                            {{
                                                                item.dedicacionFuncional
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                item.prolongacionDeJornada
                                                            }}
                                                        </td>
                                                        <td>
                                                            {{
                                                                item.productividad
                                                            }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <div class="container">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-lg-none">
                                                            <h5
                                                                class="card-title"
                                                            >
                                                                Datos
                                                            </h5>
                                                        </div>
                                                        <div
                                                            class="d-none d-lg-block"
                                                        >
                                                            <table
                                                                class="table"
                                                            >
                                                                <tbody>
                                                                    <tr>
                                                                        <th>
                                                                            Básico
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.basico
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Antigüedad
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.antiguedad
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Título
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.titulo
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Presentismo
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.presentismo
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Adicional
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.adicional
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Resolución
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.resolucion
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Min
                                                                            Garantizado
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.minGarantizado
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            No
                                                                            Remunerativo
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.noRemunerativo
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Plus
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.plus
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Dedicación
                                                                            Funcional
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.dedicacionFuncional
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Prolongación
                                                                            De
                                                                            Jornada
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.prolongacionDeJornada
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>
                                                                            Productividad
                                                                        </th>
                                                                        <td>
                                                                            ${{
                                                                                item.productividad
                                                                            }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            <p v-if="items.length" class="text-muted text-end">
                Total Items {{ itemsTotal }}
                <button class="btn btn-success" @click="exportPdf">
                    Download File <i class="fa fas-download fa-download"></i>
                </button>
            </p>
        </div>

        <form-edit></form-edit>
    </div>
</template>
<script>
import FormCreate from "../guest/formulario/FormCreate.vue";
import FormEdit from "../guest/formulario/FormEdit.vue";

import Conection from "../../conection";
export default {
    data: function () {
        return {
            periodo: '202001',
        };
    },
    components: {
        FormCreate,
        FormEdit,
    },
    methods: {
        getItems() {
            this.$store.dispatch("getItems");
        },
        exportPdf() {
            const params = this.items;
            Conection.download(params, {
                responseType: "arraybuffer",
            })
                .then((response) => {
                    var fileUrl = window.URL.createObjectURL(
                        new Blob([response.data])
                    );
                    var fileLink = document.createElement("a");
                    fileLink.href = fileUrl;
                    fileLink.setAttribute("download", `liq-${this.periodo}.xlsx`);
                    document.body.appendChild(fileLink);
                    fileLink.click();
                })
                .catch((err) => {
                    console.log(err.response.data.errors);
                });
        },
        editItem(index, item) {
            this.$store.dispatch("editItem", index);
        },
        deleteItem(index, item) {
            this.$store.dispatch("deleteItem", index);
        },
        toggleCollapse(index) {
            var collapseItem = document.getElementById(`collapse${index}`);
            var btn = document.querySelector(`#btn-collapse${index}`);

            collapseItem.addEventListener("show.bs.collapse", function () {
                btn.innerHTML = '<i class="fas fa-minus"></i>';
                btn.classList.remove("btn-outline-success");
                btn.classList.add("btn-outline-danger");
            });

            collapseItem.addEventListener("hide.bs.collapse", function () {
                btn.innerHTML = '<i class="fas fa-plus"></i>';
                btn.classList.remove("btn-outline-danger");
                btn.classList.add("btn-outline-success");
            });
        },
    },
    computed: {
        items() {
            return this.$store.state.items;
        },
        lengthOfService() {
            return this.$store.getters.lengthOfService;
        },
        itemsTotal() {
            return this.$store.getters.itemsTotal;
        },
    },
};
</script>
<style scoped>
.table-responsive {
    overflow-x: auto;
}

.table-hover tbody tr:hover {
    cursor: pointer;
    background-color: #f5f5f5;
}

.btn-red {
    background-color: #ef4444;
    color: #ffffff;
    border-color: #ef4444;
    transition: background-color 0.3s, border-color 0.3s;
}

.btn-red:hover {
    background-color: #dc2626;
    border-color: #dc2626;
}

.btn-blue {
    background-color: #3b82f6;
    color: #ffffff;
    border-color: #3b82f6;
    transition: background-color 0.3s, border-color 0.3s;
}

.btn-blue:hover {
    background-color: #2563eb;
    border-color: #2563eb;
}

.btn-yellow {
    background-color: #fcd34d;
    color: #ffffff;
    border-color: #fcd34d;
    transition: background-color 0.3s, border-color 0.3s;
}

.btn-yellow:hover {
    background-color: #fbbf24;
    border-color: #fbbf24;
}

.btn-green {
    background-color: #7faf00;
    color: #ffffff;
    border-color: #7faf00;
    transition: background-color 0.3s, border-color 0.3s;
}

.btn-green:hover {
    background-color: #6d9e00;
    border-color: #6d9e00;
}
</style>
