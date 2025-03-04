<template>
  <nav class="filters">
    <!-- Bouton pour ouvrir la side-nav (uniquement sur mobile) -->
    <div class="filters-items">
      <button class="filter-button mobile-only" @click="toggleSideNav">
      ☰ Filtres
      </button>

      <!-- Side-nav (uniquement sur mobile) -->
      <div class="side-nav" :class="{ 'open': isSideNavOpen }">
        <button class="close-btn" @click="toggleSideNav">✖</button>
        <ul class="nav-tags">
          <li class="tag_btn" v-for="(tag, index) in tags" :key="index">
            <button @click="applyTagFilter(tag.name)">
              {{ tag.name }}
            </button>
          </li>
        </ul>
      </div>
    </div>


    <!-- Liste des tags en ligne pour desktop -->
    <ul class="nav-tags desktop-only">
      <li class="tag_btn" v-for="(tag, index) in tags" :key="index">
        <button @click="applyTagFilter(tag.name)">
          {{ tag.name }}
        </button>
      </li>
    </ul>

    <!-- Bouton pour afficher tous les films -->
    <button @click="resetFilter" class="filter-button">
      🔄 Tous les films
    </button>
  </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { useFetch } from "#app";
import { defineEmits } from "vue";

const emit = defineEmits(["filterByTag"]);

const isSideNavOpen = ref(false);

// Fonction pour ouvrir/fermer la side-nav
const toggleSideNav = () => {
  isSideNavOpen.value = !isSideNavOpen.value;
};

// Fonction pour filtrer et fermer la side-nav en même temps
const applyTagFilter = (tag) => {
  emit("filterByTag", tag);
  isSideNavOpen.value = false;
};

// Fonction pour réinitialiser les filtres et fermer la side-nav
const resetFilter = () => {
  emit("filterByTag", null);
  isSideNavOpen.value = false;
};

// Fermer la side-nav lorsqu'on clique en dehors
const closeSideNav = (event) => {
  if (!event.target.closest(".side-nav") && !event.target.closest(".filter-button")) {
    isSideNavOpen.value = false;
  }
};

onMounted(() => {
  document.addEventListener("click", closeSideNav);
});

onUnmounted(() => {
  document.removeEventListener("click", closeSideNav);
});

// Récupération des tags depuis l'API
const { data: tags } = useFetch("http://localhost/cg-film-new/server/api/tags.php", {
  transform: (res) => Array.isArray(res) ? res : [res]
});
</script>

<style scoped lang="scss">
@use "@/assets/scss/pages/allFilms.scss";
.menu-button {
  display: none; // Caché sur desktop
  background-color: rgb(12, 173, 161);
  color: white;
  border: none;
  padding: 10px 15px;
  font-size: 1.2rem;
  cursor: pointer;
  border-radius: 5px;
}

</style>