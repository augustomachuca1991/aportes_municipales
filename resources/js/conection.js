import axios from "axios";
const conection = axios.create({
    baseURL: "http://aportes.test/",
});

export default conection;
