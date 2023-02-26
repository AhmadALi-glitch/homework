<template>
    
    <add-product-form />

    <q-separator spaced inset/>
    
    <div class="q-gutter-md row justify-center">

        <product-card :products="products"/>

    </div>
    
</template>

<script lang="ts">
import { reactive } from 'vue';
import ProductCard from './ProductCard.vue';
import AddProductForm from "./AddProductForm.vue";
import {axiosClient} from "../axios.js";

export default {
    components: {ProductCard, AddProductForm},

    setup() {

        const products = reactive([]);

        axiosClient.get("get-products")
        .then((result) => {
            console.log(result.data.data);
            Object.assign(products, result.data.data);
        })
        .catch((error) => {
            console.log(error);
        })

        return {
            products
        }
    }
}
</script>