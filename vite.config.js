import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/map.css',
                'resources/css/pokemon.css',
                'resources/js/app.js',
                'resources/js/map.js',
                'resources/js/pokemon.js',
                'resources/js/pokemon_sub.js',
            ],
            fresh: true,
        }),
    ],
});
