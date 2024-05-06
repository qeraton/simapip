// axios.js

import axios from 'axios';
import { useApiStore } from './vue/stores/useApiStore';

const domain = window.location.hostname
const protocol = window.location.protocol
const port = (window.location.port) ? ':' + window.location.port : ''

const api = axios.create({
    baseURL: protocol + '//' + domain + port,
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
});

// Define request interceptors (e.g., for authentication)
api.interceptors.request.use(
    (config) => {
        // Modify request config here if needed (e.g., add headers)
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// Define response interceptors (e.g., error handling)
api.interceptors.response.use(
    (response) => {
        // Handle successful responses here
        return response;
    },
    (error) => {

        const apiStore = useApiStore()

        if (error.response.status === 401) {
            window.location = '/#/login'
        } else if (error.response.status === 422) {
            console.log(error.response.data)
            apiStore.errors = null;
            apiStore.errors = error.response.data.errors;
        } else {
            // apiStore.dialogTitle = error
            // apiStore.dialogMessage = error.response
            // apiStore.dialog = true
        }

        // Handle errors here (e.g., show a notification or redirect to a login page)
        return Promise.reject(error);
    }
);

export default api;
