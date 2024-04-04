import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue'
import { createVuetify } from 'vuetify'

import App from '../views/vue/App.vue'

const app = createApp(App);
const vuetify = createVuetify();

app.use(vuetify) 
app.mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
