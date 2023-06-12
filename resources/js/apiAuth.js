import axios from "axios";
const conection = axios.create({
    
    baseURL: process.env.APP_URL,
});

export default conection;
