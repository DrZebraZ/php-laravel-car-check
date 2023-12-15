import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './layouts/App.vue';
import UserEdit from './components/UserEdit.vue';
import Users from './components/Users.vue';
import UserCreate from './components/UserCreate.vue'
import UserCars from './components/UserCars.vue'
import CreateCar from './components/CarCreate.vue'
const routes = [
    {
        path: '/',
        name: 'vue.home',
        component: Users,
    },
    {
        path: '/vue/user/edit/:id',
        name: 'vue.edit_user',
        component: UserEdit
    },
    {
        path: '/vue/user/create',
        name: 'vue.create_user',
        component: UserCreate
    },
    {
        path: '/vue/user/:id/cars',
        name: 'vue.user_cars',
        component: UserCars
    },
    {
        path: '/vue/car/create/:user_id',
        name: 'vue.create_car',
        component: CreateCar
    }
];
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});


createApp(App).use(router).mount('#app');
