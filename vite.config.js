import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/active-menu-link.js',
                'resources/js/embla-carousel.js',
                'resources/js/html5-qrcode.js',
            ],
            refresh: true,
        }),
    ],
});
