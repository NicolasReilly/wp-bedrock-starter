import { defineConfig, loadEnv } from 'vite'
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin';
import fs from 'node:fs';
import path from 'node:path';

export default defineConfig(({ command, mode }) => {
  const env = loadEnv(mode, process.cwd(), '');
  const isDev = command === 'serve';
  const isDdev = !!process.env.IS_DDEV_PROJECT;

  // The path to the theme relative to the web root
  const themePath = 'app/themes/my-sage-theme';

  // Environment-specific URLs and Ports
  const port = isDdev ? 5173 : 5174;
  const ddevUrl = isDdev ? (env.APP_URL?.replace(/\/$/, '') || 'https://localhost') : 'http://localhost';
  const ddevHost = isDdev ? new URL(ddevUrl).hostname : 'localhost';

  return {
    base: isDev ? '/' : `/${themePath}/public/build/`,
    plugins: [
      tailwindcss(),
      laravel({
        input: [
          'resources/css/app.css',
          'resources/js/app.js',
          'resources/css/editor.css',
          'resources/js/editor.js',
        ],
        refresh: true,
        hotFile: 'public/hot',
      }),
      wordpressPlugin(),
      wordpressThemeJson({
        disableTailwindColors: false,
        disableTailwindFonts: false,
        disableTailwindFontSizes: false,
      }),
      {
        name: 'force-hot-file',
        apply: 'serve',
        enforce: 'post',
        configureServer(server) {
          server.httpServer?.once('listening', () => {
            const hotPath = path.resolve(__dirname, 'public/hot');
            const hotUrl = `${ddevUrl}:${port}`;
            fs.writeFileSync(hotPath, hotUrl);
          });
        },
      },
    ],
    server: {
      host: '0.0.0.0',
      port: port,
      strictPort: true,
      origin: `${ddevUrl}:${port}`,
      cors: true,
      hmr: {
        protocol: isDdev ? 'wss' : 'ws',
        host: ddevHost,
      },
      watch: {
        usePolling: isDdev,
      },
    },
  };
});
