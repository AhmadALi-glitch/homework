<template>
    <div>
        <q-card style="height: 300px;" class="column">

            <q-card-section class="col-8">
                <q-input v-model="email" type="text" label="email" color="purple"/>
                <q-input v-model="password" type="text" label="password" color="purple"/>
            </q-card-section>
            
            <q-card-section class="col-4">
                <q-btn no-caps size="20px" color="purple">Login</q-btn>
            </q-card-section>

        </q-card>
    </div>
</template>

<script lang="ts">
import { ref } from 'vue';
import { axiosClient } from '../axios';

export default {
    
    setup() {

        const email = ref('');
        const password = ref('');

        axiosClient.get('/token')
        .then((result) =>{

            axiosClient.post('/login', {
                email: "testTesttest@example.com",
                password: 'test12345test',
    
            }, {
                headers: {
                    'X-CSRF-TOKEN' : result.data
                }
            })
            .then((result) => localStorage.setItem("login_token", result.data.token))
            .catch((error) => console.log(error))

        })
        .catch((error) => console.log(error))


        return {
            email,
            password
        }

    }

}
</script>