<template>
  <footer>
      <div class="footer-top">
        <!-- Navigation rapide -->
        <div class="footer-nav">
          <h6>Navigation rapide</h6>
          <ul>
            <li class="nav-link"><nuxt-link to="/">Accueil</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/filmMaker">Le réalisateur</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/films">Films</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/featured">En vedette</nuxt-link></li>
            <li class="nav-link"><nuxt-link to="/contact">Contact</nuxt-link></li>
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

<style scoped lang="scss">
@use '@/assets/scss/components/_footer.scss';
</style>
