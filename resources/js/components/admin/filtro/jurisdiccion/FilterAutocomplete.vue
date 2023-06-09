<template>
    <div class="">
        <input
            type="text"
            class="form-control"
            placeholder="Search"
            v-model="search"
            @keyup="autocomplete"
        />

        <ul class="list-group list-group-flush headline">
            <a
                href="#"
                class="list-group-item list-group-item-action list-group-item-info"
                v-for="data in search_data"
                :key="data.id"
                @click="loadInput(data)"
            >
                <p>
                    #{{ data.codigo }} -
                    {{ data.jurisdiccion }}
                </p>
            </a>
        </ul>
    </div>
</template>
<script>
export default {
    data: function () {
        return {
            search_data: [],
            search: "",
            index: "",
            setTimeoutBuscador: "",
            timeOut: 300,
        };
    },
    methods: {
        autocomplete() {
            this.search_data = [];

            clearTimeout(this.setTimeoutBuscador);
            this.setTimeoutBuscador = setTimeout(() => {
                if (this.search) {
                    axios
                        .post("http://aportes.test/api/jurisdicciones/search", {
                            search: this.search,
                        })
                        .then((response) => {
                                this.search_data = response.data;
                        });
                }
            }, this.timeOut);
        },
        loadInput(data) {
            this.jurisdicciones = [];
            this.search_data = [];
            this.$emit('jurisdiccion' , data.id);
        },
        empty() {
            this.search = ""
            this.$emit('jurisdiccion' , "");
        }
    },
};
</script>
<style>
.headline {
    z-index: 10;
    position: absolute;
}
</style>
