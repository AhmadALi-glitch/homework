<template>
    <div class="row justify-center">

        <component class="col-7" :is="componentId"></component>

        <q-toolbar class="bg-purple text-white row justify-around col-2" style="width:300px">
            
            <q-btn @click="directToLogin">
                <q-icon name="login"  />
            </q-btn>

            <q-btn @click="directToRegister">
                <q-icon name="person_add"  />
            </q-btn>

        </q-toolbar>

    </div>
</template>

<script lang="ts">
import LoginPage from './LoginPage.vue';
import RegisterPage from './RegisterPage.vue';
import { ref } from 'vue';

export default {
    components: { LoginPage, RegisterPage },

    setup() {
        const userAccountStatus = ref('login');
        const componentId = ref('LoginPage');

        const directToLogin = function() {
            componentId.value = "LoginPage";
        }

        const directToRegister = function() {
            componentId.value = "RegisterPage";
        }

        return {
            userAccountStatus,
            componentId,
            directToLogin,
            directToRegister
        }
    }

}

</script>