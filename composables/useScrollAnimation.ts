import { onMounted, onUnmounted } from "vue";

export function useScrollAnimation(selector: string, offset: number = 100) {
  const handleScroll = () => {
    document.querySelectorAll(selector).forEach((element) => {
      if (element.getBoundingClientRect().top < window.innerHeight - offset) {
        element.classList.add("visible");
      }
    });
  };

  onMounted(() => {
    window.addEventListener("scroll", handleScroll);
    handleScroll(); // Exécute une fois au chargement pour éviter les flashs
  });

  onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
  });
}
