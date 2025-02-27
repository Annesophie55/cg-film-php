<template>
  <div class="banderole">
    <div class="banderole-track">
      <div class="banderole-container">
        <div class="banderole-content" v-for="(partner, index) in partners" :key="index">
          <NuxtImg :src="partner.logo" :alt="partner.image_alt" width="150" :provider="null"/>
        </div>
      </div>
      <!-- Clone pour effet infini -->
      <div class="banderole-container">
        <div class="banderole-content" v-for="(partner, index) in partners" :key="'clone-' + index">
          <NuxtImg :src="partner.logo" :alt="partner.image_alt" width="150" :provider="null" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useFetch } from "#app";

const { data: partners } = useFetch('http://localhost/cg-film-new/server/api/partners.php', {
  transform: (res) => Array.isArray(res) ? res : [res] // Force en tableau si besoin
});

</script>



<style scoped lang="scss">
.banderole {
  overflow: hidden;
  width: 100%;
  background-color: #f8f8f8;
  padding: 20px 0 60px 0;
}

.banderole-track {
  display: flex;
  width: 200%; /* Pour l'effet infini */
  animation: marquee 15s linear infinite;
}

.banderole-container {
  display: flex;
  align-items: center;
  gap: 30px;
  flex-shrink: 0; /* Empêche la réduction */
  white-space: nowrap;
}

.banderole-content {
  width: 150px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #ffffff;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Animation pour le défilement */
@keyframes marquee {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-50%);
  }
}
</style>
