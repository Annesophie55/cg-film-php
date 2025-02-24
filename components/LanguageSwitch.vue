<template>
  <button class="btn-language" @click="toggleLanguage()">
    <!-- Labels pour les langues -->
    <span class="lang-label" :class="{ active: currentLang === 'fr' }">Fr</span>
    <div class="switch-container" :style="{ transform: currentLang === 'fr' ? 'translateX(0)' : 'translateX(100%)' }"></div>
    <span class="lang-label" :class="{ active: currentLang === 'en' }">En</span>
  </button>
</template>

<script setup lang="ts">
import { ref } from "vue";


// Définition d'un type pour la langue
type Language = 'fr' | 'en';

// Variable réactive avec typage strict
const currentLang = ref<Language>('fr');

// Fonction pour changer la langue avec typage
const toggleLanguage = (): void => {
  currentLang.value = currentLang.value === 'fr' ? 'en' : 'fr';
  console.log(`Langue actuelle : ${currentLang.value}`);
};
</script>

<style scoped>
/* Styles pour le bouton principal */
.btn-language {
  position: relative;
  height: 30px;
  width: 68px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 5px;
  border-radius: 25px;
  background-color: rgb(32, 25, 62);
  margin-top: 5px;
  border: none;
  margin-left: auto;
  margin-right: 15px;
}

/* Styles pour les labels */
.lang-label {
  font-size: 14px;
  color: var(--white);
  opacity: 0.5;
  transition: opacity 0.3s, font-weight 0.3s;
  margin: auto;
}

.lang-label.active {
  opacity: 1;
  font-weight: bold;
}

/* Styles pour le rond qui se déplace */
.switch-container {
  position: absolute;
  top: 0;
  left: 0;
  height: 30px;
  width: 35px;
  background-color: transparent;
  border-radius: 25px;
  border: 2.5px solid var(--blue-accent-2);
  transition: transform 0.3s ease-in-out, background-color 0.3s;
  cursor: pointer;
}
</style>
