import { defineNuxtConfig } from 'nuxt/config';

export default defineNuxtConfig({
  type: 'module',
  target: 'static',
  ssr: false, // Désactive le SSR (Nuxt devient un SPA)
  css: [
    '@/assets/scss/main.scss', // Include a global SCSS file
  ],
  modules: [
    [
      '@nuxtjs/i18n', // Module for language management
      {
        locales: [
          { code: 'fr', name: 'Français', iso: 'fr-FR', file: 'fr.json' },
          { code: 'en', name: 'English', iso: 'en-US', file: 'en.json' },
        ],
        defaultLocale: 'fr',
        lazy: true,
        langDir: 'locales/',
      },
    ],
    '@nuxt/image',  // Image optimization
    '@nuxtjs/google-fonts', // Google Fonts
  ],

  googleFonts: {
    families: {
      'Dancing Script': [400, 700],
      'Lato': [100, 300, 400, 700, 900],
      'Playfair Display': [400, 700, 900],
    },
    display: 'swap',
  },
  
  // Include a global plugin
  plugins: ['~/plugins/fontawesome.js'],
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true }
})
