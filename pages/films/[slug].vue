<template>
  <div v-if="film">
    <h1>{{ film.title }}</h1>
    <p>{{ film.subtitle }}</p>
    <img :src="film.poster" :alt="film.title">
    <p>{{ film.description }}</p>

    <h2>Distribution</h2>
    <ul>
      <li v-for="(actor, i) in film.cast" :key="i">
        {{ actor.name }} - {{ actor.role }}
      </li>
    </ul>

    <iframe
      :src="`${film.embedUrl}?autoplay=1&controls=1&mute=0`"
      frameborder="0"
      allow="autoplay; encrypted-media"
      allowfullscreen
    ></iframe>
  </div>
  <div v-else>
    <h1>Film non trouvé</h1>
    <p>Le film demandé n'existe pas dans notre base de données.</p>
  </div>
</template>

<script setup lang="ts">
import { useRoute } from 'vue-router';
import films from '~/data/films';

// Récupérer le slug depuis l'URL
const route = useRoute();
const film = films.find(f => f.detailPage === `/films/${route.params.slug}`);
</script>
