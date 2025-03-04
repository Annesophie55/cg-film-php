import { ref } from "vue";

export const searchResults = ref({ films: [] });

/**
 * 🔍 Charge **tous** les films au chargement de la page
 */
export const fetchAllFilms = async () => {
  try {
    const url = `http://localhost/cg-film-new/server/api/films_search.php`;
    console.log("🔍 Chargement des films initiaux :", url);
    
    const data = await $fetch(url);

    if (!data || !Array.isArray(data)) {
      console.warn("⚠️ Aucune donnée valide reçue !");
      searchResults.value.films = [];
      return;
    }

    searchResults.value.films = data;
    console.log("🎥 Films chargés au démarrage :", searchResults.value.films);
  } catch (error) {
    console.error("❌ Erreur lors de la récupération des films :", error);
    searchResults.value.films = [];
  }
};

/**
 * 🎯 Recherche des films en fonction d'un tag ou d'un filtre spécifique
 */
export const fetchResults = async (searchType = "general", query = "") => {
  if (!query) {
    return fetchAllFilms(); // Si pas de query, recharger tous les films
  }

  try {
    let url;
    switch (searchType) {
      case "general":
        url = `http://localhost/cg-film-new/server/api/films_search.php?query=${encodeURIComponent(query)}`;
        break;
      case "tag":
        url = `http://localhost/cg-film-new/server/api/films_search.php?tag=${encodeURIComponent(query)}`;
        break;
      default:
        console.error("🔴 Type de recherche inconnu :", searchType);
        return;
    }

    console.log(`🔍 Requête API (${searchType}):`, url);
    const data = await $fetch(url);

    if (!data || !Array.isArray(data)) {
      console.warn("⚠️ Aucune donnée valide reçue !");
      searchResults.value.films = [];
      return;
    }

    searchResults.value.films = data;
    console.log("🎥 Films stockés :", searchResults.value.films);
  } catch (error) {
    console.error("❌ Erreur lors de la récupération des résultats :", error);
    searchResults.value.films = [];
  }
};
