<template>
  <div
    class="modal fade"
    id="liquidacionDetalle"
    tabindex="-1"
    role="dialog"
    aria-labelledby="liquidacionDetalleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="liquidacionDetalleModalLabel">
            <!-- Periodo - Marzo de 2020 -->
            {{liquidacion.declaracionjurada.periodo.periodo}}
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
            @click="empty()"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <p class="text-center">LIQUIDACIÓN</p>
            </div>
          </div>
          <div class="row bg-light">
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Jurisdiccion</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>{{liquidacion.declaracionjurada.organismo.jurisdiccion.jurisdiccion}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Organismo</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small class="text-lowercase">{{liquidacion.declaracionjurada.organismo.organismo}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Cargo</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>{{liquidacion.clases[0].pivot.cargo}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Mes</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>{{liquidacion.declaracionjurada.periodo.mes}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Año </small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>{{liquidacion.declaracionjurada.periodo.anio}}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="row my-3 bg-light">
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Nombre</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small class="text-capitalize">{{liquidacion.agentes[0].nombre}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Cuil</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>{{liquidacion.agentes[0].cuil}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Puesto Laboral</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>#PL - {{liquidacion.agentes[0].pivot.codigo}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Antigüedad</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>{{liquidacion.agentes[0].pivot.fecha_ingreso | formData}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Estado</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small>{{liquidacion.clases[0].pivot.estado_id}}</small>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="row">
                <div class="col">
                  <small>Función</small>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <small> - </small>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive shadow p-3 mb-5 bg-white rounded">
            <table class="table table-sm table-borderless table-fixed">
              <caption class="justify-content-end">
                Total Neto 
                ${{ parseInt(liquidacion.remunerativo) + parseInt(liquidacion.bonificable) + parseInt(liquidacion.no_bonificable) + parseInt(liquidacion.no_remunerativo) + parseInt(liquidacion.adicionales) - parseInt(liquidacion.descuento)}}
                
              </caption>
              <thead class="bg-light">
                <tr>
                  <th scope="col" class="text-center">
                    <small>Cod</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>Concepto</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>Unidad</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>Remunerativo</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>Remunerativo Bonificable</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>Remunerativo No Bonificable</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>No-Remunerativo</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>Adicional-Familiar</small>
                  </th>
                  <th scope="col" class="text-center">
                    <small>Descuento</small>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="concepto in liquidacion.conceptos" :key="concepto.id">
                  <th scope="row">
                    <p class="text-center"><small>{{concepto.codigo}}</small></p>
                  </th>
                  <td >
                    <p class="text-center"><small>{{concepto.concepto | capitalize}}</small></p>
                  </td>
                  <td>
                    <p class="text-center"><small>{{concepto.unidad}}</small></p>
                  </td>
                  <td>
                    <p class="text-center"><small v-if="concepto.subtipocodigo.tipocodigo.codigo == 1">{{concepto.pivot.importe}}</small><small v-else>-</small></p>
                  </td>
                  <td>
                    <p class="text-center"><small v-if="concepto.subtipocodigo.tipocodigo.codigo == 2">{{concepto.pivot.importe}}</small><small v-else>-</small></p>
                  </td>
                  <td>
                    <p class="text-center"><small v-if="concepto.subtipocodigo.tipocodigo.codigo == 3">{{concepto.pivot.importe}}</small><small v-else>-</small></p>
                  </td>
                  <td>
                    <p class="text-center"><small v-if="concepto.subtipocodigo.tipocodigo.codigo == 4">{{concepto.pivot.importe}}</small><small v-else>-</small></p>
                  </td>
                  <td>
                    <p class="text-center"><small v-if="concepto.subtipocodigo.tipocodigo.codigo == 5">{{concepto.pivot.importe}}</small><small v-else>-</small></p>
                  </td>
                  <td>
                    <p class="text-center"><small v-if="concepto.subtipocodigo.tipocodigo.codigo == 6">{{concepto.pivot.importe}}</small>
                    <small v-else>-</small></p>
                  </td>
                </tr>
              </tbody>
              <tfoot class="bg-light text-sm">
                <th scope="row" colspan="3">Subtotal</th>
                <td><p class="text-center">{{liquidacion.remunerativo}}</p></td>
                <td><p class="text-center">{{liquidacion.bonificable}}</p></td>
                <td><p class="text-center">{{liquidacion.no_bonificable}}</p></td>
                <td><p class="text-center">{{liquidacion.no_remunerativo}}</p></td>
                <td><p class="text-center">{{liquidacion.adicionales}}</p></td>
                <td><p class="text-center">{{liquidacion.descuento}}</p></td>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["liquidacion"],
  data: function () {
    return {
      liq: {},
    };
  },
  methods: {
    empty() {
      console.log("cerrar");
    },
  },
};
</script>
