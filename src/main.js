import { createApp } from 'vue'
import './style.css'
import App from './App.vue'

import { router } from './router/router'
import {Quasar} from "quasar";
import 'quasar/src/css/index.sass';
import '@quasar/extras/material-icons/material-icons.css'


createApp(App)
.use(router)
.use(Quasar, {
    plugins: {}
})
.mount('#app')
