<script setup lang="ts">
 const deleteModal = () => {
  const modal = document.querySelector('.backgraund')
  if (modal) {
    modal.classList.toggle('active')
  }
}
</script>
sc

<template>
  <main>
    <div class="backgraund"></div>
  </main>
</template>

<style></style>
