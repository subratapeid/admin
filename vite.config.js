import { defineConfig } from 'vite';

export default defineConfig({
    build: {
        outDir: 'dist',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                appCss: 'resources/css/app.css',
                // themeCss: 'resources/css/theme.css',

                basicCss: 'resources/css/layouts/basic.css',
                classicCss: 'resources/css/layouts/classic.css',
                // modernCss: 'resources/css/layouts/modern.css',

                appJs: 'resources/js/app.js',

                basicJs: 'resources/js/layouts/basic.js',
                classicJs: 'resources/js/layouts/classic.js',
                // modernJs: 'resources/js/layouts/modern.js',
            },
            output: {
                entryFileNames: 'js/[name].js',
                assetFileNames: 'css/[name][extname]',
            },
        },
    },
});