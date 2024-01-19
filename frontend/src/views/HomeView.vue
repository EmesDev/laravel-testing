<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import SidebarComponent from '@/components/SidebarComponent.vue'
import TableComponent from '@/components/TableComponent.vue'
</script>

<template>
  <main>
    <!-- <StatsComponent></StatsComponent> -->
      <div class="wrapper">
        <div class="box a">a</div>
        <div class="box b">b</div>
        <div class="box c">c</div>
        <div class="box d">d</div>
      </div>

      <!-- <TableComponent :tableData=[name: teste]></TableComponent> -->
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

</style>
