<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import SidebarComponent from '@/components/SidebarComponent.vue'
import TableComponent from '@/components/TableComponent.vue'
</script>

<template>
  <main>
    <SidebarComponent></SidebarComponent>
    <!-- <StatsComponent></StatsComponent> -->
    <div class="sidebar-content">
      <div class="wrapper">
        <div class="box a">a</div>
        <div class="box b">b</div>
        <div class="box c">c</div>
        <div class="box d">d</div>
      </div>

      <TableComponent></TableComponent>
    </div>
  </main>
</template>

<style>
.wrapper {
  display: grid;
  grid-template-columns: repeat(1, 1fr 1fr 1fr 1fr);
  grid-gap: 0.9375rem;
  background-color: #fff;
  color: #444;
}

.box {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #444;
  color: #fff;
  height: 100px;
  border-radius: 5px;
  padding: 20px;
  font-size: 150%;
}

.sidebar-content {
  margin-left: 250px;
  padding: 20px;
  height: 100vh;
  background-color: #f2f2f2;
  font-family: 'Nunito', sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
}
</style>
