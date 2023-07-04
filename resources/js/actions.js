import Items from "../Items";
import Estados from "../Estados"
import Periodos from "../Periodos"

export const addItem = ({ commit }, item) => {
    let formData = new FormData();
    formData.append("nombre", item.nombre);
    formData.append("dni", item.dni);
    formData.append("cuil", item.cuil);
    formData.append("nac", item.nac);
    formData.append("estadoCivil", item.estadoCivil);
    formData.append("sexo", item.sexo);
    formData.append("direccion", item.direccion);
    formData.append("telefono", item.telefono);
    formData.append("fechaIngreso", item.fechaIngreso);
    formData.append("fechaEgreso", item.fechaEgreso);
    formData.append("cargo", item.cargo);
    formData.append("situacion", item.situacion);
    formData.append("estado", item.estado);
    formData.append("basico", item.basico);
    formData.append("antiguedad", item.antiguedad);
    formData.append("titulo", item.titulo);
    formData.append("presentismo", item.presentismo);
    formData.append("adicional", item.adicional);
    formData.append("resolucion", item.resolucion);
    formData.append("minGarantizado", item.minGarantizado);
    formData.append("noRemunerativo", item.noRemunerativo);
    formData.append("plus", item.plus);
    formData.append("dedicacionFuncional", item.dedicacionFuncional);
    formData.append("prolongacionDeJornada", item.prolongacionDeJornada);
    formData.append("productividad", item.productividad);
    
    //console.log('formData' , formData)
    Items.store(formData)
        .then((response) => {
            commit("SET_ITEM", response.data);
        })
        .catch((err) => {
            commit("SET_ERRORS", err.response.data.errors);
        });
};

export const deleteItem = ({ commit }, index) => {
    commit("SET_ITEM_DELETE", index);
};

export const editItem = ({ commit }, index) => {
    commit("SET_ITEM_EDIT", index);
};

export const removeErrors = ({ commit }) => {
    commit("SET_ERRORS", {});
};


export const getEstados = ({ commit }) => {
    Estados.all().then( response => {
        commit("SET_ESTADOS", response.data);
    })
};


export const getPeriodos = ({ commit }) => {
    Periodos.all().then( response => {
        commit("SET_PERIODOS", response.data);
    })
};
