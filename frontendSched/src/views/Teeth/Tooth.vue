<script setup>
import { ref, defineProps, onMounted, watch } from 'vue';
import {toothCondition, toothTreatment} from '@/store/choices';

const toothConditionStore = toothCondition();
const toothTreatmentStore = toothTreatment();
const conditionChoices = toothConditionStore.legend;
const treatmentChoices = toothTreatmentStore.legend;
// Define props
const props = defineProps({
  tooth: {
    type: Object,
    required: true
  }
});

// Reactive color states
const arcColors = ref({
  top: 'white',
  right: 'white',
  bottom: 'white',
  left: 'white',
});

// Center color
const centerColor = ref('white');

// Define the color order
const colors = ['white', 'blue', 'red'];

// Initialize colors from props.tooth.class
onMounted(() => {
  props.tooth.class.forEach(item => {
    const [position, color] = item.split(':');
    if (arcColors.value.hasOwnProperty(position)) {
      arcColors.value[position] = color; // Set arc color
    } else if (position === 'center') {
      centerColor.value = color; // Set center color
    }
  });
});

// Function to toggle arc color and update class
const toggleArcColor = (position) => {
  const currentColorIndex = colors.indexOf(arcColors.value[position]);
  const newColor = colors[(currentColorIndex + 1) % colors.length];
  arcColors.value[position] = newColor;

  // Update the class array in the store
  updateClassArray(position, newColor);
};

// Toggle color for the center
const toggleCenterColor = () => {
  const currentColorIndex = colors.indexOf(centerColor.value);
  const newColor = colors[(currentColorIndex + 1) % colors.length];
  centerColor.value = newColor;

  // Update the center color in the class array
  updateClassArray('center', newColor);
};

// Function to update class array in the store
const updateClassArray = (position, color) => {
  const classIndex = props.tooth.class.findIndex(c => c.startsWith(position));
  if (classIndex === -1) {
    props.tooth.class.push(`${position}:${color}`);
  } else {
    props.tooth.class[classIndex] = `${position}:${color}`;
  }
};

// Watch for changes in arcColors and centerColor to keep class array updated
watch([arcColors, centerColor], () => {
  updateClassArray('top', arcColors.value.top);
  updateClassArray('right', arcColors.value.right);
  updateClassArray('bottom', arcColors.value.bottom);
  updateClassArray('left', arcColors.value.left);
  updateClassArray('center', centerColor.value);
});

const treatmentDialog = ref(false)
const conditionDialog = ref(false)
const user_details = JSON.parse(localStorage.getItem('user_details'));
</script>

<template>
  <!-- {{ conditionChoices }} -->
  <div>
    <div class="input-container">
      <Button @click="treatmentDialog=true" severity="secondary" :label="conditionChoices.find(choice => choice.id === tooth.topBox)?.key" class="small-input" :disabled="user_details.user_type === 'user'"/>
      <Button @click="conditionDialog=true" severity="secondary" :label="conditionChoices.find(choice => choice.id === tooth.botBox)?.key" class="small-input" :disabled="user_details.user_type === 'user'"/>

    </div>
    <div class="px-1 py-1" color="indigo lighten-4">
      <div class="circle" role="button">
        <div :class="['double_arc', 'arc_top', arcColors.top]" @click="user_details.user_type !== 'user' ? toggleArcColor('top') : null"></div>
        <div :class="['double_arc', 'arc_right', arcColors.right]" @click="user_details.user_type !== 'user' ? toggleArcColor('right') : null"></div>
        <div :class="['double_arc', 'arc_bot', arcColors.bottom]" @click="user_details.user_type !== 'user' ? toggleArcColor('bottom') : null"></div>
        <div :class="['double_arc', 'arc_left', arcColors.left]" @click="user_details.user_type !== 'user' ? toggleArcColor('left') : null"></div>
        <div :class="['double_arc', 'center', centerColor]"  @click="user_details.user_type !== 'user' ? toggleCenterColor() : null"></div>
      </div>
    </div>
    <span class="input-container font-bold border-1">{{ tooth.id }}</span>
  </div>

  <Dialog v-model:visible="treatmentDialog" modal  :style="{ width: '35rem' }" :dismissableMask="true">
      
        <div class="flex flex-column gap-3">
          <div v-for="choice in treatmentChoices" :key="choice.id" class="flex align-items-center">
            <RadioButton
              v-model="tooth.topBox"
              :inputId="choice.id"
              name="dynamic"
              :value="choice.id" 
            />
            <label :for="choice.id" class="ml-2">{{ choice.name }}</label>
          </div>
        </div>
      
      <!-- <div class="flex justify-content-end gap-2">
        <Button type="button" label="Cancel" severity="secondary" @click="treatmentDialog=false"></Button>
        <Button type="button" label="Select" @click="treatmentDialog=false"></Button>
      </div> -->
    </Dialog>

    <Dialog v-model:visible="conditionDialog" modal  :style="{ width: '35rem' }" :dismissableMask="true"> 
      
      <div class="flex flex-column gap-3">
        <div v-for="choice in conditionChoices" :key="choice.id" class="flex align-items-center">
          <RadioButton
            v-model="tooth.botBox"
            :inputId="choice.id"
            name="dynamic"
            :value="choice.id" 
          />
          <label :for="choice.id" class="ml-2">{{ choice.name }}</label>
        </div>
      </div>
    
    <!-- <div class="flex justify-content-end gap-2">
      <Button type="button" label="Cancel" severity="secondary" @click="conditionDialog=false"></Button>
      <Button type="button" label="Select" @click="conditionDialog=false"></Button>
    </div> -->
  </Dialog>
</template>

<style>
.input-container {
  display: flex;
  flex-direction: column; /* Stack inputs vertically */
  align-items: center; /* Center align inputs */
  gap: 2px; /* Reduced space between inputs */
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
