<!-- <template>
  <div class="search-bar">
    <div class="search-input">
      <input
        type="text"
        v-model="searchQuery"
        @input="filterResults"
        @keydown.down.prevent="navigate(1)"
        @keydown.up.prevent="navigate(-1)"
        @keydown.enter.prevent="selectItem()"
        placeholder="Rechercher par titre, acteur, année, tag..."
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

<script setup lang="ts">
import { ref, computed, defineProps, defineEmits } from "vue";
import type { Film } from "@/api/films";

// Définition des props
const props = defineProps<{ films: Film[] }>();

// Définition des événements
const emit = defineEmits(["searchQueryChanged"]);

// Variables réactives
const searchQuery = ref<string>("");
const selectedIndex = ref<number>(-1);

// Générer une liste de suggestions basée sur titre, tags, acteurs, date de sortie
const filteredItems = computed(() => {
  if (!searchQuery.value) return [];

  return props.films
    .flatMap((film) => [
      film.title,
      ...film.tags ?? [],
      film.releaseDate,
      ...(film.cast?.map(cast => cast.name) ?? []),
    ])
    .filter((item) => item.toLowerCase().includes(searchQuery.value.toLowerCase()))
    .slice(0, 5); // Limite les suggestions à 5
});

// Met à jour la recherche quand l'utilisateur tape
const filterResults = () => {
  selectedIndex.value = -1;
  emit("searchQueryChanged", searchQuery.value);
};

// Navigation au clavier (flèches)
const navigate = (direction: number) => {
  if (filteredItems.value.length === 0) return;
  selectedIndex.value =
    (selectedIndex.value + direction + filteredItems.value.length) %
    filteredItems.value.length;
};

// Survol d'une suggestion
const hoverItem = (index: number) => {
  selectedIndex.value = index;
};

// Sélection d'une suggestion
const selectItem = (index: number = selectedIndex.value) => {
  if (index !== -1 && filteredItems.value.length > 0) {
    searchQuery.value = filteredItems.value[index];
    emit("searchQueryChanged", searchQuery.value);
    resetSearch();
  }
};

// Recherche manuelle avec bouton
const performSearch = () => {
  emit("searchQueryChanged", searchQuery.value);
  resetSearch();
};

// Réinitialisation
const resetSearch = () => {
  selectedIndex.value = -1;
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
</style> -->
