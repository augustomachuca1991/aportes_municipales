<template>
    <!-- <div class="wrapper">
        <form-create ref="form"></form-create>
        <div id="content">
            <div class="container-fluid mb-5">
                <button
                    @click="toggleMenu"
                    type="button"
                    id="sidebarCollapse"
                    class="btn btn-secondary text-white"
                >
                    <i class="fas fa-align-left"></i>
                    <span>Añadir Nuevos Items</span>
                </button>
                <div class="jumbotron">
                    <h1 class="display-4">Gererador de Archivo</h1>
                    <p class="lead">
                        En esta sección podra generar el archivo correspondiente
                        para su posterior importacion en el sistema.
                    </p>
                    <hr class="my-4" />

                    <div v-if="items.length" class="container-fluid">
                        <div
                            class="table-responsive square scrollbar-lady-lips thin"
                        >
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NOMBRE</th>
                                        <th scope="col">DNI</th>
                                        <th scope="col">CUIL</th>
                                        <th scope="col">FECHA NAC</th>
                                        <th scope="col">ESTADO CIVIL</th>
                                        <th scope="col">SEXO</th>
                                        <th scope="col">DIRECCION</th>
                                        <th scope="col">TELEFONO</th>
                                        <th scope="col">FECHA INGRESO</th>
                                        <th scope="col">FECHA EGRESO</th>
                                        <th scope="col">CARGO</th>
                                        <th scope="col">SITUACION</th>
                                        <th scope="col">ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, i) in items" :key="i">
                                        <th scope="row">{{ i + 1 }}</th>
                                        <td>{{ item.nombre }}</td>
                                        <td>{{ item.dni }}</td>
                                        <td>{{ item.cuil }}</td>
                                        <td>{{ item.nac | format_moment }}</td>
                                        <td>{{ item.estadoCivil }}</td>
                                        <td>{{ item.sexo }}</td>
                                        <td>{{ item.direccion }}</td>
                                        <td>{{ item.telefono }}</td>
                                        <td>
                                            {{
                                                item.fechaIngreso
                                                    | format_moment
                                            }}
                                        </td>
                                        <td>
                                            {{
                                                item.fechaEgreso | format_moment
                                            }}
                                        </td>
                                        <td>{{ item.cargo }}</td>
                                        <td>{{ item.situacion }}</td>
                                        <td>{{ item.estado }}</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    Basico -
                                                    {{
                                                        item.basico
                                                            ? "$" + item.basico
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    antiguedad -
                                                    {{
                                                        item.antiguedad
                                                            ? "$" +
                                                              item.antiguedad
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    titulo -
                                                    {{
                                                        item.titulo
                                                            ? "$" + item.titulo
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    presentismo -
                                                    {{
                                                        item.presentismo
                                                            ? "$" +
                                                              item.presentismo
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    adicional -
                                                    {{
                                                        item.adicional
                                                            ? "$" +
                                                              item.adicional
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    resolucion -
                                                    {{
                                                        item.resolucion
                                                            ? "$" +
                                                              item.resolucion
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    minimo garantizado -
                                                    {{
                                                        item.minGarantizado
                                                            ? "$" +
                                                              item.minGarantizado
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    no remunerativo -
                                                    {{
                                                        item.noRemunerativo
                                                            ? "$" +
                                                              item.noRemunerativo
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    plus -
                                                    {{
                                                        item.plus
                                                            ? "$" + item.plus
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    decicacion funcion -
                                                    {{
                                                        item.dedicacionFuncional
                                                            ? "$" +
                                                              item.dedicacionFuncional
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    prolongacion de jornada -
                                                    {{
                                                        item.prolongacionDeJornada
                                                            ? "$" +
                                                              item.prolongacionDeJornada
                                                            : "-"
                                                    }}
                                                </li>
                                                <li>
                                                    productividad -
                                                    {{
                                                        item.productividad
                                                            ? "$" +
                                                              item.productividad
                                                            : "-"
                                                    }}
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example" class="my-2">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a
                                        class="btn btn-warning"
                                        href="#"
                                        @click="exportPdf"
                                    >
                                        <i class="fas fa-file"></i>
                                        <span>Generar Archivo</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <p v-else>
                        Debere Añadir nuevos registros y luego generar Archivo
                    </p>
                </div>
            </div>
        </div>

        
    </div> -->
    <div class="container mt-5">
    <form-create></form-create>

    <div class="table-responsive py-5">
        <h2 class="text-center">Lista de Registros</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>DNI</th>
                    <th>CUIL</th>
                    <th>FECHA NAC</th>
                    <th>ESTADO CIVIL</th>
                    <th>SEXO</th>
                    <th>DOMICILIO</th>
                    <th>TELEFONO</th>
                    <th class="sr-only">ACCIONES</th>
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
                        <td>{{ item.nombre }}</td>
                        <td>{{ item.dni }}</td>
                        <td>
                            {{ item.cuil.first }}-{{ item.cuil.middle }}-{{
                            item.cuil.last
                            }}
                        </td>
                        <td>{{ item.nac | formatDate }}</td>
                        <td>{{ item.estadoCivil }}</td>
                        <td>{{ item.sexo }}</td>
                        <td>{{ item.direccion }}</td>
                        <td>{{ item.telefono }}</td>
                        <td>
                            <button class="btn btn-outline-success">
                                <i class="fas fa-plus"></i>
                            </button>
                        </td>
                    </tr>
                    <tr :key="i" :id="`collapse${i}`" class="collapse">
                        <td colspan="12">
                            <div class="card card-body">
                                <h5 class="card-title">
                                    Información de Empleado
                                </h5>
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>
                                            <strong>Fecha de Ingreso:</strong>
                                            {{
                                            item.fechaIngreso
                                            }}
                                        </p>
                                        <p>
                                            <strong>Fecha de Egreso:</strong>
                                            {{
                                            item.fechaEgreso
                                             ? item.fechaEgreso : 'Continua'
                                            }}
                                        </p>
                                        <p>
                                            <strong>Cargo:</strong>
                                            {{ item.cargo }}
                                        </p>
                                        <p>
                                            <strong>Situación de Revista:</strong>
                                            {{ item.situacion }}
                                        </p>
                                        <p>
                                            <strong>Estado:</strong>
                                            {{ item.estado }}
                                        </p>
                                        <p>
                                            <strong>Años Antiguedad:</strong>
                                            {{lengthOfService.anio }} Años y {{ lengthOfService.meses }} Meses
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Básico</th>
                                                    <th scope="col">Antiguedad</th>
                                                    <th scope="col">Título</th>
                                                    <th scope="col">Presentismo</th>
                                                    <th scope="col">Adicional</th>
                                                    <th scope="col">Resolucion</th>
                                                    <th scope="col">Min Garantizado</th>
                                                    <th scope="col">No Remunerativo</th>
                                                    <th scope="col">Plus</th>
                                                    <th scope="col">Dedicación Funcional</th>
                                                    <th scope="col">Prolongación De Jornada</th>
                                                    <th scope="col">productividad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{item.basico}}</td>
                                                    <td>{{item.antiguedad}}</td>
                                                    <td>{{item.titulo}}</td>
                                                    <td>{{item.presentismo}}</td>
                                                    <td>{{item.adicional}}</td>
                                                    <td>{{item.resolucion}}</td>
                                                    <td>{{item.minGarantizado}}</td>
                                                    <td>{{item.noRemunerativo}}</td>
                                                    <td>{{item.plus}}</td>
                                                    <td>{{item.dedicacionFuncional}}</td>
                                                    <td>{{item.prolongacionDeJornada}}</td>
                                                    <td>{{item.productividad}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>

</template>
<script>
import FormCreate from "../guest/formulario/FormCreate.vue";
import Conection from "../../conection";
export default {
    components: {
        FormCreate,
    },
    methods: {
        getItems() {
            this.$store.dispatch("getItems");
        },
        exportPdf() {
            const params = this.items;
            Conection.post("home/export/", params, {
                responseType: "arraybuffer",
            })
                .then((response) => {
                    var fileUrl = window.URL.createObjectURL(
                        new Blob([response.data])
                    );
                    var fileLink = document.createElement("a");
                    fileLink.href = fileUrl;
                    fileLink.setAttribute("download", "users.xlsx");
                    document.body.appendChild(fileLink);
                    fileLink.click();
                })
                .catch((err) => {
                    console.log(err.response.data.errors);
                });
        },
    },
    computed: {
        items() {
            return this.$store.state.items;
        },
        lengthOfService(){
            return this.$store.getters.lengthOfService
        }
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
</style>
