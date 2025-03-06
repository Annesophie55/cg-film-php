<template>
  <Header />
  <main>
    <h2 class="section-title">Contacter CG-Film Camargue</h2>
    <div class="contact-container">
      <div class="form-container">
        <form @submit.prevent="submitForm">
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" v-model="form.name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" v-model="form.email" required>
          </div>
          <div class="form-group">
            <label for="subject">Sujet</label>
            <input type="text" id="subject" v-model="form.subject" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" v-model="form.message" required></textarea>
          </div>

          <!-- Affichage des erreurs -->
          <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
          <p v-if="successMessage" class="success">{{ successMessage }}</p>

          <!-- Bouton avec reCAPTCHA -->
          <button type="submit" :disabled="isLoading">
            {{ isLoading ? "Envoi en cours..." : "Envoyer" }}
          </button>
        </form>
      <div class="contact-info-container">
        <div class="map-link">
          <a href="https://www.google.com/maps/dir/?api=1&destination=Rue+des+Vanelles,+13129+Salins+de+Giraud" 
            target="_blank" 
            rel="noopener noreferrer">
                <client-only><font-awesome-icon :icon="['fas', 'location-dot']" /></client-only><br>
          </a>
        </div>

        <div class="contact-info">
          <p>CG-FILM Camargue</p>
          <p>Rue des Vanelles</p>
          <p> 13129 Salins de Giraud</p>
          <p>06.81.09.94.20</p>
          <a href="mailto: cgfilm@cg-film.com">cgfilm@cg-film.com</a>   
          <ul class="social-links">
              <li>
                <a href="https://www.youtube.com/user/cgfilm13" aria-label="Lien vers le YouTube de cgfilm13">
                  <client-only><font-awesome-icon :icon="['fab', 'youtube']" /></client-only>
                </a>
              </li>
              <li>
                <a href="https://www.facebook.com/jimmy.coty.1" aria-label="Lien vers le Facebook de cgfilm13">
                  <client-only><font-awesome-icon :icon="['fab', 'facebook']" /></client-only>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/in/jimmy-paul-coti-90829b76/" aria-label="Lien vers le LinkedIn de Jimmy Paul Coti">
                  <client-only><font-awesome-icon :icon="['fab', 'linkedin']" /></client-only>
                </a>
              </li>
            </ul>
        </div>

      </div>
    </div>
      <div class="credits">
        <span>crédits : </span>
        <a href="https://fr.vecteezy.com/photos-gratuite/camargue">Camargue Banque de photos par Vecteezy</a>
      </div>
    </div>
    
  
  </main>
  <Footer />
</template>

<script setup>
import { ref } from "vue";

const form = ref({
  name: "",
  email: "",
  subject: "",
  message: "",
  recaptchaResponse: ""
});

const isLoading = ref(false);
const errorMessage = ref("");
const successMessage = ref("");

const submitForm = async () => {
  errorMessage.value = "";
  successMessage.value = "";
  isLoading.value = true;

  try {
    // Exécution reCAPTCHA
    const recaptchaToken = await grecaptcha.execute("6LfsPusqAAAAAAjf0jFFafoQlhOSZ898itopjt3B", { action: "contact" });
    form.value.recaptchaResponse = recaptchaToken;

    // Création du FormData
    const formData = new FormData();
    Object.keys(form.value).forEach((key) => formData.append(key, form.value[key]));

    // Envoi des données au serveur PHP
    const response = await fetch("http://localhost/cg-film-new/server/contact.php", {
      method: "POST",
      body: formData,
    });

    const result = await response.json();

    if (result.status === "success") {
      successMessage.value = result.message;
      form.value = { name: "", email: "", subject: "", message: "", recaptchaResponse: "" };
    } else {
      errorMessage.value = result.message || "Une erreur est survenue.";
    }
  } catch (error) {
    errorMessage.value = "Erreur lors de l'envoi du formulaire.";
  } finally {
    isLoading.value = false;
  }
};

useSeoMeta({
  title: 'Contactez-nous',
  description: 'Contactez CG-Film Camargue pour toute demande relative aux films de Jimmy-Paul Coti.',
  ogTitle: 'Contact | CG-Film Camargue',
  ogDescription: 'Pour toute demande concernant Jimmy-Paul Coti ou ses films, contactez CG-Film.',
  ogImage: '/images/logo.webp',
  twitterCard: 'summary',
})

useHead({
  link: [
    { rel: 'canonical', href: 'https://cg-film.com/contact' },
  ]
})
</script>
<style lang="scss" scoped>
  @use '@/assets/scss/pages/contact.scss';
</style>