<template>
    <div>
        <q-card style="height: 300px;" class="column">

            <q-card-section class="col-8">
                <q-input v-model="email" type="text" label="email" color="purple"/>
                <q-input v-model="password" type="text" label="password" color="purple"/>
            </q-card-section>
            
            <q-card-section class="col-4">
                <q-btn no-caps size="20px" color="purple" @click="login()">Login</q-btn>
            </q-card-section>

        </q-card>
    </div>
</template>

<script lang="ts">
import { ref } from 'vue';
import { axiosClient } from '../axios';
import { useQuasar } from 'quasar'
import { useRouter } from 'vue-router';

export default {
    
    setup() {

        const email = ref('');
        const password = ref('');
        const { notify } = useQuasar();
        const { push } = useRouter();
    
        const login = function() {
            axiosClient.post('/login', {
            email: email.value,
            password: password.value,
        })
        .then((result) => {
            localStorage.setItem("login_token", result.data.token);
            push("/")
        })
        .catch((error) => {
            notify({
                message: error.response.statusText,
                color: "red"
            })
        })

        }

        return {
            email,
            password,
            login
        }

    }

}
</script>