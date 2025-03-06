import { defineNuxtConfig } from 'nuxt/config';

export default defineNuxtConfig({
  app: {
    head: {
      script: [
        { src: "https://www.google.com/recaptcha/api.js?render=6LfsPusqAAAAAAjf0jFFafoQlhOSZ898itopjt3B", async: true, defer: true }
      ],
      titleTemplate: '%s - CG-Film Camargue',
      meta: [
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { charset: 'utf-8' },
        { hid: 'description', name: 'description', content: 'Jimmy-Paul Coti, réalisateur indépendant : films, aventures humaines et documentaires exceptionnels.' },
        { name: 'format-detection', content: 'telephone=no' },
        { name: 'author', content: 'CG-Film Camargue' },
        { property: 'og:type', content: 'website' },
        { property: 'og:locale', content: 'fr_FR' },
      ],
      link: [{ rel: 'icon', type: 'image/png', href: '/favicon.png' }],
    }
  },
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
