<script setup>
import { ref, computed, watch, onMounted } from 'vue';
import InformedConsent from '@/views/InformedConsent/InformedConsent.vue';
import { appointment } from '@/store/appointmentenc';
import { informedConsent } from '@/store/informedconsent';
import { fetchAllPatient } from '@/api/ApiPatientRecords';

// State management
const patients = ref([]);
const selectedPatientId = ref(null);
const visibleInformedConsent = ref(false);
const selectedDate = ref(null);
const useAppoinment = appointment().appointmentDetails;

// Fetch patients on component mount
onMounted(async () => {
  const data = await fetchAllPatient(); // Fetch the patient records
  patients.value = data;
  console.log('patients data', patients.value);
});

// Computed properties
const filteredUsers = computed(() => {
  if (!selectedPatientId.value) return []; // Return empty if no ID selected

  return patients.value
    .filter(patient => patient.user_details && 
      patient.user_details.school_id_number.toString().includes(selectedPatientId.value.toString()))
    .map(patient => ({
      school_id_number: patient.user_details.school_id_number, // Show school ID
      id: patient.user_details.id // Keep track of patient ID
    }));
});

const searchUsers = (event) => {
  // This function is triggered when the user types in the AutoComplete
  console.log('Searching for users with input:', event.query);
};

const onUserSelect = (event) => {
  selectedPatientId.value = event.id; // Set the selected patient's ID only
};

// Sample dates and times for appointment
const checkboxOptions = ref([
  '8:00 am - 9:00 am',
  '9:00 am - 10:00 am', 
  '10:00 am - 11:00 am',
  '11:00 am - 12:00 pm',
  '1:00 pm - 2:00 pm', 
  '2:00 pm - 3:00 pm', 
  '3:00 pm - 4:00 pm',
]);

const sampleDates = ref(
  [
    {date: '10/28/2024' , available_time: [
      '8:00 am - 9:00 am',
      '9:00 am - 10:00 am', 
      '10:00 am - 11:00 am',
      '11:00 am - 12:00 pm',
      '1:00 pm - 2:00 pm', 
      '2:00 pm - 3:00 pm', 
      '3:00 pm - 4:00 pm',
      ]
    },
    {date: '10/29/2024' , available_time: [
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


const minDate = new Date();
const formatDate = (date) => {
  const month = String(date.getMonth() + 1).padStart(2, '0'); 
  const day = String(date.getDate()).padStart(2, '0');
  const year = date.getFullYear();
  return `${month}/${day}/${year}`;
};

const disabledDates = computed(() => {
  return sampleDates.value
    .filter(dateObj => dateObj.available_time.length >= 7)
    .map(dateObj => new Date(dateObj.date));
});

// Handle appointment date selection
watch(selectedDate, () => {
  useAppoinment.appointment_time = null;
  useAppoinment.appointment_date = formatDate(selectedDate.value);
});

// Save function
const clickSave = () => {
  useAppoinment.consent_form = informedConsent().data;
  useAppoinment.status = 2;
  useAppoinment.user_details_id = selectedPatientId.value; // Set the user ID in the appointment details
  visibleInformedConsent.value = false;
};
</script>

<template>
      <div class="grid p-fluid">
        <!-- {{ formattedSelectedDate }} -->
        <!-- {{test.data}} -->
        <div class="col-12 md:col-12">
          {{useAppoinment.appointment_date}}
              <Button label="Informed Consent" @click="visibleInformedConsent=true"/>
              <div class="field col-12 md:col-12">
                  <label>ID number</label>
                  <InputText v-model="useAppoinment.user_details_id" type="text"  />
              </div>

              <div class="field col-12 md:col-12">
                <label>Choose Appointment Date</label>
                <Calendar
                  :showIcon="true" 
                  :showButtonBar="true"
                  v-model="selectedDate"
                  :min-date="minDate"
                  dateFormat="mm/dd/yy"
                  :disabled-dates="disabledDates"
                  :disabledDays="[0, 6]"
                />
              </div>
              <div class="field col-12 md:col-12"  v-if="selectedDate!==null">
                <label>Choose Time</label>
                <div v-for="category in checkboxOptions" class="flex align-items-center" :key="category">
                  <RadioButton 
                    v-model="useAppoinment.appointment_time" 
                    name="dynamic" 
                    :value="category" 
                    :disabled="isCategoryDisabled(category)" 
                  />
                  <label :for="category" class="ml-2">{{ category }}</label>
                </div>
              </div>
        </div>
    </div>
    <div>
      {{ selectedPatientId }}
      <AutoComplete
        v-model="selectedPatientId"
        :suggestions="filteredUsers"
        @complete="searchUsers"
        placeholder="Enter School ID Number"
        field="school_id_number"
        @select="onUserSelect"
      />
    </div>
    <Dialog v-model:visible="visibleInformedConsent" modal header="Dental Health Record - Informed Consent" :style="{ width: '75%' }" :dismissableMask="true">
        <InformedConsent/>
        <div class="flex justify-content-end gap-2">
            <!-- <Button type="button" label="Cancel" severity="secondary" @click="visibleInformedConsent = false"></Button> -->
            <Button type="button" label="Close" @click="clickSave()"></Button>
        </div>
    </Dialog>
    
</template>

