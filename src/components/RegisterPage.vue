<template>
    <div>
        <q-card style="height: 300px;" class="column">

            <q-card-section class="col-8">
                <q-input v-model="name" type="text" label="name" color="purple"/>
                <q-input v-model="email" type="text" label="email" color="purple-12"/>
                <q-input v-model="password" type="text" label="password" color="purple-12"/>
            </q-card-section>

            <q-card-section class="col-2">
                <q-btn @click="register()" no-caps size="20px" color="purple">Register</q-btn>
            </q-card-section>

        </q-card>
    </div>
</template>

<script lang="ts">
import { ref } from 'vue';
import { axiosClient } from '../axios';
import { useRouter } from 'vue-router';

export default {
    
    setup() {

        const name = ref('');
        const email = ref('');
        const password = ref('');
        const { push } =  useRouter();

        const register = function() {
    
            axiosClient.post('/register', {
                name: name.value,
                email: email.value,
                password: password.value,
            })
            .then((result) => {
                localStorage.setItem("login_token", result.data.access_token);
                console.log(result.data.access_token)
                push("/");
            })
            .catch((error) => console.log(error))

        }


        return {
            name,
            email,
            password,
            register
        }

    }

}
</script>
