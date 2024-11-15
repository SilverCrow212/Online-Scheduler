<script setup>
import { ref,computed,watch } from 'vue';
import { holidayInput } from '@/store/holiday';

const holidayStore = holidayInput();
const useHoliday = holidayStore.setHoliday;


const selectedDate = ref(null);

const formatDate = (date) => {
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(date.getDate()).padStart(2, '0');
  const year = date.getFullYear();
  return `${year}-${month}-${day}`;
};

watch(selectedDate, () => {
  useHoliday.date = formatDate(selectedDate.value);
});

</script>

<template>
      <div class="grid p-fluid">
        <div class="col-12 md:col-12">
          <!-- {{ selectedDate }} -->
              <div class="field col-12 md:col-12">
                <label>Choose Date</label>
                <Calendar
                  :showIcon="true" 
                  :showButtonBar="true"
                  v-model="selectedDate"
                  dateFormat="mm/dd/yy"
                  :manualInput="false"
                />
              </div>
              <div class="field col-12 md:col-12">
                  <label>Description</label>
                  <InputText v-model="useHoliday.description" type="text" />
              </div>
        </div>
    </div>


    
</template>

