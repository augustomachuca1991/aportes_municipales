<template>
    <div>
        <label :class="{ 'form-checl-label': isRadio }" :for="name"
            >{{ label }}
        </label>
        <select
            v-if="type === 'select'"
            :name="name"
            :class="mergedClasses"
            :value="value"
            @change="$emit('input', $event.target.value)"
        >
            <option
                v-for="option in options"
                :value="option.value"
                :key="option.value"
            >
                {{ option.label }}
            </option>
        </select>
        <input
            v-else
            :type="type"
            :id="name"
            :name="name"
            :class="mergedClasses"
            :value="value"
            :checked="isChecked"
            @input="updateValue($event.target.value)"
            :placeholder="isPlaceholder"
            :min="isMin"
        />
        <div class="invalid-feedback" v-if="hasError">
            {{ error | firstElement }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
        },
        type: {
            type: String,
            default: "text",
        },
        name: {
            type: String,
            required: true,
        },
        classes: {
            type: [String, Array, Object],
            default: () => "",
        },
        errors: {
            type: Object,
            default: () => ({}),
        },
        value: {
            type: [String, Number],
            required: true,
        },
        placeholder: {
            type: String,
        },
        min: {
            type: String,
        },
        options: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            //value: "",
        };
    },
    methods: {
        updateValue(newValue) {
            this.$emit("input", newValue);
        },
    },
    computed: {
        mergedClasses() {
            return [
                //"form-control", // Bootstrap class for form control styling
                { "is-invalid": this.hasError },
                this.classes, // Additional classes passed from the parent component
            ];
        },
        hasError() {
            return !!this.errors[this.name];
        },
        error() {
            return this.errors[this.name];
        },
        isChecked() {
            return this.type === "radio" && this.value === this.name;
        },
        isRadio() {
            return this.type === "radio";
        },
        isPlaceholder() {
            return this.placeholder;
        },
        isMin() {
            return this.type === "number" && this.min;
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
.invalid-feedback {
    color: red;
}
</style>
