<script setup lang="ts">
import { ref } from 'vue'

const tableData = ref([
  { id: 1, name: 'John Doe', age: 25, vehicle: 'Volvo' },
  { id: 2, name: 'Jane Smith', age: 30, vehicle: 'BMW' },
  { id: 3, name: 'Mike Johnson', age: 35, vehicle: 'Toyota' }
])

const searchQuery = ref('')
</script>

<template>
  <main>
    <div class="table">
      <table>
        <!-- Table header -->
        <thead>
          <tr>
            <th v-for="(value, key) in tableData[0]" :key="key">{{ key }}</th>
          </tr>
        </thead>

        <!-- Table body -->
        <tbody>
          <tr v-for="(row, index) in tableData" :key="index">
            <td v-for="(value, key) in row" :key="key">{{ value }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
</template>

<style>
.table {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 25vh;
  background-color: #f2f2f2;
}

table {
  border-collapse: collapse;
  width: 100%;
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

th:hover,
tr:hover {
  background-color: #f2f2f2;
}
</style>
