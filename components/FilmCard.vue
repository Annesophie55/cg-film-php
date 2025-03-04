<template>
  <div class="film-card" v-if="film && film.title">
    <div class="film-card__wrapper">
      <div class="film-card__image">
        <NuxtLink :to="film.slug" v-if="film.slug">
          <NuxtImg :src="film.poster" :alt="film.title" width="220" loading="lazy" :provider="null"/>
        </NuxtLink>
      </div>
      <div class="film-card__details">
        <div class="film-card__content">
          <h3>{{ film.title }}</h3>
          <p>Sortie : {{ film.release_date || "Date inconnue" }}</p>
          <div class="film-card__description">
            <p>{{ film.description }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="film-card__footer">
      <div class="film-card__cta">
        <NuxtLink v-if="film.slug" :to="film.slug" class="btn-discover">
          Voir la fiche
        </NuxtLink>

        <a v-if="film.embed_url" :href="film.embed_url" target="_blank" class="btn-watch">
          Bande-annonce
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  film: Object
});
</script>

<style scoped lang="scss">
@use '@/assets/scss/components/film-card.scss';
</style>