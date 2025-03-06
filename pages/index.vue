<template>
  <div>
    <!-- Appelle ton Header ici -->
    <Header />

    <!-- Contenu de la page d'accueil -->
    <main class="homepage">
      <section class="carrousel">
        <Carrousel />
      </section>

      <!-- Section fictive pour tester -->
      <section class="about-container">
        <h2 class="section-title">Présentation du réalisateur</h2>
        <div class="about">
          <div class="photo">
            <NuxtImg src="/images/portrait.webp" alt="Photo de Jimmy-Paul Coti" width="280" priority />
          </div>
          <div class="citation">
            <blockquote>
              "Ajouter une citation de Jimmy-Paul Coti ici"
              <br>
              <cite><strong>Jimmy-Paul Coti</strong></cite>
            </blockquote>
            <button type="button">      
              <nuxt-link to="/filmMaker">En savoir plus sur le parcours du réalisateur</nuxt-link>
            </button>
          </div>
        </div>
      </section>

      <section class="films">
        <h2 class="section-title">Les œuvres de Jimmy-Paul Coti</h2>
        <div class="film-cards" v-if="films && films.length">
          <FilmCard 
            v-for="film in films" 
            :key="film.film_id" 
            :film="film" 
          />
        </div>

        <p v-else>Chargement des films...</p>
        <NuxtLink to="/allFilms" class="btn-translucide">
        Accéder à la filmographie complète
        </NuxtLink>
      </section>

      <section class="impact">
        <h2 class="section-title">L'impact de Jimmy-Paul Coti</h2>
        <div>
            <ul class="impact-container">
              <li>
                <ul class="impact-items">
                  <li class="impact-nb"><NumberCounter :max="49" :step="1" :speed="20" /></li>
                  <li class="impact-icon"><client-only><font-awesome-icon :icon="['fas', 'clapperboard']" /></client-only></li>
                  <li class="impact-title">Films réalisés</li>
                </ul>
              </li>
              <hr>
              <li>
                <ul class="impact-items">
                  <li class="impact-nb"><NumberCounter :max="1165" :step="4" :speed="20" /></li>
                  <li class="impact-icon"><client-only><font-awesome-icon :icon="['fas', 'tv']" /></client-only></li>
                  <li  class="impact-title">Diffusions TV dans le monde</li>
                </ul>
              </li>
              <hr>
              <li>
                <ul  class="impact-items">
                  <li class="impact-nb"><NumberCounter :max="3280" :step="11" :speed="20" /></li>
                  <li class="impact-icon"><client-only><font-awesome-icon :icon="['fas', 'clock']" /></client-only></li>
                  <li class="impact-title">Minutes de film argentique</li>
                </ul>
              </li>
            </ul>
        </div>
      </section>

      <section>
        <Parallax backgroundImg="/images/ULM.webp" />
      </section>


      <section class="partners">
        <h2 class="section-title">Un regard sur Jimmy-Paul Coti</h2>
        <div class="partners-container">
            <div class="partners-text">
              <h3>Rolande GAYET – <strong>Productrice exclusive</strong></h3>
              <p>J’ai rencontré pour la première fois <strong>Jimmy-Paul COTI </strong>à Salon de Provence, lors de la présentation de son film L’ETINCELLE. Il s’appelait à l’époque Jean-Pierre Coindet. Dans ce film il traitait le sujet des incendies de forêts dans le sud de la France et venait de recevoir la coupe du meilleur film, remise par le maire de Cannes à l’occasion du <strong>festival de l’Union Régionale des Cinéastes de Courts-Métrages</strong>.</p>
              <p>Il avait tourné son film en Super/8 et pourtant j’avais été impressionnée par la qualité de ses images.Dans sa façon de transformer ce documentaire en fiction, j’avais pu appréhender sa forte personnalité.De toute évidence, <strong>j’étais en présence d’un artiste</strong> en train de se construire.</p>
              <p>Jimmy voulait dire tant de choses dans ses films et parlait de ses projets avec tant d’enthousiasme, de conviction, que j’ai eu envie de le suivre et de l’épauler dans sa quête d’absolu.</p>

              <p><strong>Rolande GAYET</strong></p>

            </div>
              <div class="partners-img-wrapper">
                <figure class="partners-img">
                  <NuxtImg src="/images/rolande_gayet.webp" alt="Logos des partenaires" width="500" height="400" />
                  <figcaption>Rolande Gayet en forêt lors d’un tournage</figcaption>
                </figure>

            </div>
        </div>
      </section>

      <section>
        <h2 class="section-title">Partenaires & Co-productions CG-FILM</h2>
        <Banderole />
      </section>
    </main>

    <Footer />
  </div>
</template>

<script setup>
import Header from '~/components/Header.vue';
import Footer from '~/components/Footer.vue';
import Carrousel from '~/components/Carrousel.vue';
import Gallery from '~/components/Gallery.vue';
import Banderole from '~/components/Banderole.vue';
import Parallax from '~/components/Parallax.vue';
import NumberCounter from '~/components/NumberCounter.vue';
import { useFetch } from '#app';

// Fetch des films
const { data: films, refresh } = useFetch('http://localhost/cg-film-new/server/api/films_card.php', {
  key: 'home-films'
});

onMounted(() => {
  refresh();
});

useSeoMeta({
  title: 'Accueil',
  description: 'Découvrez les films et documentaires du réalisateur Jimmy-Paul Coti, spécialiste d\'aventures humaines exceptionnelles.',
  ogTitle: 'CG-Film Camargue | Jimmy-Paul Coti - Accueil',
  ogDescription: 'Découvrez les œuvres exceptionnelles de Jimmy-Paul Coti.',
  ogImage: '/images/portrait.webp',
  twitterCard: 'summary_large_image',
})



console.log(films);

</script>

<style scoped lang="scss">
@use '@/assets/scss/pages/index.scss';
</style>
