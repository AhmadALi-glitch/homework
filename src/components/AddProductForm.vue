<template>

    <div style="height:auto" class="q-gutter-md">

        <q-btn @click="showProductForm()" icon="add" bordered style="border:dashed purple 3px"/>

        <q-form style="border:dashed purple 3px" class="bg-white justify-center q-gutter-md q-pa-md" v-if="productFormVisibility">

            <q-input v-model="productName" color="purple" type="text" label="Product Name" />
            <q-input v-model="productPrice" color="purple" type="text" label="Product Price" />
            
            <div class="q-gutter-sm">
                <q-btn @click="hideProductForm()" color="red" icon="close" />
                <q-btn @click="sendProductInfo()" label="Save" type="submit" color="purple"/>
            </div>

        </q-form>

    </div>

</template>

<script lang="ts">
import { ref } from 'vue';
import ProductCard from './ProductCard.vue';
import { axiosClient } from '../axios';


export default {
    components: {ProductCard},

    setup() {

        const productName = ref('');
        const productPrice = ref('');

        const productFormVisibility = ref(false);

        const showProductForm = function() {
            productFormVisibility.value = true;
        }

        const hideProductForm = function() {
            productFormVisibility.value = false;
        }

        const sendProductInfo = function() {
            
            axiosClient.get("/token")
            .then((result) => {

                axiosClient.post("/store-product", {
                    name: "p1",
                    price: "100$"
                }, {
                    headers: {
                        'X-CSRF-TOKEN' : result.data,
                        'Authorization': result.data
                    }
                })
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => {
                    console.log(err);
                })

            })
            

        }

        return {
            showProductForm,
            productFormVisibility,
            productName,
            productPrice,
            hideProductForm,
            sendProductInfo
        }
    }
}
</script>
