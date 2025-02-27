

<template>
  <Header />
  <main class="films">
    <section class="filters">
      <NavTags @filterByTag="applyTagFilter" />

      <div class="searchBar">
        <SearchBar :films="films" @itemSelected="handleSelection" />
      </div>
    </section>
    <section class="Gallery-container">
      <Gallery :films="films ?? []" v-if="films && films.length" />
      <p v-else>Chargement des films...</p>
    </section>
  </main>
  <Footer />
</template>

<script setup>
import Footer from "../components/Footer.vue";
import Header from "../components/Header.vue";
import SearchBar from "../components/SearchBar.vue";
import Gallery from "../components/Gallery.vue";
import NavTags from "../components/NavTags.vue";

import { ref, watchEffect } from "vue";
import { useFetch } from "#app";

const films = ref([]);
const selectedTag = ref(null);
const searchQuery = ref(""); // Permet de chercher par titre OU acteur

// Fonction qui met à jour le tag sélectionné et rafraîchit la liste des films
const applyTagFilter = (tag) => {
  selectedTag.value = tag;
  fetchFilms();
};

// Fonction pour gérer la sélection depuis la barre de recherche
const handleSelection = (query) => {
  console.log("Rechercher :", query);
  searchQuery.value = query;
  fetchFilms(); // 🔥 Rafraîchir la liste avec le filtre
};

// Fonction de mise à jour dynamique des films en fonction des filtres actifs
const fetchFilms = () => {
  let url = "http://localhost/cg-film-new/server/api/films_search.php";
  const params = new URLSearchParams();

  if (selectedTag.value) params.append("tag", selectedTag.value);
  if (searchQuery.value) {
    params.append("query", searchQuery.value); // 🔥 Peut être un titre ou un acteur
  }

  url += `?${params.toString()}`;

  useFetch(url).then(({ data }) => {
    films.value = data.value;
  });
};

// Surveille les changements et rafraîchit les résultats automatiquement
watchEffect(fetchFilms);

</script>
