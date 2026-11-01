import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Vite production builds don't support globs; list entries explicitly
            input: [
                'resources/css/media_query.css',
                'resources/css/bootstrap.css',
                'resources/css/animate.css',
                'resources/css/owl.carousel.css',
                'resources/css/owl.theme.default.css',
                'resources/css/style_1.css',
                'resources/js/modernizr-3.5.0.min.js',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
