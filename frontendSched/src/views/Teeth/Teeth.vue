<script setup>
import { ref } from 'vue';
import Tooth from '@/views/Teeth/Tooth.vue';

const teeth = ref([1, 2, 3, 4, 5]); 
const teeth2 = ref([1, 2, 3, 4, 5,6,7,8]); 
</script>

<template>
  <div class="flex justify-content-center flex-wrap">
    <div class="flex-grow-1 flex align-items-center justify-content-center"> 
      <Tooth v-for="tooth in teeth" :key="tooth" />
      <Divider layout="vertical" class="p-divider-solid"/>
      <Tooth v-for="tooth in teeth" :key="tooth" />
    </div>
    <div class="flex-grow-1 flex align-items-center justify-content-center">
      <Tooth v-for="tooth in teeth2" :key="tooth" />
      <Divider layout="vertical" />
      <Tooth v-for="tooth in teeth2" :key="tooth" />
    </div>
  </div>
  <Divider layout="horizontal" />
  <div class="flex justify-content-center flex-wrap">
    <div class="flex-grow-1 flex align-items-center justify-content-center">
      <Tooth v-for="tooth in teeth2" :key="tooth" />
      <Divider layout="vertical" />
      <Tooth v-for="tooth in teeth2" :key="tooth" />
    </div>
    <div class="flex-grow-1 flex align-items-center justify-content-center"> 
      <Tooth v-for="tooth in teeth" :key="tooth" />
      <Divider layout="vertical" class="p-divider-solid"/>
      <Tooth v-for="tooth in teeth" :key="tooth" />
    </div>
  </div>
  
</template>
