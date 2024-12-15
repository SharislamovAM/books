import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import App from './App.vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.min.js';

const app = createApp({});
app.component('App', App);
app.mount('#app');
