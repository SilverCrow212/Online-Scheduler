<template>
    <div>
      <div class="legend">
        <div class="cell">Legend 1</div>
        <div class="cell">Legend 2</div>
      </div>
      <div class="teeth-area" @click="handleClick">
        <div
          v-for="tooth in teeth"
          :key="tooth.id"
          class="tooth"
          @click.stop="selectTooth(tooth.id)"
        >
          {{ tooth.number }}
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  const teeth = ref([
    { id: 1, number: '1' },
    { id: 2, number: '2' },
    { id: 3, number: '3' },
    { id: 4, number: '4' },
    { id: 5, number: '5' },
    { id: 6, number: '6' },
    { id: 7, number: '7' },
    { id: 8, number: '8' },
    
  ]);
  
  const handleClick = () => {
    
    console.log("Chart area clicked");
  };
  
  const selectTooth = (id) => {
    
    console.log(`Tooth ${id} clicked`);
  };
  </script>
  
  <style>
  .legend {
    display: flex;
  }
  .cell {
    flex: 1;
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
  }
  .teeth-area {
    display: grid;
    grid-template-columns: repeat(8, 1fr); 
  }
  .tooth {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
    cursor: pointer;
  }
  </style>
  