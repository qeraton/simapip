import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js'
import { createPinia } from 'pinia'
import { SomeComponent } from "@ntohq/buefy-next";
import api from './api.js';

import Buefy from '@ntohq/buefy-next';
import '@ntohq/buefy-next/dist/buefy.css';

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

import PenugasanPage from './vue/Pages/Penugasan.vue'

const app = createApp({
    components: {
        PenugasanPage
    }
})

app.config.globalProperties.$api = api;

const pinia = createPinia()
app.use(pinia)

app.use(Buefy)

app.mount('#app');
