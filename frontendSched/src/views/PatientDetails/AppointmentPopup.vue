<script setup>
import { ref,computed,watch,onMounted, defineProps } from 'vue';
import axios from 'axios';
import InformedConsent from '@/views/InformedConsent/InformedConsent.vue';
import { appointment } from '@/store/appointmentenc';
import { informedConsent } from '@/store/informedconsent';
/////////////////
import { fetchAllPatient } from '@/api/ApiPatientRecords';
const patients = ref(null);
const selectedPatientId = ref(null);
const filteredPatient = ref();
// compute the school_id_number into the id number input below 
const props = defineProps({
  patientDetails: {
    type: Object,
    required: true,
  },
});

selectedPatientId.value = props.patientDetails.school_id_number;

const search = (event) => {
  setTimeout(() => {
        if (!event.query.trim().length) {
            filteredPatient.value = [...patients.value];
        } else {
          filteredPatient.value = patients.value.filter(patient => {
                // Check if user_details exists and filter based on school_id_number
                return patient.user_details && 
                       patient.user_details.school_id_number &&
                       patient.user_details.school_id_number.toString().toLowerCase().startsWith(event.query.toLowerCase());
            });
        }
    }, 250);
}
/////////////
const informedConsentStore= informedConsent();
const consentform= informedConsentStore.data;
const appointmentStore = appointment();
const useAppoinment =  appointmentStore.appointmentDetails;
const filledSlots = ref(['2024-05-28', '2024-05-30']);
const minDate = new Date();
const visibleInformedConsent = ref(false);
const selectedDate = ref(null);


  onMounted(async () => {
      informedConsentStore.resetData();
      const data = await fetchAllPatient(); // Fetch the patient records
      patients.value = data;
      console.log('patients data', patients.value)
  });
// console.log('testing',test)
const checkboxOptions = ref([
  '8:30 am - 9:30 am',
  '9:30 am - 10:30 am', 
  '10:30 am - 11:30 am',
  // '11:30 am - 12:30 pm',
  '1:30 pm - 2:30 pm', 
  '2:30 pm - 3:30 pm', 
  '3:30 pm - 4:30 pm',
]);
// { label: '4:00 pm - 5:00 pm', value: 8, checked: false },
const formatDate = (date) => {
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(date.getDate()).padStart(2, '0');
  const year = date.getFullYear();
  // return `${month}/${day}/${year}`;
  return `${year}-${month}-${day}`;
};
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
  useAppoinment.appointment_time = null;
  useAppoinment.appointment_date = formatDate(selectedDate.value);
});
////
useAppoinment.user_details_id = props.patientDetails.user_details.user_id
watch(selectedPatientId, () => {
  useAppoinment.user_details_id = props.patientDetails.school_id_number; // Set the user ID in the appointment details
});




// useAppoinment.status = 2;
////
const clickClose = () => {
  if (validateForm()) {
    useAppoinment.consent_form = consentform;
    visibleInformedConsent.value = false;
    console.log('consent form',consentform)
  } else {
    alert(errorMessage.value);
  }

};
const errorMessage = ref('')
const validateForm = () => {
  console.log('consent form', consentform.dentalHistory)
  if (
    !consentform.details.name ||
    !consentform.details.collegeOffice ||
    !consentform.details.reason ||
    !consentform.dentalHistory.previousDentist ||
    !consentform.dentalHistory.address ||
    !consentform.dentalHistory.lastDentalVisit ||
    !consentform.dentalHistory.reason ||
    !consentform.medicalHistory.physician ||
    !consentform.medicalHistory.specialty ||
    !consentform.medicalHistory.clinicAddress ||
    !consentform.medicalHistory.contactNumber ||
    !consentform.medicalHistory.q1.answ ||
    !consentform.medicalHistory.q2.answ ||
    !consentform.medicalHistory.q3.answ ||
    !consentform.medicalHistory.q4.answ ||
    !consentform.medicalHistory.q5.answ ||
    !consentform.medicalHistory.q6.answ ||
    !consentform.medicalHistory.q7.answ ||
    !consentform.preconsent.treatment ||
    !consentform.preconsent.drugs ||
    !consentform.preconsent.treatmentPlan ||
    !consentform.preconsent.radiograph ||
    !consentform.preconsent.removal ||
    !consentform.preconsent.periodontal ||
    !consentform.preconsent.fillings ||
    !consentform.finalconsent.patient ||
    !consentform.finalconsent.date
  ) {
    errorMessage.value = 'Please fill in all the required fields before closing.';
    return false;
  }
  return true;
};
</script>

<template>
      <div class="grid p-fluid">
        <!-- {{test.data}} -->
        <div class="col-12 md:col-12">
          <!-- {{ formattedSelectedDate }} -->
          <!-- {{selectedPatientId}}
           asdasd<br/>
          {{ useAppoinment.user_details_id }} -->
              <Button label="Informed Consent" @click="visibleInformedConsent=true"/>
              <div class="field col-12 md:col-12">
                  <label>ID number</label>
                  <!-- <InputText v-model="useAppoinment.user_details_id" type="text"  /> -->
                  <AutoComplete 
                    v-model="selectedPatientId" 
                    forceSelection
                    optionValue="id"
                    optionLabel="school_id_number" 
                    :suggestions="filteredPatient" 
                    @complete="search"
                    disabled
                    />
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
                  :manualInput="false"
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

    <Dialog v-model:visible="visibleInformedConsent" modal header="Dental Health Record - Informed Consent" :style="{ width: '75%' }" :closable="false">
        <InformedConsent/>
        <div class="flex justify-content-end gap-2">
            <!-- <Button type="button" label="Cancel" severity="secondary" @click="visibleInformedConsent = false"></Button> -->
            <Button type="button" label="Close" @click="clickClose()"></Button>
        </div>
    </Dialog>

</template>