<template>
  <footer>
      <div class="footer-top">
        <!-- Navigation rapide -->
        <div class="footer-nav">
          <h6>Navigation rapide</h6>
          <ul>
            <li class="nav-link"><nuxt-link to="/">Accueil</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/filmMaker">Le réalisateur</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/allFilms">Films</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/featured">En vedette</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/contact">Contact</nuxt-link></li>
            <!-- Menu dossier de presse -->
            <li class="nav-link press-kit-button">
              <button @click="toggleDropdown">📂 Dossier de presse</button>
              <ul v-if="dropdownOpen" class="dropdown">
                <li v-for="(pdf, index) in pdfUrls" :key="index">
                  <a :href="pdf.url" target="_blank">{{ pdf.name }}</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>



        <!-- Contact -->
        <div class="footer-contact">
          <h6>Contact</h6>
          <ul>
            <li>CG FILM Camargue</li>
            <li>
              <a href="mailto:cgfilm@cg-film.com">cgfilm@cg-film.com</a>
            </li>
            <li>Rue des Vanelles</li>
            <li>13129 Salins de Giraud</li>
            <li>06 81 09 34 20</li>
          </ul>
        </div>

        <!-- Réseaux sociaux -->
        <div class="footer-social">
          <h6>Suivez-nous</h6>
          <ul>
            <li>
              <a
                href="https://www.youtube.com/user/cgfilm13"
                aria-label="Lien vers le Youtube de cgfilm13"
              >
              <client-only>
                <font-awesome-icon :icon="['fab', 'youtube']" />
              </client-only>
              </a>
            </li>
            <li>
              <a
                href="https://www.facebook.com/jimmy.coty.1"
                aria-label="Lien vers le Facebook de cgfilm13"
              >
              <client-only>
                <font-awesome-icon :icon="['fab', 'facebook']" />
              </client-only>
              </a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/in/jimmy-paul-coti-90829b76/"
                aria-label="Lien vers le Linkedin de Jimmy Paul Coti"
              >
              <client-only>
                <font-awesome-icon :icon="['fab', 'linkedin']" />
              </client-only>
              </a>
            </li>
          </ul>
        </div>
                <!-- Logo -->
        <div class="footer-logo">
          <nuxt-link to="/" class="logo">
            <NuxtImg src="/images/logo.webp" alt="Logo de cgfilm13" width="150" priority />
          </nuxt-link>
        </div>
      </div>

      <!-- Crédits -->
      <div class="footer-credits">
        <p>&copy; 2025 CG-Film. Tous droits réservés.</p>
      </div>
  </footer>
</template>

<script setup>
import { ref } from 'vue';

const dropdownOpen = ref(false);

const toggleDropdown = () => {
  dropdownOpen.value = !dropdownOpen.value;
};

const pdfUrls = [
  { name: 'Dossier de presse 1', url: '/images/presse/dossier-presse_1.pdf' },
  { name: 'Dossier de presse 2', url: '/images/presse/dossier-presse_2.pdf' },
  { name: 'Dossier de presse 3', url: '/images/presse/dossier-presse_3.pdf' },
  { name: 'Dossier de presse 4', url: '/images/presse/dossier-presse_4.pdf' },
  { name: 'Dossier de presse 5', url: '/images/presse/dossier-presse_5.pdf' },
  { name: 'Dossier de presse 6', url: '/images/presse/dossier-presse_6.pdf' },
  { name: 'Dossier de presse 7', url: '/images/presse/dossier-presse_7.pdf' },
  { name: 'Dossier de presse 8', url: '/images/presse/dossier-presse_8.pdf' },
  { name: 'Dossier pages 1-20', url: '/images/presse/DOSSIER-PAGES-1-20.pdf' },
  { name: 'Dossier pages 21-40', url: '/images/presse/DOSSIER-PAGES-21-40.pdf' },
  { name: 'Dossier pages 41-60', url: '/images/presse/DOSSIER-PAGES-41-60.pdf' },
  { name: 'Dossier pages 61-71', url: '/images/presse/DOSSIER-PAGES-61-71.pdf' },
];
</script>

<style scoped lang="scss">
@use '@/assets/scss/components/_footer.scss';

.press-kit-button {
  position: relative;
  button {
    background-color: #0caca1;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;

    &:hover {
      background-color: #098b84;
    }
  }

  .dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    padding: 10px;
    list-style: none;
    z-index: 1000;
    display: flex;

    li {
      margin-bottom: 5px;
      width: 90px;

      a {
        color: #333;
        text-decoration: none;
        &:hover {
          text-decoration: underline;
        }
      }
    }
  }
}
</style>
