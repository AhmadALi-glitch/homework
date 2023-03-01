<template>

    <div style="height:auto" class="q-gutter-md">

        <q-btn @click="showProductForm()" icon="add" bordered style="border:dashed purple 3px"/>

        <q-form style="border:dashed purple 3px" class="bg-white justify-center q-gutter-md q-pa-md" v-if="productFormVisibility">

            <q-input name="name" v-model="productName" color="purple" type="text" label="Product Name" />
            <q-input name="price" v-model="productPrice" color="purple" type="text" label="Product Price" />
            <q-input stack-label name="photo" v-model="productPhoto" type="file" label="Product Photo" />
            
            <div class="q-gutter-sm">
                <q-btn @click="hideProductForm()" color="red" icon="close" />
                <q-btn @click="sendProductInfo()" label="Save" color="purple"/>
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
    emits: ['products-changed'],

    setup(props, {emit}) {

        const productName = ref('');
        const productPrice = ref('');
        const productPhoto = ref('');

        const productFormVisibility = ref(false);

        const showProductForm = function() {
            productFormVisibility.value = true;
        }

        const hideProductForm = function() {
            productFormVisibility.value = false;
        }

        const sendProductInfo = function() {

            let formData = new FormData();

            formData.append('name',  productName.value);
            formData.append('price',  productPrice.value);
            formData.append('photo',  productPhoto.value[0]);

            console.log(formData)

            axiosClient.post('/store-product', formData, {
                headers:  {
                    Authorization : `Bearer ${localStorage.getItem("login_token")}`
                }
            })
            .then((result) => {
                // notify the products Component to re-fetch the products
                emit('products-changed');
            })
            .catch((error) => console.log(error))

        }

        return {
            showProductForm,
            productFormVisibility,
            productName,
            productPrice,
            hideProductForm,
            sendProductInfo,
            productPhoto
        }
    }
}
</script>
