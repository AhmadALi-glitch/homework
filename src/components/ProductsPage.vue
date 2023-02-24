<template>
    <div class="q-gutter-md row justify-center">

        <q-card 
        flat 
        bordered 
        class="col-5 q-pa-md text-dark" 
        v-for="product in products" :key="product.id">

            <q-card-section>

                
                <div class="col text-h4">{{ product.name }}</div>
                <div class="col text-h6">{{ product.price }}</div>
                

                <q-card-actions  horizontal class="justify-around q-px-md">
                    <q-btn flat round color="purple" icon="delete" />
                    <q-btn flat round color="purple" icon="edit" />
                </q-card-actions>

                
            </q-card-section>


        </q-card>

    </div>
</template>

<script lang="ts">

export default {
    setup() {
        const products = [
            {
                name: "watch",
                price: "100$",
                id: 1
            },

            {
                name: "watch",
                price: "100$",
                id: 2
            },

            {
                name: "watch",
                price: "100$",
                id: 3
            },
            {
                name: "watch",
                price: "100$",
                id: 4
            },
            {
                name: "watch",
                price: "100$",
                id: 5
            }
        ]

        return {
            products
        }
    }
}
</script>