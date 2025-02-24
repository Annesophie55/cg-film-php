<template>
  <div class="film-card" v-if="film">
    <div class="film-card__wrapper">
      <div class="film-card__image">
        <NuxtLink :to="film.detailPage">
          <NuxtImg :src="film.poster" :alt="film.title" width="220" loading="lazy"/>
        </NuxtLink>
      </div>
      <div class="film-card__details">
        <div class="film-card__content">
          <h3>{{ film.title }}</h3>
          <p>Sortie : {{ film.releaseDate }}</p>
          <div class="film-card__description">
          <p>{{ film.description }}</p>
        </div>
        </div>
      </div>
    </div>
    <div class="film-card__footer">
      <div class="film-card__cta">
      <NuxtLink v-if="film.detailPage" :to="film.detailPage" class="btn-discover">
        Voir la fiche
      </NuxtLink>
      <NuxtLink v-if="film.videos && film.videos.some(video=>video.videoType === 'youtube')" :to="film.videos.find(video=>video.embedUrl)" class="btn-watch">
        Bande-annonce
      </NuxtLink>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { Film } from "@/api/films"; // ✅ Import de l'interface Film

defineProps<{ film: Film }>(); // ✅ Typage strict de la prop `film`
</script>


<style scoped lang="scss">
@use '@/assets/scss/components/film-card.scss';
</style>