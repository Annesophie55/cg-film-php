<template>
  <div class="search-bar">
    <div class="search-input">
      <input
        type="text"
        v-model="searchQuery"
        @input="filterResults"
        @keydown.down.prevent="navigate(1)"
        @keydown.up.prevent="navigate(-1)"
        @keydown.enter.prevent="selectItem()"
        placeholder="Rechercher par titre ou acteur"
      />
      <button @click="performSearch">
        🔍
      </button>
    </div>
    
    <ul v-if="filteredItems.length > 0" class="suggestions">
      <li
        v-for="(item, index) in filteredItems"
        :key="index"
        :class="{ 'selected': index === selectedIndex }"
        @click="selectItem(index)"
        @mouseover="hoverItem(index)"
      >
        {{ item }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, computed, defineEmits } from "vue";

const emit = defineEmits(["itemSelected"]);

const searchQuery = ref("");
const selectedIndex = ref(-1);

// Liste des résultats de la recherche (titres + acteurs)
const filteredItems = computed(() => {
  if (!searchQuery.value) return [];

  return [
    "L'Aile et la Bête", // Titres fictifs
    "Les Sabots de Vénus",
    "Patrice Barkouda", // Acteur fictif
    "Natalie Lagrange"
  ]
    .filter((item) => item.toLowerCase().includes(searchQuery.value.toLowerCase()))
    .slice(0, 5);
});

// Fonction pour gérer la sélection d'un élément
const selectItem = (index = selectedIndex.value) => {
  if (index !== -1 && filteredItems.value.length > 0) {
    searchQuery.value = filteredItems.value[index];
    emit("itemSelected", searchQuery.value); // ✅ Émet bien l’événement
  }
};

// Navigation au clavier
const navigate = (direction) => {
  if (filteredItems.value.length === 0) return;
  selectedIndex.value =
    (selectedIndex.value + direction + filteredItems.value.length) %
    filteredItems.value.length;
};

// Gestion du survol des éléments
const hoverItem = (index) => {
  selectedIndex.value = index;
};
</script>







<style scoped>
.search-bar {
  position: relative;
  width: 300px;
}
.search-input {
  display: flex;
  align-items: center;
}
input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
}
button {
  padding: 8px;
  background: white;
  border: 1px solid #ccc;
  cursor: pointer;
}
button:hover {
  background: #f0f0f0;
}
.suggestions {
  position: absolute;
  width: 100%;
  background: white;
  border: 1px solid #ccc;
  list-style: none;
  padding: 0;
  margin: 0;
  max-height: 150px;
  overflow-y: auto;
}
.suggestions li {
  padding: 8px;
  cursor: pointer;
}
.suggestions li.selected {
  background: #f0f0f0;
}
</style>
