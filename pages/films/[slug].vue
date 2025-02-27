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
      v-if="film.embed_url"
      :src="`${film.embed_url}?autoplay=1&controls=1&mute=0`"
      frameborder="0"
      allow="autoplay; encrypted-media"
      allowfullscreen
    ></iframe>
  </div>
  <div v-else-if="error">
    <h1>Film non trouvé</h1>
    <p>Le film demandé n'existe pas dans notre base de données.</p>
  </div>
  <div v-else>
    <p>Chargement en cours...</p>
  </div>
</template>

<script setup>
import { useRoute } from 'vue-router';
import { useFetch } from "#app";

// Récupérer le slug depuis l'URL
const route = useRoute();
const { data: film, error } = useFetch(`http://localhost/cg-film-new/server/api/film_details.php?slug=${route.params.slug}`);

</script>
