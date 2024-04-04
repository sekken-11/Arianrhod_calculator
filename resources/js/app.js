import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue'
import App from '../views/vue/App.vue'
createApp(App).mount("#app")

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
