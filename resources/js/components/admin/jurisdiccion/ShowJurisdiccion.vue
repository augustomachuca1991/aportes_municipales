<template>
  <div
    class="modal fade"
    id="infoModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="infoModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalLabel">
            #{{ jurisdiccion.codigo }} -
            {{ jurisdiccion.jurisdiccion }}
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
          <div class="row mb-2">
            <div class="col-2 font-weight-bold">COD.</div>
            <div class="col-6 font-weight-bold">JURISDICCION</div>
            <div class="col-4 font-weight-bold">ORGANISMOS</div>
          </div>
          <div class="row">
            <div class="col-2">{{ jurisdiccion.codigo }}</div>
            <div class="col-6">{{ jurisdiccion.jurisdiccion }}</div>
            <div class="col-4">
              <ul>
                <div
                  class="row"
                  v-for="organismo in jurisdiccion.organismos"
                  :key="organismo.id"
                >
                  <div class="col">
                    <li>{{ organismo.organismo }}</li>
                  </div>
                </div>
              </ul>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          Pertenece a
          <span
            :class="{
              'badge bg-olive': jurisdiccion.origen.id === 1,
              'badge badge-warning': jurisdiccion.origen.id === 2,
              'badge badge-danger': jurisdiccion.origen.id === 3,
            }"
            >{{ jurisdiccion.origen.origen }}</span
          >
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["jurisdiccion"],
  data: function () {
    return {
      data: [],
    };
  },
  mounted() {},
  methods: {},
};
</script>
