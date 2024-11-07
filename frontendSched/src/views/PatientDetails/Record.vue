<script setup>
import { onMounted,ref } from 'vue';
import { useRoute } from 'vue-router';
import PageOne from '@/views/PatientDetails/PageOne.vue';
import PageTwo from '@/views/PatientDetails/PageTwo.vue';
import { statusChoices } from '@/store/choices';
import { createacc } from '@/store/createacc';
import { teeth } from '@/store/teeth';
import { otherInputs } from '@/store/teethothers';
import { storeClinicalDetails, updateClinicalDetails, fetchClinicalDetails } from '@/api/ApiStoreClinicalDetails';
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

async function fetchingDetails() {
  teethStore.resetTeethData(); 
    teethStore.resetFirstPage(); 
    teethStore.resetServicesRendered(); 
    try {
        const fetchData = await fetchClinicalDetails(appointmentId);
        
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
    console.log('Data saved successfully:', response);
  } catch (error) {
    console.error('Error saving clinical details:', error);
  }
}
</script>   
<template>
    <Toast/>
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
                    <div class="flex pt-4 justify-content-between">
                        <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="prevCallback" />
                        <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="nextCallback" />
                        <Button v-if="buttonSelecter" label="Update" icon="pi pi-save" iconPos="right" @click="clickUpdate" :disabled="user_details.user_type === 'user'"/>
                        <Button v-else label="Save" icon="pi pi-save" iconPos="right" @click="clickSave" :disabled="user_details.user_type === 'user'"/>
                    </div>
                </template>
            </StepperPanel>
        </Stepper>
</template>

<style scoped>
.p-stepper {
    flex-basis: 50rem;
}
</style>
