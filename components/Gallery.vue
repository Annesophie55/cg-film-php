<template>
  <div class="film-gallery">
    <FilmCard v-for="film in searchResults.films" :key="film.film_id" :film="film" />
  </div>
</template>

<script setup>
import FilmCard from "@/components/FilmCard.vue";
import { searchResults } from "@/composables/searchStore";
</script>


<style scoped lang="scss">
.film-gallery {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  align-items: center;
  padding: 20px;
  margin: 5% 0;
  top: 20%;
}
</style>
