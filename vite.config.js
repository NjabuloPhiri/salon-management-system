// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'], // Adjust the paths based on your setup
            refresh: true,
        }),
    ],
    build: {
        manifest: true,
        outDir: 'public/build', // Ensure this path matches the location where your manifest should be
    },
});
