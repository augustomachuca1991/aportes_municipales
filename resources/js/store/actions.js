import Items from '../Items';

export const addItem = ({ commit }, item) => {
    Items.store(item)
        .then((response) => {
            commit('SET_ITEM' , response.data)
        })
        .catch((err) => {
            commit('SET_ERRORS' , err.response.data.errors)
        });
};

export const deleteItem = ({commit}, index) => {
    commit('SET_ITEM_DELETE' , index)
}

export const editItem = ({commit}, index) => {
    commit('SET_ITEM_EDIT' , index)
}

export const removeErrors = ({ commit }) => {
    commit('SET_ERRORS' , [])
};
