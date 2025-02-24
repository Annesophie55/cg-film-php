<template>
  <div ref="counterSection">
    <p>{{ currentNumber }}</p>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, defineProps } from "vue";

// Définition des props
const props = defineProps<{
  max: number;
  speed?: number; // Optionnel, par défaut à 50ms
}>();

// Références
const currentNumber = ref<number>(0);
const hasStarted = ref<boolean>(false); // Pour éviter plusieurs démarrages
const counterSection = ref<HTMLElement | null>(null);

onMounted(() => {
  if (counterSection.value) {
    const observer = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting && !hasStarted.value) {
        hasStarted.value = true; // Marque l'animation comme lancée
        startCounting();
        observer.disconnect(); // On arrête l'observation après lancement
      }
    }, {
      threshold: 0.5, // L'animation démarre quand 50% de l'élément est visible
    });

    observer.observe(counterSection.value);
  }
});

// Fonction de comptage
const startCounting = (): void => {
  const step: number = Math.ceil(props.max / 100);
  const interval = setInterval(() => {
    if (currentNumber.value < props.max) {
      currentNumber.value += step;
      if (currentNumber.value > props.max) {
        currentNumber.value = props.max;
      }
    } else {
      clearInterval(interval);
    }
  }, props.speed ?? 50);
};
</script>
