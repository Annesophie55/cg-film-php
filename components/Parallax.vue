<template>
  <div class="parallax-container">
    <div :style="{ backgroundImage: `url('${backgroundImg}')` }" class="bg-container">
  </div>
  </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue";

const props = defineProps<{
  backgroundImg: string;
}>();


</script>

<style scoped lang="scss">
.parallax-container {
  position: relative;
  width: 100%;
  height: 200px;
  overflow: hidden;
}

.bg-container {
 background-position: center;
 background-attachment: fixed;
  background-size: cover;
  background-repeat: no-repeat;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

</style>
