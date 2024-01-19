<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import SidebarComponent from '@/components/SidebarComponent.vue'
import NavbarComponent from '@/components/NavbarComponent.vue'
</script>

<template>
  <main>
    <div class="grid">
      <div class="sidebar"><SidebarComponent></SidebarComponent></div>
      <div class="navbar"><NavbarComponent></NavbarComponent></div>
      <div><RouterView /></div>
    </div>
  </main>
</template>

<style>
.grid {
  display: grid;
  grid-template-columns: 1fr 10fr;
  grid-gap: 0.9375rem;
  background-color: #fff;
  color: #444;
}

.navbar {
  display: none;
}

@media (max-width: 768px) {
  .grid {
    display: grid;
    grid-template-columns: 1fr;
    grid-gap: 0.9375rem;
    background-color: #fff;
    color: #444;
  }
  .grid .sidebar {
    display: none;
  }

  .navbar {
    display: block;
  }
}
</style>
