import Api from './apiAuth'

export default { 
    store(data){
        return Api.post('api/items/create',  data)
    }
}