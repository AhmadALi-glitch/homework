<template>
    <q-card 
        flat 
        bordered 
        class="col-5 q-pa-md text-dark" 
        v-for="product in products" :key="product.id">

            <q-card-section>

                
                <div class="col text-h4">{{ product.name }}</div>
                <div class="col text-h6">{{ product.price }} $</div>
                <img :src="imagesUrl + '/' + product.photo"  
                style="max-width: 100px; min-width: 100px;">
                

                <q-card-actions v-if="isAuth" horizontal class="justify-around q-px-md">
                    <q-btn flat round color="purple" icon="delete" @click="deleteCard(product.id)"/>
                    <q-btn flat round color="purple" icon="edit" @click="editCard(product.id)"/>
                </q-card-actions>

                
            </q-card-section>


        </q-card>
</template>

<script lang="ts">
import { useRouter } from "vue-router";
import { ref } from "vue";
import { axiosClient } from "../axios";
import { useQuasar } from "quasar";

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
    emits: ['product-deleted'],

    setup(props, {emit}) {

        const { push } = useRouter();
        const { notify } = useQuasar();

        const products = ref(props.products);
        const imagesUrl = 'http://localhost:8000/storage';

        const isAuth = localStorage.getItem("login_token") !== null;

        const deleteCard = function (productId: any) {
            axiosClient.get(`/delete-product/${productId}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("login_token")}`
                }
            })
            .then(() => {

                // notify the products Component to re-fetch the products
                emit('product-deleted', productId);

                notify({
                    message: "Product Deleted Succuessfully",
                    color: "green"
                })
            })
            .catch(() => {
                notify({
                    message: "Something went wrong please try again",
                    color: "red"
                })
            })

        }

        const editCard = function (productId: any) {
            push(`edit-product-page/${productId}`);
        }
        
        return {
            editCard,
            deleteCard,
            products,
            imagesUrl,
            isAuth
        }
    }

}
</script>