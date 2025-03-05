<template>
  <div class="gallery">
    <!-- Grille d’images -->
    <div 
      class="gallery-item" 
      v-for="(image, index) in film.images" 
      :key="index"
      @click="openModal(index)"
    >
      <figure>
        <!-- Image miniature -->
        <NuxtImg :src="image.src" :alt="image.alt" width="100%" />
        <!-- Légende qui apparaît au survol -->
        <figcaption>
          {{ image.alt }}
        </figcaption>
      </figure>
    </div>

    <!-- Modal (lightbox) pour l’image agrandie -->
    <div 
      v-if="showModal" 
      class="modal" 
      @click.self="closeModal"
    >
      <!-- Bouton de fermeture -->
      <span class="close" @click="closeModal">&times;</span>

      <!-- Image affichée en grand -->
      <NuxtImg 
        :src="film.images[modalIndex].src" 
        :alt="film.images[modalIndex].alt"
        width="1000px"
        class="modal-content"
      />

      <!-- Légende en grand -->
      <div class="caption">
        {{ film.images[modalIndex].alt }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// On déclare la prop "film" qui doit contenir un tableau film.images
const props = defineProps({
  film: {
    type: Object,
    required: true
  }
});

// État pour le modal
const showModal = ref(false);   // modal affiché ou non
const modalIndex = ref(null);   // index de l'image en grand

// Ouvrir le modal sur l'image cliquée
function openModal(index) {
  modalIndex.value = index;
  showModal.value = true;
}

// Fermer le modal
function closeModal() {
  showModal.value = false;
  modalIndex.value = null;
}
</script>

<style scoped lang="scss">
/* 
  ---- Galerie en grille ----
*/
.gallery {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;      /* Espace entre les images */
  margin: 0 -0.5rem; /* Correction du gap sur les côtés */
}

.gallery-item {
  /* Largeur souhaitée pour chaque image.
     Exemple : 4 colonnes => calc(25% - 1rem) */
  flex: 0 1 calc(25% - 1rem);
  cursor: pointer;
  position: relative; /* Nécessaire pour le figcaption en absolu */

  @media (max-width: 768px) {
    flex: 0 1 calc(50% - 1rem);
  }

  @media (max-width: 480px) {
    flex: 0 1 calc(100% - 1rem);
  }

  figure {
    margin: 0;
    position: relative;
    overflow: hidden; /* Permet de masquer la légende qui sort du cadre */

    /* Image miniature */
    img {
      display: block;
      width: 100%;
      height: auto;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    /* Légende au survol */
    figcaption {
      position: absolute;
      left: -7px; bottom: 0;
      background-color: rgba(0,0,0,0.7);
      color: #fff;
      padding: 0.5rem;
      text-align: center;
      width: 100%; /* Largeur = 100% - 2x5px de padding */
      margin-right: 15px; /* Correction du débordement */
      opacity: 0;
      transform: translateY(100%);
      transition: all 0.3s ease-in-out;
    }


    /* Au survol de figure, on fait remonter la légende */
    &:hover figcaption {
      opacity: 1;
      transform: translateY(0);
    }
  }
}

/*
  ---- Modal (lightbox) ----
*/
.modal {
  position: fixed;
  z-index: 9999;
  left: 0; top: 0;
  width: 100%; 
  height: 100%; 
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;

  img {
    object-fit: contain;
  }
}

/* Bouton de fermeture (X) */
.close {
  position: absolute;
  top: 2rem;
  right: 2rem;
  color: #fff;
  font-size: 2rem;
  font-weight: bold;
  cursor: pointer;
  z-index: 10000; /* au-dessus de l'image */
}

/* Image en grand dans le modal */
.modal-content {
  max-width: 80%;
  max-height: 80%;
  margin: auto;
}

/* Légende dans le modal */
.caption {
  color: #fff;
  text-align: center;
  height: 3rem;
}
</style>
