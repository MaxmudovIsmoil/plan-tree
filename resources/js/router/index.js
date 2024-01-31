import {createRouter, createWebHistory} from 'vue-router';
import LoginViewVue from '@/views/auth/LoginView.vue';
import cookie from "js-cookie";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL), routes: [{
        path: '/login', name: 'login', component: LoginViewVue,
    }, {
        path: '/', name: 'home', component: () => import('@/views/HomeView.vue'),
    }, {
        path: '/cable-detail', name: 'cableDetail', component: () => import('@/views/CableDetailView.vue'),
    },],
});

export default router;
