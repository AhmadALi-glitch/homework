<template>
    <div>
    
        <q-form
            class="q-gutter-sm bg-white q-pa-md column row justify-center"
            style="height: 200px;"
        >
            <q-input v-model="product.productName" filled type="text" label="Name" color="purple"/>
            <q-input v-model="product.productPrice" filled type="text" label="Price" color="purple"/>

            <div>
                <q-btn label="Update" type="submit" color="purple"/>
            </div>

        </q-form>
    
    </div>
</template>


<script lang="ts">
import { ref, reactive } from 'vue';
import { useRoute } from 'vue-router';
import { axiosClient } from '../axios';

export default {
    
    setup() {
        
        const product = reactive({
            productId: null,
            productName: null,
            productPrice: null
        })

        const {params: routerParams} = useRoute();

        console.log(routerParams.productId);

        axiosClient.get(`show-product/${routerParams.productId}`)
        .then((result) => {
            let fetchedProduct = result.data.data;
            product.productId = fetchedProduct.id;
            product.productName = fetchedProduct.name;
            product.productPrice = fetchedProduct.price;
        })

        return {
            product
        }

    }
}
</script>