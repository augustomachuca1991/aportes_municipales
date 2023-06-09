import Api from './apiAuth'

export default { 
    store(data){
        return Api.post('items/add',  data)
    }
}