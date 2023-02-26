<template>
    <div>
        <q-card style="height: 300px;" class="column">

            <q-card-section class="col-8">
                <q-input v-model="name" type="text" label="name" color="purple"/>
                <q-input v-model="username" type="text" label="username" color="purple-12"/>
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

export default {
    
    setup() {

        const name = ref('');
        const username = ref('');
        const password = ref('');

        return {
            name,
            username,
            password
        }

    }

}
</script>
