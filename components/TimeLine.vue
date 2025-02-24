<template>
  <div class="timeline-container">
    <div class="timeline-desktop">
      <!-- Groupe d'icônes -->
      <div class="timeline-items-icon">
        <div class="timeline-icon">
          <NuxtImg src="/images/icons/icon_camera.webp" alt="Icône d'une caméra" width="90" height="90"/>
        </div>
        <div class="timeline-icon">
          <NuxtImg src="/images/icons/icon_flamme.webp" alt="Icône d'une flamme" width="90" height="90"/>
        </div>
        <div class="timeline-icon">
          <NuxtImg src="/images/icons/icon_tv.webp" alt="Icône d'une télévision" width="90" height="90"/>
        </div>
        <div class="timeline-icon">
          <NuxtImg src="/images/icons/icon_tape.webp" alt="Icône d'une cassette" width="90" height="90"/>
        </div>
        <div class="timeline-icon">
          <NuxtImg src="/images/icons/icon_clap.webp" alt="Icône d'un clap de cinéma" width="90" height="90"/>
        </div>
      </div>

      <!-- 1er groupe de ligne -->
      <div class="timeline-group-line">
        <div class="line-hidden"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line-hidden"></div>
      </div>

      <!-- Vidéo-tape -->
      <div class="video-tape-wrapper">
        <div class="video-tap_border_top"></div>
        <div class="video-tap__container">
          <div class="video-tape">
            <div class="video-tape__case case-1">
              <div class="video-tape__content"></div>
            </div>
            <div class="video-tape__case case-2">
              <div class="video-tape__content">1975</div>
            </div>
            <div class="video-tape__case case-3">
              <div class="video-tape__content">1977</div>
            </div>
            <div class="video-tape__case case-4">
              <div class="video-tape__content">1980</div>
            </div>
            <div class="video-tape__case case-5">
              <div class="video-tape__content">1982</div>
            </div>
            <div class="video-tape__case case-6">
              <div class="video-tape__content">1985</div>
            </div>
            <div class="video-tape__case case-7">
              <div class="video-tape__content"></div>
            </div>
          </div>
        </div>
        <div class="video-tap_border_bottom"></div>
      </div>

      <!-- 2ème groupe de ligne -->
      <div class="timeline-group-line">
        <div class="line-hidden"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line-hidden"></div>
      </div>

      <!-- Groupe de points à masquer sur mobile -->
      <div class="timeline-group-point hide-desktop">
        <div class="point-hidden"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point-hidden"></div>
      </div>

      <!-- Groupe d'images avec interaction (tap pour ouvrir la pop-up) -->
      <div class="timeline-group-img">
        <div class="timeline-img__container" @click="openCard(0)">
          <NuxtImg src="/images/jp_coindet.webp" alt="Photo de Jimmy-Paul Coti en 1975" width="110" height="110"/>
          <div class="laser-effect"></div>
        </div>
        <div class="timeline-img__container" @click="openCard(1)">
          <NuxtImg src="/images/canadair.webp" alt="Photo d'un canadair sur le tournage de 'L’étincelle'" width="110" height="110"/>
          <div class="laser-effect"></div>
        </div>
        <div class="timeline-img__container" @click="openCard(2)">
          <NuxtImg src="/images/partners/france_tele.webp" alt="Icone France TV" width="110" height="110"/>
          <div class="laser-effect"></div>
        </div>
        <div class="timeline-img__container" @click="openCard(3)">
          <NuxtImg src="/images/grue.webp" alt="Photo de Jimmy-Paul Coti filmant avec une grue" width="110" height="110"/>
          <div class="laser-effect"></div>
        </div>
        <div class="timeline-img__container" @click="openCard(4)">
          <NuxtImg src="/images/tournage_le_juste.webp" alt="Photo du tournage de 'Le Juste'" width="110" height="110"/>
          <div class="laser-effect"></div>
        </div>
      </div>

      <!-- 3ème groupe de ligne à masquer sur mobile -->
      <div class="timeline-group-line hide-mobile">
        <div class="line-hidden"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line-hidden"></div>
      </div>

      <!-- Groupe de points à masquer sur mobile -->
      <div class="timeline-group-point hide-mobile">
        <div class="point-hidden"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point"></div>
        <div class="point-hidden"></div>
      </div>

      <!-- Groupe de cartes à masquer sur mobile -->
      <div class="timeline-group-card hide-mobile">
        <div class="card-hidden"></div>
        <div class="card">
          <p>Jimmy-Paul Coti commence sa carrière avec "Dernière Mission", un projet ambitieux inspiré de James Bond, incluant des cascades en voiture et en moto.</p>
        </div>
        <div class="card">
          <p>Avec "L’Étincelle", Jimmy-Paul documente les incendies dévastateurs dans le sud de la France. Un film audacieux tourné aux côtés des pompiers et dans des Canadairs.</p>
        </div>
        <div class="card">
          <p>"L’Étincelle" atteint une audience nationale grâce à sa diffusion sur France 3 et TMC, établissant Jimmy-Paul comme un réalisateur engagé.</p>
        </div>
        <div class="card">
          <p>Jimmy-Paul expérimente avec des projets artistiques en Super 8, affinant son style et sa narration unique.</p>
        </div>
        <div class="card">
          <p>La collaboration avec TF1 pour "Le Juste" marque un tournant dans sa carrière, renforçant sa reconnaissance dans le cinéma.</p>
        </div>
        <div class="card-hidden"></div>
      </div>
    </div>
  </div>

  <!-- Pop-up pour mobile -->
  <div v-if="activeCard !== null" class="popup-overlay" @click.self="closeCard">
    <div class="popup-content">
      <button class="popup-close" @click="closeCard">✕</button>
      <p>{{ cards[activeCard] }}</p>
    </div>
  </div>

  <!-- Crédits -->
  <a href="https://fr.vecteezy.com/vecteur-libre/t%C3%A9l%C3%A9vision">Télévision Vecteurs par Vecteezy</a>
  <a href="https://fr.vecteezy.com/vecteur-libre/camera-video">Camera Video Vecteurs par Vecteezy</a>
  <a href="https://fr.vecteezy.com/vecteur-libre/flamme">Flamme Vecteurs par Vecteezy</a>
  <a href="https://fr.vecteezy.com/vecteur-libre/film">Film Vecteurs par Vecteezy</a>
  <a href="https://fr.vecteezy.com/vecteur-libre/clapboard">Clapboard Vecteurs par Vecteezy</a>
  <a href="https://fr.freepik.com/vecteurs-libre/fond-rideau-soie-rouge_5597360.htm#fromView=search&page=1&position=1&uuid=16b3fbe8-e362-48c7-bc63-631cf8d6b331&new_detail=true&query=rideau+th%C3%A9%C3%A2tre">Rideau de cinéma par Freepik</a>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useScrollAnimation } from "@/composables/useScrollAnimation";
useScrollAnimation(".card"); // Anime les cartes au scroll

// État pour la pop-up (null = aucune carte affichée)
const activeCard = ref<number | null>(null);

const cards = [
  "Jimmy-Paul Coti commence sa carrière avec 'Dernière Mission', un projet ambitieux inspiré de James Bond, incluant des cascades en voiture et en moto.",
  "Avec 'L’Étincelle', Jimmy-Paul documente les incendies dévastateurs dans le sud de la France. Un film audacieux tourné aux côtés des pompiers et dans des Canadairs.",
  "'L’Étincelle' atteint une audience nationale grâce à sa diffusion sur France 3 et TMC, établissant Jimmy-Paul comme un réalisateur engagé.",
  "Jimmy-Paul expérimente avec des projets artistiques en Super 8, affinant son style et sa narration unique.",
  "La collaboration avec TF1 pour 'Le Juste' marque un tournant dans sa carrière, renforçant sa reconnaissance dans le cinéma."
];

function openCard(index: number) {
  activeCard.value = index;
}

function closeCard() {
  activeCard.value = null;
}
</script>

<style scoped lang="scss">
@use '@/assets/scss/components/time-line.scss';

.hide-desktop {
  display: none;
}

/* Masquer certains éléments sur mobile (<490px) */
@media (max-width: 490px) {
  .hide-mobile {
    display: none;
  }

  .hide-desktop {
    display: flex;
  }

}

/* Effet sur les images pour inviter au tap : soulignement centré */
.timeline-img__container {
  position: relative;
  cursor: pointer;
  /* Optionnel : un petit margin horizontal pour mieux espacer si besoin */
  margin: 0 5px;
}

@media screen and (max-width: 490px) {
  .timeline-img__container {
    position: relative;
    display: inline-block;
  }

  .timeline-img__container img {
    display: block;
    position: relative;
    z-index: 1;
    margin-left: 25px;
    box-shadow: none;

  }

  /* Effet laser */
  .laser-effect {
    position: absolute;
    top: -2px;
    left: 0;
    width: 103%;
    height: 103%;
    margin-left: 10px;
    border-radius: 50%;
    background: rgb(129,129,242);
    background: linear-gradient(17deg, rgba(129,129,242,0.18735416529893212) 62%, rgba(80,151,221,0.30500122412246145) 80%, rgba(5,125,236,0.6467379188003326) 96%);
    animation: laser-animation 1s infinite;
    z-index: 0; /* Met l'effet laser derrière l'image */

  }

  /* Animation laser */
  @keyframes laser-animation {
    0%, 50% {
      transform: rotate(0deg);
    }
    50% {
      transform: rotate(180deg);  
    }
    100% {
      transform: rotate(360deg);
    }
  }
}


/* Styles pour la pop-up */
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  z-index: 1000;
}

.popup-content {
  background: #fff;
  padding: 30px;
  border-radius: 8px;
  max-width: 90%;
  max-height: 90%;
  overflow-y: auto;
  position: relative;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
  /* Pour éviter un "gros blanc", on peut aussi utiliser une couleur blanche légèrement transparante :
     background: rgba(255,255,255,0.95);
  */
}

.popup-close {
  position: absolute;
  top: 10px;
  right: 10px;
  background: transparent;
  border: none;
  font-size: 20px;
  cursor: pointer;
}

</style>
