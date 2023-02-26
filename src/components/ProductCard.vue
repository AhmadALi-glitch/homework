<template>
    <q-card 
        flat 
        bordered 
        class="col-5 q-pa-md text-dark" 
        v-for="product in products" :key="product.id">

            <q-card-section>

                
                <div class="col text-h4">{{ product.name }}</div>
                <div class="col text-h6">{{ product.price }}</div>
                

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

interface Product {
    id: any;
    name: string;
    price: string;
}


export default {

    props: {
        products: Array<Product>
    },

    setup(props) {

        const { push } = useRouter();

        const products = ref(props.products);

        const deleteCard = function (productId: any) {
            //
        }

        const updateCard = function (productId: any) {
            push(`edit-product-page/${productId}`);
            
        }
        
        return {
            updateCard,
            deleteCard,
            products
        }
    }

}
</script>