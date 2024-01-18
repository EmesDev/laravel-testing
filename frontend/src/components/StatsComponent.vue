<script setup lang="ts"></script>

<template>
  <main>
    <div id="card">
      <div id="stats_graph">
        <h1>Gráfico de Estatísticas</h1>
        <div id="chart">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>
  </main>
</template>

<style>
#card {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f2f2f2;
}

#stats_graph {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}

#chart {
  width: 80%;
  height: 80%;
}

#myChart {
  width: 100%;
  height: 100%;
}

h1 {
  margin-bottom: 20px;
}

.chart {
  width: 100%;
  height: 100%;
}

.chart canvas {
  width: 100%;
  height: 100%;
}
</style>
