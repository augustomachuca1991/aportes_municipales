import Api from './apiAuth'

export default { 
    all(){
        return Api.get('api/estados')
    }
}