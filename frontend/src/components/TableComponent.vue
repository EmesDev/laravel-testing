<script setup lang="ts">
import { ref, defineProps } from 'vue'
import TokenService from '@/services/TokenService'
import PaginationService from '@/services/PaginationService'
import DeleteModalComponent from '@/components/DeleteModalComponent.vue'

const tokenService = new TokenService()
const paginationService = new PaginationService(tokenService)
const currentPage = ref(1)

const props = defineProps({
  tableData: { type: Array as () => any[], required: true },
  tableTitles: { type: Array as () => any[], required: true }
  // bar: Number
})

const tableData = ref(JSON.parse(JSON.stringify(props.tableData)))
const tableTitles = ref(JSON.parse(JSON.stringify(props.tableTitles)))

const nextPage = (path: string) => {
  currentPage.value += 1
  console.log(currentPage.value)
  paginationService.paginate(currentPage.value, path).then((response) => {
    tableData.value = JSON.parse(JSON.stringify(response.data))
    console.log(tableData.value)
  })
}

const previousPage = (path: string) => {
  currentPage.value -= 1
  console.log(currentPage.value)
  paginationService.paginate(currentPage.value, path).then((response) => {
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
            <th v-for="(value, key) in tableTitles" :key="key">{{ value }}</th>
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
        <button @click="previousPage(tableData.path)" :disabled="currentPage === 1">
          Previous
        </button>
        <span>{{ currentPage }}</span>
        <button @click="nextPage(tableData.path)">Next</button>
      </div>
    </div>

    <!-- <div>
      <div class="delete-modal-bg"></div>
      <div class="deleteModal">
        <div class="delete-modal-header">
          <h1>Deletar</h1>
          <button>X</button>
        </div>
        <div class="delete-modal-content">
          <p>Tem certeza que deseja deletar?</p>
        </div>
        <div class="delete-modal-footer">
          <div class="delete-modal-buttons">
            <button class="button-delet">Deletar</button>
            <button class="button-edit">Cancelar</button>
          </div>
          
        </div>
      </div>
    </div> -->
  </main>
</template>

<style>
.delete-modal-bg {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.5);

  
}

.deleteModal button{
  /* background-color: #f2f2f2; */
  border: none;
  color: black;
  padding: 10px 20px;
  text-decoration: none;
  font-size: smaller;
  margin: 4px 2px;
  cursor: pointer;


}


.deleteModal {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 101;
  width: 50vw;
  height: 50vh;
  background-color: #f2f2f2;
  transform: translate(-50%, -50%);
}

.delete-modal-header{
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 7vh;
  background-color: #f2f2f2;
  font-size: x-large;
  font-family: 'Nunito', sans-serif; 
  padding: 0 20px 0 20px;

}
.delete-modal-content{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 30vh;
  
  padding: 0 20px 0 20px;
  

}




table {
  border-collapse: collapse;
  background-color: #f2f2f2;
  width: 100%;
}

th,
td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
}
th {
  text-transform: uppercase;
}

td:nth-child(2) {
  white-space: calc(50%);
}

@media screen and (max-width: 768px) {
  table,
  thead,
  tbody,
  th,
  td,
  tr {
    display: block;
  }

  thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  tr {
    border: 1px solid #ccc;
  }

  td {
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
  }

  td:before {
    position: absolute;
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
    font-weight: bold;
  }

  td,
  th {
    border: none;
  }

  td:before {
    text-transform: uppercase;
    font-weight: bold;
  }
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
