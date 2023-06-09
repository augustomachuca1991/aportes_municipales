<template>
    <div>
        <div
            id="modalDetail"
            class="modal fade bd-example-modal-lg"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myLargeModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            declaracion jurada {{ declaracionjurada.id }}
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul
                            v-for="(
                                line, index
                            ) in declaracionjurada.declaracionesjuradaslines"
                            :key="line.id"
                        >
                            {{
                                index + 1
                            }}º_
                            {{
                                line
                            }}
                            <!-- <p class="text-center pb-0">Fila {{index + 1}}</p>
            <li>{{line.nombre}}</li>
            <li>{{line.cuil}}</li>
            <li>{{line.fecha_nac}}</li>
            <li>{{line.sexo}}</li>
            <li>{{line.cod_estado_civil}}</li>
            <li>{{line.puesto_laboral}}</li>
            <li>{{line.cargo}}</li>
            <li>{{line.fecha_ingreso}}</li>
            <li>{{line.fecha_egreso}}</li>
            <li>{{line.nl_desde_nro}}</li>
            <li>{{line.nl_hasta_nro}}</li>
            <li>{{line.nl_desde_anio}}</li>
            <li>{{line.nl_hasta_anio}}</li>
            <li>{{line.nl_desde_otro}}</li>
            <li>{{line.nl_hasta_otro}}</li>
            <li>{{line.cod_categoria}}</li>
            <li>{{line.categoria}}</li>
            <li>{{line.cod_clase}}</li>
            <li>{{line.clase}}</li>
            <li>{{line.cod_estado}}</li>
            <li>{{line.cod_organismo}}</li>
            <li>{{line.cuit_organismo}}</li>
            <li>{{line.detalle}}</li> -->
                        </ul>
                    </div>
                    <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
                </div>
            </div>
        </div>

        <!-- <infinite-loading @infinite="getLines()"></infinite-loading> -->
    </div>
</template>

<script>
export default {
    props: ["declaracionjurada"],
    data: function () {
        return {
            page: 1,
        };
    },
    methods: {
        getLines() {
            axios
                .get(
                    `http://aportes.test/api/declaraciones-juradas/${this.declaracionjurada.id}?page=${this.page}`
                )
                .then((response) => {
                    if (response.data.data.length) {
                        this.page += 1;
                        this.lines.push(...response.data.data);
                    }
                });
        },
    },
    // computed: {
    //     removeBrackets() {
    //         return this.declaracionjurada.declaracionesjuradaslines.replace(/[{}]/g, "");
    //     },
    // },
    // filters: {
    //     removeBrackets: function (value) {
    //         if (!value) return "";
    //         value = value.toString();
    //         return value.charAt(0).toUpperCase() + value.slice(1);
    //     },
    // },
};
</script>
