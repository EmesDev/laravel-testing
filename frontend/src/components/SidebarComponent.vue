<script setup lang="ts"></script>

<template>

    <div id="sidebar">
      <ul>
        <li class="header-sidebar">
          <img src="../assets/png/pistao.png" alt="" srcset="" />
        </li>
      </ul>
      <ul class="content-sidebar">
        <li>
          <router-link to="/home">Inicio</router-link>
        </li>
        <li>
          <router-link to="/services">Serviços</router-link>
        </li>
        <li>
          <router-link to="/vehicles">Veiculos</router-link>
        </li>
        <li>
          <router-link to="/owners">Clientes</router-link>
        </li>
        <li>
          <router-link to="/calleds">Chamados</router-link>
        </li>
        <li>
          <router-link to="/login">Sair</router-link>
        </li>
      </ul>
    </div>

</template>

<style>
#sidebar {

  width: 250px;
  height: 100vh;
  background-color: #333;
}

#sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

#sidebar ul li {
  padding: 15px;
  text-align: center;
  border-bottom: 1px solid #444;
  color: #fff;
}

#sidebar ul li img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin: 10px 0;
}

#sidebar ul li a {
  color: #fff;
  text-decoration: none;
}

#sidebar ul li:hover {
  background-color: #444;
  cursor: pointer;
}
#sidebar ul li.header-sidebar {
  padding: 15px;
  text-align: center;
  border-bottom: 1px solid #444;
  color: #fff;
  background-color: #444;
}
</style>
