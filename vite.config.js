import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vuePlugin from "@vitejs/plugin-vue";

const ddevPrimaryUrl = process.env.DDEV_PRIMARY_URL;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vuePlugin({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            'ziggy-js': '/vendor/tightenco/ziggy',
        },
    },
    // See https://github.com/mandrasch/ddev-laravel-breeze-vite/tree/main#how-was-this-created
    server: ddevPrimaryUrl
        ? {
            // respond to all network requests (same as '0.0.0.0')
            host: true,
            // we need a strict port to match on PHP side
            strictPort: true,
            port: 5173,
            hmr: {
                // Force the Vite client to connect via SSL
                // This will also force a "https://" URL in the hot file
                protocol: 'wss',
                // The host where the Vite dev server can be accessed
                // This will also force this host to be written to the hot file
                host: new URL(ddevPrimaryUrl).host,
            },
        }
        : null,
});
