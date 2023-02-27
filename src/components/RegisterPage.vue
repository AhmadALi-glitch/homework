<template>
    <div>
        <q-card style="height: 300px;" class="column">

            <q-card-section class="col-8">
                <q-input v-model="name" type="text" label="name" color="purple"/>
                <q-input v-model="email" type="text" label="email" color="purple-12"/>
                <q-input v-model="password" type="text" label="password" color="purple-12"/>
            </q-card-section>

            <q-card-section class="col-2">
                <q-btn no-caps size="20px" color="purple">Register</q-btn>
            </q-card-section>

        </q-card>
    </div>
</template>

<script lang="ts">
import { ref } from 'vue';
import { axiosClient } from '../axios';

export default {
    
    setup() {

        const name = ref('');
        const email = ref('');
        const password = ref('');

        axiosClient.get('/token')
        .then((result) =>{

            axiosClient.post('/register', {
                name: "ahmad",
                email: "testTesttest@example.com",
                password: 'test12345test',
    
            }, {
                headers: {
                    'X-CSRF-TOKEN' : result.data
                }
            })
            .then((result) => console.log(result))
            .catch((error) => console.log(error))

        })
        .catch((error) => console.log(error))

        return {
            name,
            email,
            password
        }

    }

}
</script>
