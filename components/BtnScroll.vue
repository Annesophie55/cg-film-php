<template>
  <button class="btn-scroll" @click="scrollToNextSection">
    <span class="btn-scroll__icon">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="feather feather-chevron-down"
      >
        <polyline points="6 9 12 15 18 9"></polyline>
      </svg>
    </span>
    <span class="btn-scroll__text">{{ btnContent }}</span>
  </button>
</template>

<script setup lang="ts">
import { defineProps } from "vue";
//Variables pour la section à scroller
const props = defineProps<{
  sectionToScroll: string;
  btnContent: string;
}>();

// Typage de la fonction scrollToNextSection
const scrollToNextSection = (): void => {
  const nextSection = document.querySelector<HTMLElement>(props.sectionToScroll);
  if (nextSection) {
    nextSection.scrollIntoView({ behavior: "smooth" });
  }
};
</script>

<style scoped lang="scss">
  .btn-scroll{
  position: absolute;
  bottom: 5%;
  left: 50%;
  transform: translateX(-50%);
  border: none;
  background-color: transparent;
  cursor: pointer;
  font-size: 18px;
  color: var(--gray-light);
  display: flex;
  flex-direction: column-reverse;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease-in-out;
  z-index: 2;

  .btn-scroll__icon{
    padding: 5px;
    border-radius: 50%;
    background-color: #087f7d;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;

    &:hover{
      background: #087f7d;
      color: var(--white);
      transform: scale(1.1);
  }

    svg{
      transform: scale(1.5);
    }
  }

  .btn-scroll__text{
    padding: 10px 20px;
    font-family: var(--font-secondary);
  }
}
</style>