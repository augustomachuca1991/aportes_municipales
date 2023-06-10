import axios from "axios";
const conection = axios.create({
    baseURL: "http://aportes_municipales.test/api/",
});

export default conection;
