<script setup>
import { onMounted,ref } from 'vue';
import { useRoute } from 'vue-router';
import PageOne from '@/views/PatientDetails/PageOne.vue';
import PageTwo from '@/views/PatientDetails/PageTwo.vue';
import { statusChoices } from '@/store/choices';
import { createacc } from '@/store/createacc';
import { teeth } from '@/store/teeth';
import { otherInputs } from '@/store/teethothers';
import { storeClinicalDetails, updateClinicalDetails, fetchClinicalDetails, fetchClinicalDetailsUser } from '@/api/ApiStoreClinicalDetails';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
import { appointment } from '@/store/appointmentenc'

const toast = useToast();

const user_details = JSON.parse(localStorage.getItem('user_details'));
const appointmentStore =appointment();
const route = useRoute();
const appointmentId = route.params.id;
const teethStore = teeth();
const otherInputsStore = otherInputs();
const teethData = teethStore.teethData;
const createaccStore = createacc();
// const createaccount  =createaccStore.accDetails;
const statusStore = statusChoices();
const buttonSelecter = ref(false);
// const statuschoices = statusStore.legend
const loader = ref(false);
onMounted(async () => {
    await fetchingDetails();
});
const userData = ref();
async function fetchingDetails() {
  teethStore.resetTeethData(); 
    teethStore.resetFirstPage(); 
    teethStore.resetServicesRendered();
    otherInputsStore.resetotherInputs();
    try {
        const fetchData = await fetchClinicalDetails(appointmentId);
        const fetchUser = await fetchClinicalDetailsUser(appointmentId);
        userData.value = fetchUser[0];
        // Check if fetchData is valid
        if (fetchData) {
            Object.assign(teethData, fetchData.teethData);
            Object.assign(otherInputsStore.firstPage, fetchData.clinicalRecord.firstPage);
            Object.assign(otherInputsStore.servicesRendered, fetchData.clinicalRecord);
            Object.assign(appointmentStore.appointmentDetails, fetchData.appointment);
            
            console.log('teeth Data', teethData);
            buttonSelecter.value=true;
            loader.value=true;
        } else {
            console.error('Fetched data is null or undefined');
            loader.value=true;
        }
    } catch (error) {
        console.error('Error fetching clinical details:', error);
        loader.value=true;
    }
}

async function clickSave() {
  try {
    const patientData = {
      teethData: teethData,
      firstPageData: otherInputsStore.firstPage,
      secondPageData: otherInputsStore.servicesRendered,
      appointment: appointmentStore.appointmentDetails.status
    };
    const response = await storeClinicalDetails(appointmentId, patientData, toast);
    visibleSave.value=false;
    console.log('Data saved successfully:', response);
  } catch (error) {
    console.error('Error saving clinical details:', error);
  }
}

async function clickUpdate() {
  try {
    const patientData = {
      teethData: teethData,
      firstPageData: otherInputsStore.firstPage,
      secondPageData: otherInputsStore.servicesRendered,
      appointment: appointmentStore.appointmentDetails.status
    };
    const response = await updateClinicalDetails(appointmentId, patientData, toast);
    visibleUpdate.value=false;
    console.log('Data saved successfully:', response);
  } catch (error) {
    console.error('Error saving clinical details:', error);
  }
}

async function clickSaveUser() {
  try {
    appointmentStore.appointmentDetails.status= 4;
    const patientData = {
      teethData: teethData,
      firstPageData: otherInputsStore.firstPage,
      secondPageData: otherInputsStore.servicesRendered,
      appointment: appointmentStore.appointmentDetails.status
    };
    const response = await storeClinicalDetails(appointmentId, patientData, toast);

    visibleCancel.value=false;

    console.log('Data saved successfully:', response);
  } catch (error) {
    console.error('Error saving clinical details:', error);
  }
}

const visibleUpdate = ref(null);
const visibleSave = ref(null);
const visibleCancel = ref(null);
</script>   
<template>
  <Toast />
  <div class="content-wrapper">
    <div class="sticky-card card">
      <div>
        <span class="font-bold">Patient Name:</span>
        {{ userData?.lastname }}, {{ userData?.firstname }}
      </div>
      <div>
        <span class="font-bold">School ID:</span>
        {{ userData?.school_id_number}}
      </div>
      <div>
        <span class="font-bold">Appointment Date:</span>
        {{ userData?.appointment_date}}
      </div>
      <div>
        <span class="font-bold">Appointment Time:</span>
        {{ userData?.appointment_time}}
      </div>
    </div>

    <Stepper v-if="loader">
        <StepperPanel header="Step I">
            <template #content="{ nextCallback }">
                <!-- {{ teethData }} -->
                <PageOne />
                
                <div class="flex pt-4 justify-content-end">
                    <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="nextCallback" />
                </div>
            </template>
        </StepperPanel>

        <StepperPanel header="Step II">
            <template #content="{ prevCallback, nextCallback }">
                <PageTwo/>
                <!-- {{ appointmentStore.appointmentDetails }} -->
                <div class="flex pt-4 justify-content-between">
                    <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="prevCallback" />
                    <!-- <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="nextCallback" /> -->
                    <Button v-if="buttonSelecter && user_details.user_type !== 'user'" label="Update" icon="pi pi-save" iconPos="right" @click="visibleUpdate = true" :disabled="user_details.user_type === 'user'"/>
                    <Button v-else-if="!buttonSelecter && user_details.user_type !== 'user'" label="Save" icon="pi pi-save" iconPos="right" @click="visibleSave = true" :disabled="user_details.user_type === 'user'"/>
                    <Button v-else-if="!buttonSelecter && user_details.user_type === 'user'" label="Cancel Appointment" icon="pi pi-save" iconPos="right" @click="visibleCancel = false"/>
                </div>
            </template>
        </StepperPanel>
    </Stepper>
  </div>

<!-- Update -->
  <Dialog v-model:visible="visibleUpdate" modal header="Confirmation" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
      <div class="field col-12 md:col-12">
          <label>Are you sure you entered the correct Details?</label>
      </div>
      <div class="flex justify-content-end gap-2">
          <Button type="button" label="Cancel" severity="secondary" @click="visibleUpdate = false"></Button>
          <Button type="button" label="Confirm" @click="clickUpdate"></Button>
      </div>
  </Dialog>

  <!-- Save -->
  <Dialog v-model:visible="visibleSave" modal header="Confirmation" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
      <div class="field col-12 md:col-12">
          <label>Are you sure you entered the correct Details?</label>
      </div>
      <div class="flex justify-content-end gap-2">
          <Button type="button" label="Cancel" severity="secondary" @click="visibleSave = false"></Button>
          <Button type="button" label="Confirm" @click="clickSave"></Button>
      </div>
  </Dialog>

  <!-- //user -->
  <Dialog v-model:visible="visibleCancel" modal header="Confirmation" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
      <div class="field col-12 md:col-12">
          <label>Are you sure you entered the correct Details?</label>
      </div>
      <div class="flex justify-content-end gap-2">
          <Button type="button" label="Cancel" severity="secondary" @click="visibleCancel = false"></Button>
          <Button type="button" label="Confirm" @click="clickSaveUser"></Button>
      </div>
  </Dialog>
</template>

<style scoped>

.content-wrapper {
  height: 100vh;
  overflow-y: auto;
}


.sticky-card {
  
  position: sticky;
  top: 0; 
  z-index: 10;
  background-color: white;
  padding: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px; 
}

.stepper-content {
  padding: 20px;
}
</style>

