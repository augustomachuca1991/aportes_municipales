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

export const SET_ITEM_DELETE = (state, index) => {
    state.items.splice(index,1);
    Swal.fire({
        icon: "success",
        title: "Se Elimino el registro",
        showConfirmButton: false,
        timer: 1500,
    });
}


export const SET_ITEM_EDIT= (state, index) => {
    state.item = state.items[index];
}


export const SET_ERRORS = (state, errors) => {
    state.errors = errors;
};
