require('./bootstrap');

import {createApp} from "vue";
import {createWebHistory, createRouter} from "vue-router";
import {routes} from './router';
import main from "./Pages/Main";

import VuePagination from "laravel-vue-pagination";
import VueToast from 'vue-toast-notification';
import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';
import 'vue-toast-notification/dist/theme-sugar.css';

const router = createRouter({
    history: createWebHistory(),
    routes,
})

import BreadcrumbComponent from './Components/Includes/BreadcrumbComponent';

const app = createApp(main);

app.component('BreadcrumbComponent', BreadcrumbComponent)
    .use(router)
    .use(VuePagination)
    .use(VueToast)
    .use(VueSweetalert2)
    .mount("#app");
