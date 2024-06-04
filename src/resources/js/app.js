

import './bootstrap.js';
import { createApp } from 'vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'vue-loading-overlay/dist/css/index.css';
import "vue-toastification/dist/index.css";
import '../css/app.css';
import Toast,{POSITION} from "vue-toastification";




const app = createApp({});
const options = {
    position: POSITION.BOTTOM_RIGHT
};

app.use(Toast, options);

import DashboardLayout from './components/dashboard/layout/DashboardLayout.vue';
app.component('dashboard-layout', DashboardLayout);

import FoodComponent from './components/dashboard/Food/FoodComponent.vue';
app.component('food-component', FoodComponent);

import LoginComponent from './components/Auth/LoginComponent.vue';
app.component('login-component', LoginComponent);





app.mount('#app');
