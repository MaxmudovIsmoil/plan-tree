// import 'bootstrap/dist/css/bootstrap.min.css';
// import 'vue-toastification/dist/index.css';


import {createApp} from 'vue';
import {createPinia} from 'pinia';

import Toast from 'vue-toastification';

import App from './App.vue';
import router from './router';
import 'bootstrap';

const app = createApp(App);
const options = {
    draggable: false,
    transition: 'Vue-Toastification__bounce',
    position: 'top-right',
    timeout: 3000,
    closeOnClick: true,
    pauseOnFocusLoss: true,
    pauseOnHover: true,
    hideProgressBar: true,
    closeButton: 'button',
};

app.use(createPinia());
app.use(router);
app.use(Toast, options);

app.mount('#app');
