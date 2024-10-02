<template>
    <div>
        <div class="input-container">
          <InputText v-model="value" disabled placeholder="D" class="small-input" />
          <InputText v-model="value" disabled placeholder="RF" class="small-input" />
        </div>
        <div class="px-1 py-1" color="indigo lighten-4">
          <div class="circle" role="button">
            <div :class="['double_arc', 'arc_top', arcColors.top]" @click="() => toggleArcColor('top')"></div>
            <div :class="['double_arc', 'arc_right', arcColors.right]" @click="() => toggleArcColor('right')"></div>
            <div :class="['double_arc', 'arc_bot', arcColors.bottom]" @click="() => toggleArcColor('bottom')"></div>
            <div :class="['double_arc', 'arc_left', arcColors.left]" @click="() => toggleArcColor('left')"></div>
            <div :class="['double_arc', 'center', centerColor]" @click="toggleCenterColor"></div>
          </div>
        </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  
  // Reactive color states
  const arcColors = ref({
    top: 'white',
    right: 'white',
    bottom: 'white',
    left: 'white',
  });
  
  const centerColor = ref('white'); // Reactive color for center
  
  // Define the color order
  const colors = ['white', 'blue', 'red'];
  
  // Toggle color for arcs
  const toggleArcColor = (position) => {
    const currentColorIndex = colors.indexOf(arcColors.value[position]);
    arcColors.value[position] = colors[(currentColorIndex + 1) % colors.length];
  };
  
  // Toggle color for the center
  const toggleCenterColor = () => {
    const currentColorIndex = colors.indexOf(centerColor.value);
    centerColor.value = colors[(currentColorIndex + 1) % colors.length];
  };
  </script>
  
  <style>
  .input-container {
    display: flex;
    flex-direction: column; /* Stack inputs vertically */
    align-items: center; /* Center align inputs */
    gap: 2px; /* Reduced space between inputs */
    /* margin-bottom: -10px; Space between inputs and circle */
  }
  
  .small-input {
    width: 50px; /* Adjust to match the circle width */
    height: 30px; /* Adjust height as needed */
  }
  
  .circle {
    position: relative;
    width: 50px; /* Match the width of inputs */
    height: 50px;
    margin: 0 auto; /* Center the circle */
    transform: rotate(45deg);
  }
  
  .double_arc {
    position: absolute;
    width: 50%;
    height: 50%;
    transition: background-color 0.2s ease-in-out;
  }
  
  .arc_top {
    top: 0;
    left: 0;
    border: 1px solid #b8bbbf;
    border-radius: 100% 0 0 0;
  }
  
  .arc_right {
    top: 0;
    right: 0;
    border: 1px solid #b8bbbf;
    border-radius: 0 100% 0 0;
  }
  
  .arc_bot {
    bottom: 0;
    right: 0;
    border: 1px solid #b8bbbf;
    border-radius: 0 0 100% 0;
  }
  
  .arc_left {
    bottom: 0;
    left: 0;
    border: 1px solid #b8bbbf;
    border-radius: 0 0 0 100%;
  }
  
  .center {
    width: 24px; /* Adjust size for better visibility */
    height: 24px;
    line-height: 24px;
    border: 1px solid #b8bbbf;
    border-radius: 50%;
    position: absolute;
    z-index: 1; /* Bring center forward */
    top: 13px; /* Centered within the circle */
    left: 13px; /* Centered within the circle */
  }
  
  .red {
    background-color: rgb(151, 55, 55);
  }
  
  .blue {
    background-color: rgb(54, 54, 201);
  }
  
  .white {
    background-color: white;
  }
  </style>
  