<template>
  <nav>
    <ul  class="nav-tags">
      <li class="tag_btn" v-for="(tag, index) in tags" :key="index">
        <button @click="filterByTag(tag.name)">
        {{ tag.name }}
        </button>
      </li>
    </ul>
  </nav>
</template>

<script setup> 
  import { useFetch } from "#app";
  import { defineEmits } from "vue";

  const { data: tags } = useFetch("http://localhost/cg-film-new/server/api/tags.php", {
    transform: (res) => Array.isArray(res) ? res : [res]
  });

  const emit = defineEmits(["filterByTag"]);

  const filterByTag = (tagName) => {
    emit("filterByTag", tagName);
  };
</script>

<style scoped lang="scss">
.nav-tags {
  display: flex;
  gap: 10px;
  justify-content: start;
  padding: 20px;
}

.tag_btn {
  border-radius: 5px;
  background: rgb(12,173,161);
  background: linear-gradient(212deg, rgba(12,173,161,1) 30%, rgba(12,148,138,0.9831168356906163) 48%, rgba(14,124,139,1) 78%);
  color: var(--white);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

  button {
    padding: 5px 10px;
    border: none;
    background: none;
    color: var(--white);
    font-size: 1rem;
    cursor: pointer;
  }
}

</style>