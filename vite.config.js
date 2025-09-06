import { defineConfig, loadEnv } from 'vite'
import { resolve } from 'path';
import path from 'path'
import fs from 'fs'

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), '')

  const isDev = mode === 'development'
  const themePath = path.resolve(__dirname, './wp-content/themes/cafeseraphin/')
  const viteDevFlagPath = path.join(themePath, '.vite-dev')

  // ✅ Écrire ou supprimer le fichier .vite-dev selon le mode
  if (isDev) {
    fs.writeFileSync(viteDevFlagPath, 'dev', 'utf-8')
  } else if (fs.existsSync(viteDevFlagPath)) {
    fs.unlinkSync(viteDevFlagPath)
  }

  return {
    root: '.',  // racine actuelle
    build: {
      outDir: 'wp-content/themes/cafeseraphin/dist',
      emptyOutDir: true,
      // manifest: true,
      rollupOptions: {
        input: resolve(__dirname, 'src/app.js'),
        output: {
          entryFileNames: '[name].js',
          chunkFileNames: '[name].js',
          assetFileNames: '[name][extname]',
        },
      },
    },
    plugins: [
      
    ],
    server: {
      watch: {
        usePolling: true, // <- parfois utile sous WSL, Docker, etc.
      },
    },
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'src'),
      },
    },
  }
})