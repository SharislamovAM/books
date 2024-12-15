import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vueDevtools from 'vite-plugin-vue-devtools';
import Vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            server: {
                hmr: {
                    host: 'localhost',
                },
            },
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        Vue(),
        vueDevtools(),
    ],
});

