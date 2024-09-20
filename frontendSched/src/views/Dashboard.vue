<script setup>
import { ref,computed,watch } from 'vue';
import axios from 'axios';


const filledSlots = ref(['2024-05-28', '2024-05-30']);


const minDate = new Date();




// Selected date
const selectedDate = ref(null);


const checkboxOptions = ref([
  '8:00 am - 9:00 am',
  '9:00 am - 10:00 am', 
  '10:00 am - 11:00 am',
  '11:00 am - 12:00 pm',
  '1:00 pm - 2:00 pm', 
  '2:00 pm - 3:00 pm', 
  '3:00 pm - 4:00 pm',
]);
// { label: '4:00 pm - 5:00 pm', value: 8, checked: false },



const formatDate = (date) => {
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(date.getDate()).padStart(2, '0');
  const year = date.getFullYear();
  return `${month}/${day}/${year}`;
};
const selectedCategories=ref();

const selectedCategory = ref(null);

const sampleDates = ref(
  [
    {date: '09/23/2024' , available_time: [
      '8:00 am - 9:00 am',
      '9:00 am - 10:00 am', 
      '10:00 am - 11:00 am',
      '11:00 am - 12:00 pm',
      '1:00 pm - 2:00 pm', 
      '2:00 pm - 3:00 pm', 
      '3:00 pm - 4:00 pm',
      ]
    },
    {date: '09/25/2024' , available_time: [
      '9:00 am - 10:00 am', 
      '10:00 am - 11:00 am',
      '11:00 am - 12:00 pm',
      '1:00 pm - 2:00 pm', 
      '2:00 pm - 3:00 pm', 
      '3:00 pm - 4:00 pm',
      ]
    },
  ]
);

const selecteDates = [ 

];

const stringToDate = (dateString) => {
  const [month, day, year] = dateString.split('/').map(Number);
  return new Date(year, month - 1, day);
};

// Computed property to determine disabled dates
const disabledDates = computed(() => {
  return sampleDates.value
    .filter(dateObj => dateObj.available_time.length >= 7)
    .map(dateObj => stringToDate(dateObj.date));
});

const isCategoryDisabled = (category) => {
  // Check if a date is selected
  if (!selectedDate.value) return false;

  const formattedSelectedDate = formatDate(selectedDate.value);

  // Find the selected date in sampleDates
  const dateInfo = sampleDates.value.find(dateObj => dateObj.date === formattedSelectedDate);
  
  // If the date exists, check if the category (time slot) is included in available_time
  return dateInfo ? dateInfo.available_time.includes(category) : false;
};

watch(selectedDate, () => {
  selectedCategory.value = null;
});

</script>

<template>
      <div class="grid p-fluid">
        <div class="col-12 md:col-12">
            <div class="card">
              <div class="field col-12 md:col-12">
                  <label>ID number</label>
                  <InputText id="firstname2" type="text" />
              </div>

              <div class="field col-12 md:col-12">
                <label>Choose Appointment Date</label>
                <Calendar
                  :showIcon="true" 
                  :showButtonBar="true"
                  v-model="selectedDate"
                  :min-date="minDate"
                  :disabled-dates="disabledDates"
                />
              </div>
              <div class="field col-12 md:col-12"  v-if="selectedDate!==null">
                <label>Choose Time</label>
                <div v-for="category in checkboxOptions" class="flex align-items-center" :key="category">
                  <RadioButton 
                    v-model="selectedCategory" 
                    name="dynamic" 
                    :value="category" 
                    :disabled="isCategoryDisabled(category)" 
                  />
                  <label :for="category" class="ml-2">{{ category }}</label>
                </div>
              </div>
            
              <!-- <p v-if="selectedDate!=null">Selected Date: {{ formatDate(selectedDate) }}</p> -->
              <!-- {{ selectedCategories }} -->
            </div>
            <Button label="Submit" />
        </div>
        
    </div>
    
</template>

