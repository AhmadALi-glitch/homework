<template>
    <div>
    
        <q-form
            class="q-gutter-md bg-white q-pa-sm row justify-center col-5"
            style="height: 300px;"
        >

        
            <div class="inputs col-5 q-gutter-xs">
                <q-input v-model="product.productName" filled type="text" label="Name" color="purple"/>
                <q-input v-model="product.productPrice" filled type="text" label="Price" color="purple"/>
                <q-input v-model="product.productPhoto" filled type="file" label="photo" color="purple"/>
            </div>

            <div class="product-image col-6" style="max-height: 150px">
                <img  style="max-width: 200px" :src="imagesUrl +'/' + tempProductPhoto">
            </div>


            <div class="col-12">
                <q-btn @click="updateProduct()" label="Update" color="purple"/>
            </div>
            
        </q-form>


    
    </div>
</template>


<script lang="ts">
import { ref, reactive } from 'vue';
import { useRoute } from 'vue-router';
import { axiosClient } from '../axios';
import { router } from '../router/router';

export default {
    
    setup() {
        const {params: routerParams} = useRoute();
        
        const product = reactive({
            productId: '',
            productName: '',
            productPrice: '',
            productPhoto: ''
        });

        let tempProductPhoto = ref(null);

        const imagesUrl = 'http://localhost:8000/storage';

        const fetchProduct = function() {
            axiosClient.get(`show-product/${routerParams.productId}`)
            .then((result) => {
                let fetchedProduct = result.data.data;
    
                product.productId = fetchedProduct.id;
                product.productName = fetchedProduct.name;
                product.productPrice = fetchedProduct.price;
                product.productPhoto = fetchedProduct.photo;
    
                tempProductPhoto.value = fetchedProduct.photo;
            })
        }

        fetchProduct();


        const updateProduct = function() {

            const formData = new FormData();

            formData.append("name", product.productName);
            formData.append("price", product.productPrice);
            formData.append("photo", product.productPhoto[0]);
    
            axiosClient.post(`update-product/${routerParams.productId}`, formData, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('login_token')}`
                }
            })
            .then((res) => {
                fetchProduct();
            })
            .catch((err) => console.log(err))

        }

        return {
            product,
            imagesUrl,
            tempProductPhoto,
            updateProduct
        }

    }
}
</script>