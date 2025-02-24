<template>
  <header>
    <!-- Logo -->
    <nuxt-link to="/" class="logo">
      <NuxtImg src="/images/logo.webp" alt="Logo de cgfilm13" width="100" priority />
    </nuxt-link>

    <!-- Navigation -->
    <nav id="navigation">
      <ul class="nav-links" :class="{ open: isMenuOpen }">
        <li class="nav-link"><nuxt-link to="/">Accueil</nuxt-link></li>
        <li class="nav-link"><nuxt-link to="/filmMaker">Le réalisateur</nuxt-link></li>
        <li class="nav-link"><nuxt-link to="/films">Films</nuxt-link></li>
        <li class="nav-link"><nuxt-link to="/featured">En vedette</nuxt-link></li>
        <li class="nav-link"><nuxt-link to="/contact">Contact</nuxt-link></li>
        <li>
          <div class="header-extras-mobile">
            <LanguageSwitch />
            <ul class="social-links">
              <li>
                <a href="https://www.youtube.com/user/cgfilm13" aria-label="Lien vers le YouTube de cgfilm13">
                  <client-only><font-awesome-icon :icon="['fab', 'youtube']" /></client-only>
                </a>
              </li>
              <li>
                <a href="https://www.facebook.com/jimmy.coty.1" aria-label="Lien vers le Facebook de cgfilm13">
                  <client-only><font-awesome-icon :icon="['fab', 'facebook']" /></client-only>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/jimmy-paul-coti-90829b76/" aria-label="Lien vers le LinkedIn de Jimmy Paul Coti">
                  <client-only><font-awesome-icon :icon="['fab', 'linkedin']" /></client-only>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </nav>

    <!-- Bouton Hamburger et Extras -->
    <div class="header-item-group">
      <button class="hamburger" @click="toggleMenu" :class="{ open: isMenuOpen }" aria-label="Menu">
        <div></div>
        <div></div>
        <div></div>
      </button>

      <div class="header-extras">
        <LanguageSwitch />
        <ul class="social-links">
          <li>
            <a href="https://www.youtube.com/user/cgfilm13" aria-label="YouTube">
              <client-only><font-awesome-icon :icon="['fab', 'youtube']" /></client-only>
            </a>
          </li>
          <li>
            <a href="https://www.facebook.com/jimmy.coty.1" aria-label="Facebook">
              <client-only><font-awesome-icon :icon="['fab', 'facebook']" /></client-only>
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/jimmy-paul-coti-90829b76/" aria-label="LinkedIn">
              <client-only><font-awesome-icon :icon="['fab', 'linkedin']" /></client-only>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</template>

<script setup>
import LanguageSwitch from '../components/LanguageSwitch.vue';
import { ref } from 'vue';

// Gestion de l'état du menu
const isMenuOpen = ref(false);

// Fonction pour ouvrir/fermer le menu
const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
</script>

<style scoped lang="scss">
@use '@/assets/scss/components/_header.scss';
</style>
