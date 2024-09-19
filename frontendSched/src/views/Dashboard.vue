<script setup>
import { ref,computed } from 'vue';
import axios from 'axios';

const fetchDashboardData = async () => {
  try {
    const response = await axios.get('/api/all-patients');
    dashboardData.value = response.data.patient_details;
    dashboardToday.value= response.data.total_patients_today;
    dashboardTotal.value=response.data.total_patients;
    // console.log('Today',dashboardToday.value);
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};

const calendarValue = ref(null);

const selectButtonValue1 = ref(null);
const selectButtonValues1 = ref([
  { name: '8:00 am - 9:00 am', disabled: false },
  { name: '9:00 am - 10:00 am', disabled: false },
  { name: '10:00 am - 11:00 am', disabled: true }, // Example of a disabled option
  { name: '11:00 am - 12:00 pm', disabled: false },
  { name: '1:00 pm - 2:00 pm', disabled: false },
  { name: '2:00 pm - 3:00 pm', disabled: false },
  { name: '3:00 pm - 4:00 pm', disabled: false },
  { name: '4:00 pm - 5:00 pm', disabled: false },
]);

// Selected value

// Function to determine if an option should be disabled
const isOptionDisabled = (option) => {
  return option.disabled;
};
// const minDate= new Date();

const filledSlots = ref(['2024-05-28', '2024-05-30']);

// Compute min and max dates based on your business logic
const minDate = new Date();


// Function to disable filled slots
// const disabledDates = computed(() => {
//   return filledSlots.value.map(date => new Date(date));
// });


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

// Function to check if an option is disabled
const isOptionDisableds = (option) => {
  return returnedData.value.includes(option.label);
};


const formatDate = (date) => {
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(date.getDate()).padStart(2, '0');
  const year = date.getFullYear();
  return `${month}/${day}/${year}`;
};
const selectedCategories=ref();

const categories = ref([
    { name: 'Accounting', key: 'A' },
    { name: 'Marketing', key: 'M' },
    { name: 'Production', key: 'P' },
    { name: 'Research', key: 'R' }
]);

const selectedCategory = ref(null);

const sampleDates = ref(
  [
    {date: '09/20/2024' , available_time: [
      '8:00 am - 9:00 am',
      '9:00 am - 10:00 am', 
      '10:00 am - 11:00 am',
      '11:00 am - 12:00 pm',
      '1:00 pm - 2:00 pm', 
      '2:00 pm - 3:00 pm', 
      '3:00 pm - 4:00 pm',
      ]
    },
    {date: '09/21/2024' , available_time: [
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
</script>

<template>
      <div class="grid p-fluid">
        <div class="col-12 md:col-12">
            <div class="card">
                <!-- <h5>Icons</h5>
                <div class="grid formgrid">
                    <div class="col-12 mb-2 lg:col-6 lg:mb-0">
                        <IconField>
                            <InputIcon class="pi pi-user" />
                            <InputText type="text" placeholder="Username" />
                        </IconField>
                    </div>
                    <div class="col-12 mb-2 lg:col-6 lg:mb-0">
                        <IconField iconPosition="left">
                            <InputText type="text" placeholder="Search" />
                            <InputIcon class="pi pi-search" />
                        </IconField>
                    </div>
                </div> -->

                <h5>Calendar</h5>
                <Calendar :showIcon="true" :showButtonBar="true" v-model="calendarValue" :minDate="minDate"></Calendar>
                <h5>SelectButton</h5>
                <SelectButton
                class="p-select-button"
                v-model="selectButtonValue1"
                :options="selectButtonValues1"
                optionLabel="name"
                :disabled="isOptionDisabled"
                />
                

                <Calendar
                :showIcon="true" 
                :showButtonBar="true"
                v-model="selectedDate"
                :min-date="minDate"
                :disabled-dates="disabledDates"
                />
                <!-- <Checkbox
                v-for="option in checkboxOptions"
                :key="option.label"
                v-model="option.checked"
                :label="option.label"
                :value="option.value"
                :disabled="isOptionDisabled(option)"
                >
                {{ option.label }}
                
            </Checkbox> -->
            
            <p v-if="selectedDate!=null">Selected Date: {{ formatDate(selectedDate) }}</p>

            <!-- {{ selectedDate }} -->
            <!-- <div v-for="category of checkboxOptions" :key="category.key" class="flex align-items-center">
                <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.label" />
                <label :for="category.key">{{ category.label }}</label>
            </div> -->
            {{ selectedCategories }}
            </div>
            <!-- <div v-for="category in categories" :key="category.key" class="flex items-center">
                <RadioButton v-model="selectedCategory" :inputId="category.key" name="dynamic" :value="category.label" />
                <label :for="category.key" class="ml-2">{{ category.name }}</label>
            </div> -->

            <!-- <div v-for="category in checkboxOptions"  class="flex align-items-center">
                <RadioButton v-model="selectedCategory" name="dynamic" :value="category" />
                <label :for="category" class="ml-2">{{ category }}</label>
            </div> -->

            <Calendar
              :showIcon="true" 
              :showButtonBar="true"
              v-model="selectedDate"
              :min-date="minDate"
              :disabled-dates="disabledDates"
            />
            <div v-for="category in checkboxOptions" class="flex align-items-center" :key="category">
              <RadioButton 
                v-model="selectedCategory" 
                name="dynamic" 
                :value="category" 
                :disabled="isCategoryDisabled(category)" 
              />
              <label :for="category" class="ml-2">{{ category }}</label>
            </div>
            <Button label="Submit" />
        </div>
        
    </div>
    
</template>

