import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import dotenv from 'dotenv';

dotenv.config();
export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.scss',
            'resources/js/app.js'
        ])
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
        },
    }
});
