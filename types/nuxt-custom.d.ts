// types/nuxt-custom.d.ts
declare module 'nuxt/config' {
  interface NuxtConfig {
    googleFonts?: {
      families?: Record<string, boolean | number[] | string>
      display?: string
      // Autres options si nécessaire
    }
    target?: 'server' | 'static'
  }
}
