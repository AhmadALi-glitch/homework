import * as VueRouter from "vue-router";

import ProductsPage from "../components/ProductsPage.vue";
import RegisterPage from "../components/RegisterPage.vue";
import UserPage from "../components/UserPage.vue";

const routes = [
    
    {
        path: "/",
        component: ProductsPage,
    },
    
    {
        path: "/register",
        component: RegisterPage
    },

    {
        path: "/user",
        component: UserPage
    }

];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes
})

export { router };