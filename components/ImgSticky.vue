<template>
      <figure class="img-content">
        <NuxtImg :src="src" :alt="alt" :width="width" :height="height" class="imgSticky"/>
        <figcaption v-if="caption">{{ caption }}</figcaption>
      </figure>
</template>

<script setup>

const props = defineProps({
  src: String,
  alt: String,
  width: [String, Number], 
  height: [String, Number], 
  caption: String,
});

</script>

<style scoped lang="scss">


/* Conteneur de l’image */
.img-content {
    width: 50%;
    top: 70px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    position: sticky;
    align-self: flex-start;


  @media (max-width: 758px) {
    width: 80%;
    margin: auto;
    position: relative;
  }
}

/* Image */
.imgSticky {
  max-width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 8px;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
  margin: 0 auto;

}

/* Texte sous l’image */
figcaption {
  text-align: center;
  font-size: 14px;
  margin-top: 5px;
  opacity: 0.8;
}

/* ✅ Variante pour la bio */
.bio-content .img-content {
  margin-bottom: 40px;
}

.film-details .img-content {
  margin-bottom: 40px;
}

/* ✅ Variante pour les images en groupe */
aside {
  width: 100%;

  .img-sticky-content{
    width: 100%;
  }
}

@media (max-width:768px) {
  .imgSticky_mobile .img-content {
    position: relative;
  }
}

</style>
