<template>
  <Header />
  <main class="films">
    <section class="filters">
      <!-- 🔥 Bien écouter l'événement -->
      <NavTags @filterByTag="applyTagFilter" />
    </section>

    <section class="Gallery-container">
      <Gallery :films="searchResults.films" v-if="searchResults.films.length" />
      <p v-else>Chargement des films...</p>
    </section>
  </main>
  <Footer />
</template>

<script setup>
import Footer from "../components/Footer.vue";
import Header from "../components/Header.vue";
import Gallery from "../components/Gallery.vue";
import NavTags from "../components/NavTags.vue";

import { searchResults, fetchAllFilms, fetchResults } from "@/composables/searchStore";
import { onMounted } from "vue";

// 🏁 Charger tous les films au démarrage
onMounted(fetchAllFilms);

// 🎭 Gérer le filtrage des films par tag
const applyTagFilter = (tag) => {
  console.log("📌 Filtrage par tag :", tag);
  fetchResults("tag", tag);
};

// 🔄 Réinitialiser la liste des films
const resetFilter = () => {
  fetchAllFilms();
};

useSeoMeta({
  title: 'Filmographie complète de Jimmy-Paul Coti | CG-Film Camargue',
  description: 'Découvrez tous les films réalisés par Jimmy-Paul Coti, réalisateur indépendant primé à l\'international : aventures, documentaires, courts et longs métrages.',
  ogTitle: 'Films de Jimmy-Paul Coti | CG-Film Camargue',
  ogDescription: 'Explorez la collection complète des œuvres cinématographiques de Jimmy-Paul Coti, diffusées dans plus de 22 pays.',
  ogImage: '/images/chemin_or_blanc_affiche.webp',
  twitterCard: 'summary_large_image',
})

useHead({
  link: [
    { rel: 'canonical', href: 'https://cg-film.com/allFilms' },
  ]
})
</script>

<style lang="scss" scoped>
@use "@/assets/scss/pages/allFilms.scss";
.Gallery-container {
  margin-top: min(0px); // Ajuste cette valeur selon la hauteur des filtres
}

.reset-button{
  padding: 5px 10px;
  border: none;
  background: rgb(12,173,161);
  background: linear-gradient(212deg, rgba(12,173,161,1) 30%, rgba(12,148,138,0.9831168356906163) 48%, rgba(14,124,139,1) 78%);
  color: var(--white);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  cursor: pointer;
}
</style>
