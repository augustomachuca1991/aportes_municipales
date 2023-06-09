import axios from "axios";
const conection = axios.create({
    baseURL: "http://aportes.test/api/",
});

export default conection;
