<script setup lang="ts">
import { ref } from 'vue'
import route from '@/router';

import LoginService from '@/services/LoginService'
import TokenService from '@/services/TokenService'

const tokenService = new TokenService()
const loginService = new LoginService(tokenService)

const email = ref('')
const password = ref('')

const handleLogin = () => {
  loginService
    .login(email.value, password.value)
    .then((response) => {
      console.log('login success')
      route.push('/home')
      
    })
    .catch((error) => {
      console.log(error)
    })
}
</script>

<template>
  <main>
    <div class="form-group">
      <div class="input-group">
        <div class="col-1">
          <div class="logo">
            <img src="../assets/png/servico-automotivo.png" alt="" />
          </div>
        </div>
        <div class="col-2">
          <div class="width-group">
            <h1 class="title-forms">Hotwells Mecanica's</h1>

            <label class="label">Email</label>
            <input
              name="email"
              id="email"
              class="input"
              autocomplete="off"
              type="email"
              v-model="email"
              placeholder="exemple@email.com"
            />
            <label class="label">Senha</label>
            <input
              name="password"
              id="password"
              class="input"
              autocomplete="off"
              type="password"
              v-model="password"
              placeholder="senha"
            />
            <div></div>
            <div class="button" @click="handleLogin">Entrar</div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style>
.form-group {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f2f2f2;
  font-family: 'Nunito', sans-serif;
  font-optical-sizing: auto;
  font-style: normal;

  .input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .title-forms {
    margin-bottom: 20px;
    font-weight: 700;
  }

  .label {
    display: flex;
    margin-bottom: 5px;
  }

  .input-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 100px;
  }

  .col-1 {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .col-2 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    .width-group {
      width: 35vh;
    }
  }

  .button {
    display: flex;
    justify-content: center;
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: none;
    border-radius: 5px;
    background-color: #000;
    color: #fff;
    cursor: pointer;
  }

  .button:active {
    background-color: #333;
    user-select: none;
  }

  img {
    width: 400px;
  }

  @media screen and (max-width: 800px) {
    img {
      width: 200px;
    }
    .input-group {
      display: grid;
      grid-template-columns: 1fr;
      gap: 5px;
    }

    h1 {
      white-space: nowrap;
    }
  }
}
</style>
