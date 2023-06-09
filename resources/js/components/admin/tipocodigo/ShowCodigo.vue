<template>
    <div>
        <div
            class="modal fade"
            id="verModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="verModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verModalLabel">
                            {{ tipoCodigo.codigo }} -
                            {{ tipoCodigo.descripcion }}
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
                        {{ tipoCodigo }}
                    </div>
                    <div class="modal-footer">
                        <div v-if="tipoCodigo.updated_at">
                            <p class="text-left text-muted">
                                Modificado: {{ tipoCodigo.updated_at | moment }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["tipoCodigo"],
    data: function () {
        return {
            tipo: {},
        };
    },
    mounted() {
        //console.log("agente filter component mounted");
    },
    methods: {},
};
</script>
