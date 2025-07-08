import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/page-css/landing.css',
                'resources/css/page-css/pelaporan.css',
                'resources/css/page-css/artikel.css',
                'resources/css/page-css/jadwal.css',
                'resources/css/page-css/form-pelaporan.css',
                'resources/css/page-css/show-pelaporan.css',
                'resources/css/auth/auth.css',
                'resources/css/petugas-css/dashboard.css',
                'resources/css/petugas-css/laporan.css',
                'resources/css/profile/index.css',
                'resources/css/profile/edit.css',
            ],
            refresh: true,
        }),
    ],
});
