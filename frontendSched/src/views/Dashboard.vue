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
const disabledDates = computed(() => {
  return filledSlots.value.map(date => new Date(date));
});


// Selected date
const selectedDate = ref(null);


const checkboxOptions = ref([
  { label: '8:00 am - 9:00 am', value: 1, checked: false },
  { label: '9:00 am - 10:00 am', value: 2, checked: false },
  { label: '10:00 am - 11:00 am', value: 3, checked: false },
  { label: '11:00 am - 12:00 pm', value: 4, checked: false },
  { label: '1:00 pm - 2:00 pm', value: 5, checked: false },
  { label: '2:00 pm - 3:00 pm', value: 6, checked: false },
  { label: '3:00 pm - 4:00 pm', value: 7, checked: false },
]);
// { label: '4:00 pm - 5:00 pm', value: 8, checked: false },

// Function to check if an option is disabled
const isOptionDisableds = (option) => {
  return returnedData.value.includes(option.label);
};
const selectedCategories=ref();
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
 
            <div v-for="category of checkboxOptions" :key="category.key" class="flex align-items-center">
                <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.label" />
                <label :for="category.key">{{ category.label }}</label>
            </div>
            {{ selectedCategories }}
            </div>
            <div v-for="category in categories" :key="category.key" class="flex items-center">
                <RadioButton v-model="selectedCategory" :inputId="category.key" name="dynamic" :value="category.label" />
                <label :for="category.key" class="ml-2">{{ category.name }}</label>
            </div>
            <Button label="Submit" />
        </div>
        
    </div>
    
</template>

