<template>
  <div class="video-carousel">
    <p v-if="pending">Chargement des vidéos...</p>
    <p v-if="error">Erreur lors du chargement des vidéos.</p>

    <div 
      v-for="(film, index) in films" 
      :key="film.id" 
      class="video-container"
      :class="{ active: index === currentIndex }"
    >
      <iframe
        :src="`${film.videos[0].embedUrl}?autoplay=1&controls=0&mute=1&start=10&end=40&rel=0&loop=1&playlist=${film.videos[0].videoId}`"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>

      <div class="film-info">
        <h2>{{ film.title }}</h2>
        <p>{{ film.subtitle }}</p>
        <NuxtLink :to="film.detailPage" class="btn-discover">Découvrir</NuxtLink>
      </div>
    </div>

    <button class="nav-button prev" @click="prevSlide">❮</button>
    <button class="nav-button next" @click="nextSlide">❯</button>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { useFetch } from "#app";

// ✅ **Ne récupérer que les films ayant au moins une vidéo YouTube dès la requête API**
const { data: films, pending, error } = useFetch('/api/films?videoType=youtube');

// ✅ **Gestion du carrousel**
const currentIndex = ref(0);
let intervalId = null;

const nextSlide = () => { currentIndex.value = (currentIndex.value + 1) % films.value.length; };
const prevSlide = () => { currentIndex.value = (currentIndex.value - 1 + films.value.length) % films.value.length; };

onMounted(() => { intervalId = setInterval(nextSlide, 30000); });
onUnmounted(() => { clearInterval(intervalId); });
</script>



<style scoped>
.video-carousel {
  width: 100vw;
  height: 100%;
  position: relative;
}

.video-container {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.8s ease-in-out;
}

.video-container.active {
  opacity: 1;
}

.video-container iframe {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Animation de transition */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.8s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}

.film-info {
  position: absolute;
  left: 5%;
  bottom: 20%;
  background: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 20px;
  border-radius: 5px;
  text-align: left;
  opacity: 0;
  transition: all 0.8s ease-in-out;
}

.video-container.active .film-info {
  opacity: 1;
}

.btn-discover {
  display: inline-block;
  margin-top: 10px;
  background: linear-gradient(212deg, rgba(12, 173, 161, 1) 30%, rgba(12, 148, 138, 0.98) 48%, rgba(14, 124, 139, 1) 78%);
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
}

.btn-discover:hover {
  background: #087f7d;
}

/* Boutons de navigation */
.nav-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  font-size: 24px;
}

.nav-button:hover {
  background: rgba(0, 0, 0, 0.8);
}

.prev {
  left: 10px;  /* Positionne le bouton à gauche */
}

.next {
  right: 10px; /* Positionne le bouton à droite */
}
</style>
