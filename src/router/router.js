import * as VueRouter from "vue-router";

import ProductsPage from "../components/ProductsPage.vue";
import RegisterPage from "../components/RegisterPage.vue";
import UserPage from "../components/UserPage.vue";
import EditProductPage from "../components/EditProductPage.vue";

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
    },

    {
        path: "/edit-product-page/:productId",
        component: EditProductPage
    }

];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes
})

export { router };