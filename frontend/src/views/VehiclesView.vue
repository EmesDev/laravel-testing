<script setup lang="ts">
import { reactive, watchEffect } from 'vue'
import OwnerService from '@/services/OwnerService'
import TokenService from '@/services/TokenService'
import TableComponent from '@/components/TableComponent.vue'
import LoadingComponent from '@/components/LoadingComponent.vue'
import vehicleService from '@/services/VehicleService'

const tokenService = new TokenService()
const vehiclesService = new vehicleService(tokenService)
const state = reactive({
  tableDataResponse: [],
  tableTitles: ['ID','ID Dono', 'Marca', 'Modelo', 'Ano', 'Placa', 'Cor', 'Chassi'],
  isLoading: true
})

const populateTable = () => {
  vehiclesService.getVehicles().then((response) => {
    state.tableDataResponse = JSON.parse(JSON.stringify(response.data))
    state.tableTitles = ['ID','ID Dono', 'Marca', 'Modelo', 'Ano', 'Placa', 'Cor', 'Chassi'],// Fix the tableTitles here
    console.log(state.tableTitles, 'tableComponent')
    state.isLoading = false
  })
}

populateTable()

watchEffect(() => {
  // Check if tableDataResponse is not empty and isLoading is false
  if (state.tableDataResponse.length > 0) {
    // Force reactivity by creating a copy of the array
    state.tableDataResponse = [...state.tableDataResponse]
    state.tableTitles = state.tableTitles
  }
})
</script>

<template>
  <main>
    <div>
      <div class="title-page">
        <h1>Proprietarios</h1>
      </div>
      <div id="content">
        <template v-if="!state.isLoading">
          <div id="table">
            <div>
              <TableComponent :tableData="state.tableDataResponse" :tableTitles="state.tableTitles"></TableComponent>
            </div>
          </div>
        </template>
        <template v-else>
          <LoadingComponent> </LoadingComponent>
        </template>
      </div>
    </div>
  </main>
</template>

<style></style>
