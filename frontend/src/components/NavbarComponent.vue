<script setup lang="ts"></script>

<template>
  <div class="navbar">
    <div>
      <a href="#home">Home</a>
      <a href="#about">Sobre</a>
      <a href="#services">Serviços</a>
      <a href="#contact">Contato</a>
    </div>

    <img src="../assets/png/pistao.png" alt="" />
  </div>
</template>

<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.navbar {
  background-color: #333;
  overflow: hidden;
  display: flex;
  justify-content: space-around;
}

.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.navbar img {
  display: flex;
  right: 0;
  margin-right: auto;
  height: 50px; 
}
</style>
