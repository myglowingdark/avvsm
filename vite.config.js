import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: 
                [
                    'resources/css/app.css',
                    'resources/js/app.js',
                    // 'resources/assets/css/demo.css',
                    // 'resources/assets/js/demo.css'
                ],
            refresh: true,
        }),
    ],
});
