import axios from "axios";

export default axios.create({
    baseURL: "http://induca.com.br/here/public/api/users",
    headers: {
        "Content-type": "application/json"
    }
});