<template>
    
    <add-product-form @products-changed="fetchProducts()" v-if="isAuth" />

    <q-separator spaced inset/>
    
    <div class="q-gutter-md row justify-center">

        <product-card @product-deleted="deleteProduct($event)" :products="products"/>

    </div>
    
</template>

<script>
import { reactive } from 'vue';
import ProductCard from './ProductCard.vue';
import AddProductForm from "./AddProductForm.vue";
import {axiosClient} from "../axios.js";

export default {
    components: {ProductCard, AddProductForm},

    setup() {

        // reactice array that holds the products after being fetched successfuly
        const products = reactive([]);

        // check the local storage to know if the user is logged in or not
        const isAuth = localStorage.getItem("login_token") !== null;


        // creating the function to call 'get-products' end point to get list of products
        const fetchProducts = function() {
            axiosClient.get("get-products")
            .then((result) => {
                Object.assign(products, result.data.data);
            })
            .catch((error) => {
                console.log(error);
            })
        }

        // delete a product from the view (not really from the database)
        const deleteProduct = function(productId) {
            console.log(products, productId)

            products.forEach((element) => {
                
                if(element.id == productId) {
                    let index = products.indexOf(element);
                    products.splice(index, 1);
                }
                
            });
            
        }

        // fetch the products on startup
        fetchProducts();

        return {
            products,
            isAuth,
            fetchProducts,
            deleteProduct
        }
    }
}
</script>