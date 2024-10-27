<script setup>
import { teeth } from '@/store/teeth';
import Tooth from '@/views/Teeth/Tooth.vue';

const teethStore = teeth();
const teethData = teethStore.teethData;
// const top_topRightStore = top_TopRightTeeth();
// const top_botRightStore = top_BotRightTeeth();
// const bot_topRightStore = bot_TopRightTeeth();
// const bot_botRightStore = bot_BotRightTeeth();

// const top_topLeftStore = top_TopLeftTeeth();
// const top_botLeftStore = top_BotLeftTeeth();
// const bot_topLeftStore = bot_TopLeftTeeth();
// const bot_botLeftStore = bot_BotLeftTeeth();
</script>

<template>
  <div>
    <!-- <pre>{{ top_topRightStore.teeth }}</pre>  -->
    <div class="flex justify-content-center flex-wrap">
      <div class="flex-grow-1 flex align-items-center justify-content-center"> 
        <Tooth v-for="tooth in teethData.tbaby_rightteeth" :key="tooth.id + '-top'" :tooth="tooth" />
        <Divider layout="vertical" class="p-divider-solid"/>
        <Tooth v-for="tooth in teethData.tbaby_leftteeth" :key="tooth.id + '-top2'" :tooth="tooth" />
      </div>
      <div class="flex-grow-1 flex align-items-center justify-content-center">
        <Tooth v-for="tooth in teethData.tadult_rightteeth" :key="tooth.id + '-bot'" :tooth="tooth" />
        <Divider layout="vertical" />
        <Tooth v-for="tooth in teethData.tadult_leftteeth" :key="tooth.id + '-bot2'" :tooth="tooth" />
      </div>
    </div>
    <Divider layout="horizontal" class="p-0 m-0 mb-3 mt-3"/>
    <div class="flex justify-content-center flex-wrap">
      <div class="flex-grow-1 flex align-items-center justify-content-center">
        <Tooth v-for="tooth in teethData.badult_rightteeth" :key="tooth.id + '-bot'" :tooth="tooth" />
        <Divider layout="vertical" />
        <Tooth v-for="tooth in teethData.badult_leftteeth" :key="tooth.id + '-bot2'" :tooth="tooth" />
      </div>
      <div class="flex-grow-1 flex align-items-center justify-content-center"> 
        <Tooth v-for="tooth in teethData.bbaby_rightteeth" :key="tooth.id + '-top'" :tooth="tooth" />
        <Divider layout="vertical" class="p-divider-solid"/>
        <Tooth v-for="tooth in teethData.bbaby_leftteeth" :key="tooth.id + '-top2'" :tooth="tooth" />
      </div>
    </div>
  </div>
</template>
