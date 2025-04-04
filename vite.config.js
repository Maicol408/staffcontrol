import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', // Ruta correcta para el archivo SASS
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

