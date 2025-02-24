<template>
  <div class="film-gallery">
    <FilmCard v-for="film in films" :key="film.id" :film="film" />
  </div>
</template>

<script setup>
import FilmCard from "./FilmCard.vue";

// Déclaration des props en JavaScript
defineProps({
  films: Array
});
</script>

<style scoped lang="scss">
.film-gallery {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  align-items: center;
  padding: 20px;
  margin: 45px 0;
}
</style>
