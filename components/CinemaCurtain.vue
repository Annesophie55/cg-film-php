<template>
  <div ref="cinemaScene" class="cinema-scene">
    <div class="curtain curtain-left" :class="{ open: isRevealed }"></div>
    <div class="curtain curtain-right" :class="{ open: isRevealed }"></div>
    <h2 class="scene-title" :class="{ visible: isRevealed }">🎬 Les débuts d'un cinéaste 🎥</h2>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const isRevealed = ref(false);
const cinemaScene = ref<HTMLElement | null>(null);

onMounted(() => {
  if (cinemaScene.value) {
    const observer = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting) {
        isRevealed.value = true;
        observer.disconnect(); // Stop l'observation après ouverture
      }
    }, { threshold: 0.3 });

    observer.observe(cinemaScene.value);
  }
});
</script>

<style scoped lang="scss">
.cinema-scene {
  position: relative;
  width: 100%;
  height: 180px;
  background-color: black;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.scene-title {
  position: absolute;
  color: white;
  font-size: 2rem;
  text-align: center;
  opacity: 0;
  transform: translateY(-50px);
  font-family: var(--font-secondary-bold-italic);
  transition: opacity 1.5s ease-in-out, transform 1.5s ease-in-out;
}

.scene-title.visible {
  opacity: 1;
  transform: translateY(0);
}

/* 🎭 Rideaux avec images */
.curtain {
  position: absolute;
  width: 50%;
  height: 100%;
  background-size: cover;
  background-position: center;
  top: 0;
  z-index: 2;
  transition: transform 2.5s ease-in-out;
}

.curtain-left {
  left: 0;
  background-image: url('/images/rideau.webp'); /* Image rideau gauche */
  transform: translateX(0);
}

.curtain-right {
  right: 0;
  background-image: url('/images/rideau.webp'); /* Image rideau droit */
  transform: translateX(0);
}

/* Effet d'ouverture */
.open.curtain-left {
  transform: translateX(-100%);
}

.open.curtain-right {
  transform: translateX(100%);
}
</style>
