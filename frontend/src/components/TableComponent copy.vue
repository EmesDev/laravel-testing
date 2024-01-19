<script setup lang="ts">
import { ref, defineProps } from 'vue'
import TokenService from '@/services/TokenService'
import PaginationService from '@/services/PaginationService'

const tokenService = new TokenService()
const paginationService = new PaginationService(tokenService)
const currentPage = ref(1)

const props = defineProps({
  tableData: { type: Array as () => any[], required: true },
  tableTitles: { type: Array, required: true }
  // bar: Number
})
const tableData = ref(JSON.parse(JSON.stringify(props.tableData)))
const tableTitles = ref(JSON.parse(JSON.stringify(props.tableTitles)))
console.log(tableTitles, 'tableComponent')
// console.log(tableData.value, 'tableComponent')

const nextPage = () => {
  currentPage.value += 1
  console.log(currentPage.value)
  paginationService.getOwners(currentPage.value).then((response) => {
    tableData.value = JSON.parse(JSON.stringify(response.data))
    console.log(tableData.value)
  })
}

const previousPage = () => {
  currentPage.value -= 1
  console.log(currentPage.value)
  paginationService.getOwners(currentPage.value).then((response) => {
    tableData.value = JSON.parse(JSON.stringify(response.data))
    console.log(tableData.value)
  })
}
</script>

<template>
  <main>
    <div class="table">
      <table>
        <!-- Table header -->
        <thead>
          <tr>
            <th v-for="(item, index) in tableTitles" :key="index">{{ index }}</th>
            <th>Actions</th>
          </tr>
        </thead>

        <!-- Table body -->
        <tbody>
          <tr v-for="(row, index) in tableData.data" :key="index">
            <td v-for="(value, key) in row" :key="key">{{ value }}</td>
            <td class="action-buttons">
              <div class="content-accion-buttons">
                <div class="delet-button">
                  <button class="button-delet">Deletar</button>
                </div>
                <div class="edit-button">
                  <button class="button-edit">Editar</button>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="pagination-controller">
        <button @click="previousPage" :disabled="currentPage === 1">Previous</button>
        <span>{{ currentPage }}</span>
        <button @click="nextPage">Next</button>
      </div>
    </div>
  </main>
</template>

<style>
.table {
  justify-content: center;
  background-color: #f2f2f2;
  font-size: smaller;
  font-family: 'Nunito', sans-serif;
  border: 1px solid #dddddd; 
}

table {
  border-collapse: collapse;
  height: auto;
}
th,
td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  background-color: #ffffff;
}

th {
  background-color: #f2f2f2;
}

th:first-child,
td:first-child {
  background-color: #ccc;
  width: 100px;
  padding-left: 8px;
  margin: 0px;
}

th:hover,
tr:hover {
  background-color: #f2f2f2;
}

.pagination-controller {
  display: flex;
  justify-content: right;
  align-items: center;
  height: 10vh;
  background-color: #f2f2f2;
  font-size: medium;
  font-family: 'Nunito', sans-serif;
}

.pagination-controller button,
.pagination-controller span {
  background-color: #f2f2f2;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: smaller;
  margin: 4px 2px;
  cursor: pointer;
}

.pagination-controller button:hover,
.pagination-controller span:hover {
  background-color: #ddd;
  color: black;
}

.pagination-controller button:disabled,
.pagination-controller span:disabled {
  background-color: #ddd;
  color: black;
}

.action-buttons {
  justify-content: center;
  align-items: center;
}

.content-accion-buttons,
.delet-button,
.edit-button {
  justify-content: center;
  align-items: center;
}

.button-delet,
.button-edit {
  background-color: #f2f2f2;
  border: none;
  color: black;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: smaller;
  margin: 4px 2px;
  cursor: pointer;
  width: 100%;
}

.button-delet:hover,
.button-edit:hover {
  background-color: #ddd;
  color: black;
}

.button-delet:disabled,
.button-edit:disabled {
  background-color: #ddd;
  color: black;
}
</style>
