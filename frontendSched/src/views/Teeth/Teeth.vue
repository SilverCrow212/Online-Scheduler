<script setup>
import { top_TopRightTeeth, top_BotRightTeeth, bot_TopRightTeeth, bot_BotRightTeeth ,top_TopLeftTeeth, top_BotLeftTeeth, bot_TopLeftTeeth, bot_BotLeftTeeth} from '@/store/teeth';
import Tooth from '@/views/Teeth/Tooth.vue';

const top_topRightStore = top_TopRightTeeth();
const top_botRightStore = top_BotRightTeeth();
const bot_topRightStore = bot_TopRightTeeth();
const bot_botRightStore = bot_BotRightTeeth();

const top_topLeftStore = top_TopLeftTeeth();
const top_botLeftStore = top_BotLeftTeeth();
const bot_topLeftStore = bot_TopLeftTeeth();
const bot_botLeftStore = bot_BotLeftTeeth();
</script>

<template>
  <div>
    <!-- <pre>{{ top_topRightStore.teeth }}</pre>  -->
    <div class="flex justify-content-center flex-wrap">
      <div class="flex-grow-1 flex align-items-center justify-content-center"> 
        <Tooth v-for="tooth in top_topRightStore.teeth" :key="tooth.id + '-top'" :tooth="tooth" />
        <Divider layout="vertical" class="p-divider-solid"/>
        <Tooth v-for="tooth in top_topLeftStore.teeth" :key="tooth.id + '-top2'" :tooth="tooth" />
      </div>
      <div class="flex-grow-1 flex align-items-center justify-content-center">
        <Tooth v-for="tooth in top_botRightStore.teeth" :key="tooth.id + '-bot'" :tooth="tooth" />
        <Divider layout="vertical" />
        <Tooth v-for="tooth in top_botLeftStore.teeth" :key="tooth.id + '-bot2'" :tooth="tooth" />
      </div>
    </div>
    <Divider layout="horizontal" class="p-0 m-0 mb-3 mt-3"/>
    <div class="flex justify-content-center flex-wrap">
      <div class="flex-grow-1 flex align-items-center justify-content-center">
        <Tooth v-for="tooth in bot_topRightStore.teeth" :key="tooth.id + '-bot'" :tooth="tooth" />
        <Divider layout="vertical" />
        <Tooth v-for="tooth in bot_topLeftStore.teeth" :key="tooth.id + '-bot2'" :tooth="tooth" />
      </div>
      <div class="flex-grow-1 flex align-items-center justify-content-center"> 
        <Tooth v-for="tooth in bot_botRightStore.teeth" :key="tooth.id + '-top'" :tooth="tooth" />
        <Divider layout="vertical" class="p-divider-solid"/>
        <Tooth v-for="tooth in bot_botLeftStore.teeth" :key="tooth.id + '-top2'" :tooth="tooth" />
      </div>
    </div>
  </div>
</template>
