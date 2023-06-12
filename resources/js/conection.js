// import axios from "axios";
// const conection = axios.create({
//     baseURL: "http://aportes.test/",
// });

// export default conection;


import Api from './apiAuth'

export default { 
    download(data, headers){
        return Api.post('home/export/',  data, headers)
    }
}
