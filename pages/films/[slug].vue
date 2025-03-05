<template>
  <Header />
  <main>
    <section>
      <div ref="cinemaScene" class="cinema-scene">
        <div class="curtain curtain-left" :class="{ open: isRevealed }"></div>
        <div class="curtain curtain-right" :class="{ open: isRevealed }"></div>
        <h1 class="film-title"  :class="{ visible: isRevealed }">{{ film.title }}</h1>
      </div>
    </section>
    <section>
      <div class="film-details">
        <div class="info_cast_release">
        <p class="description">{{ film.description }}</p>
        <hr>
        <p class="release_date"> <strong>Date de sortie :</strong> {{ film.release_date }}</p>
        <hr>
        <div class="cast_container">
          <p><strong>Distribution : </strong></p>
          <ul class="cast">
            <li v-for="(actor, i) in film.cast" :key="i" class="actor">
              {{ actor.name }} - {{ actor.role }}
            </li>
          </ul>
        </div>
      </div>
      <ImgSticky 
        :src="film.poster" 
        :alt="film.title" 
        :width="400" 
        :height="600" 
        class="imgSticky_desktop"
      />
      </div>
     
    </section>
    <hr>
    <section>
      <div class="trailer">
        <iframe
          v-if="film.video_src"
          :src="`${film.video_src}?autoplay=1&controls=1&mute=0`"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen title="Trailer" width="100%"
        ></iframe>
      </div>
    </section>
    <hr>
    <section>
      <div class="synopsis">
        <p>{{ film.synopsis }}</p>
      </div>
    </section>
    <hr>
    <section class="gallery_container">
     <SlideShowGallery :film="film" v-if="film"/>
    </section>

  </main> 
  <Footer />
</template>

<script setup>
import { useRoute } from 'vue-router';
import { ref, watchEffect, onMounted } from 'vue';
import { useFetch } from "#app";
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import SlideShowGallery from '../components/SlideShowGallery.vue';
import ImgSticky from '../components/ImgSticky.vue';

const route = useRoute();
const film = ref(null);
const error = ref(null);

  const { data } = await useFetch(`http://localhost/cg-film-new/server/api/film_details.php?slug=${route.params.slug}`);
  
  if (data.value) {
    film.value = data.value;
  } else {
    error.value = "Erreur lors de la récupération des données";
  }

// Charger les données dès l'affichage
watchEffect(() => {
  console.log("Slug envoyé à l'API :", route.params.slug);
});

//animation rideaux titre film
const isRevealed = ref(false);

onMounted(() => {
  setTimeout(() => {
        isRevealed.value = true;
      }
    , { threshold: 0.3 });});

</script>



<style scoped lang="scss">
  @use '@/assets/scss/pages/film.scss';
</style>