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

const route = useRoute();
const appointmentId = route.params.id;
const teethStore = teeth();
const otherInputsStore = otherInputs();
const teethData = teethStore.teethData;
const createaccStore = createacc();
// const createaccount  =createaccStore.accDetails;
const statusStore = statusChoices();
// const statuschoices = statusStore.legend
const loader = ref(false);
onMounted(async () => {
    teethStore.resetTeethData(); 
    teethStore.resetFirstPage(); 
    teethStore.resetServicesRendered(); 
    try {
        const fetchData = await fetchClinicalDetails(appointmentId);
        
        // Check if fetchData is valid
        if (fetchData) {
            Object.assign(teethData, fetchData.teethData);
            Object.assign(otherInputsStore.firstPage, fetchData.clinicalRecord);
            Object.assign(otherInputsStore.servicesRendered, fetchData.clinicalRecord);
            console.log('teeth Data', teethData);
            loader.value=true;
        } else {
            console.error('Fetched data is null or undefined');
            loader.value=true;
        }
    } catch (error) {
        console.error('Error fetching clinical details:', error);
        loader.value=true;
    }
});

async function clickSave() {
  try {
    const patientData = {
      teethData: teethData,
      firstPageData: otherInputsStore.firstPage,
      secondPageData: otherInputsStore.servicesRendered,
    };
    const response = await storeClinicalDetails(appointmentId, patientData);
    console.log('Data saved successfully:', response);
  } catch (error) {
    console.error('Error saving clinical details:', error);
  }
}

async function clickUpdate() {
  try {
    const patientData = {
      teethData: teethData,
      
    };
    const response = await updateClinicalDetails(appointmentId, patientData);
    console.log('Data saved successfully:', response);
  } catch (error) {
    console.error('Error saving clinical details:', error);
  }
}
</script>   
<template>
   
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
                        <Button label="Update" icon="pi pi-save" iconPos="right" @click="clickUpdate" />
                        <Button label="Save" icon="pi pi-save" iconPos="right" @click="clickSave" />
                    </div>
                </template>
            </StepperPanel>
            <!-- <StepperPanel header="Step III">
                <template #content="{ prevCallback }">
                    <div class="flex flex-column h-12rem">
                        <div class="border-2 border-dashed surface-border border-round surface-ground flex-auto flex justify-content-center align-items-center font-medium">Review before saving? Add Mark as done button here</div>
                        <div class="field col-12 md:col-12">
                            <label>Status</label>
                            <Dropdown
                            id="status"
                            placeholder="Select One"
                            v-model="createaccount.user_type"
                            :options="statuschoices"
                            optionLabel="name"
                            optionValue="id"
                            />
                        </div>
                    </div>
                    <div class="flex pt-4 justify-content-between">
                        <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="prevCallback" />
                        <Button label="Update" icon="pi pi-save" iconPos="right" @click="clickUpdate" />
                        <Button label="Save" icon="pi pi-save" iconPos="right" @click="clickSave" />
                    </div>
                </template>
            </StepperPanel> -->
        </Stepper>
</template>

<style scoped>
.p-stepper {
    flex-basis: 50rem;
}
</style>
