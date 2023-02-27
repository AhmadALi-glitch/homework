import axios from 'axios';

const axiosClient = axios.create({
    baseURL: "http://127.0.0.1:8000",
    headers: {
        'Accept': 'application/json',
    },
});

axiosClient.defaults.withCredentials = true;

// document.querySelector('meta[name="csrf-token"]').getAttribute('content');


export { axiosClient };