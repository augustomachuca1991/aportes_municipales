import Swal from "sweetalert2";
export const SET_ITEM = (state, item) => {
    state.items.push(item);
    Swal.fire({
        //position: "top-center",
        icon: "success",
        title: "Nuevo Registro Agregado",
        showConfirmButton: false,
        timer: 1500,
    });
};

export const SET_ERRORS = (state, errors) => {
    state.errors = errors;
};
