<template>
    <q-card 
        flat 
        bordered 
        class="col-5 q-pa-md text-dark" 
        v-for="product in products" :key="product.id">

            <q-card-section>

                
                <div class="col text-h4">{{ product.name }}</div>
                <div class="col text-h6">{{ product.price }} $</div>
                <img :src="imagesUrl + '/' + product.photo" alt="">
                

                <q-card-actions  horizontal class="justify-around q-px-md">
                    <q-btn flat round color="purple" icon="delete" @click="deleteCard(product.id)"/>
                    <q-btn flat round color="purple" icon="edit" @click="updateCard(product.id)"/>
                </q-card-actions>

                
            </q-card-section>


        </q-card>
</template>

<script lang="ts">
import { useRouter } from "vue-router";
import { ref } from "vue";
import axios from "axios";
import { axiosClient } from "../axios";

interface Product {
    id: any;
    name: string;
    price: string;
    photo: string;
}


export default {

    props: {
        products: Array<Product>
    },

    setup(props) {

        const { push } = useRouter();

        const products = ref(props.products);

        const imagesUrl = 'http://localhost:8000/storage';

        const deleteCard = function (productId: any) {
            axiosClient.get(`/delete-product/${productId}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("login_token")}`
                }
            })
            .then((result) => {
                console.log(result)
            })
            .catch((error) => console.log(error))

        }

        const updateCard = function (productId: any) {
            push(`edit-product-page/${productId}`);
            
        }
        
        return {
            updateCard,
            deleteCard,
            products,
            imagesUrl
        }
    }

}
</script>