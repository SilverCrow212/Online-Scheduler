<script setup>
import { ref, onMounted,computed } from 'vue';
import { useRouter } from 'vue-router';
import { fetchAppointmentPatient, storeAppointment } from '@/api/ApiAppointment';
import { informedConsent } from '@/store/informedconsent';
import { appointment } from '@/store/appointmentenc';
import AppointmentPopup from '@/views/PatientOnlyView/AppointmentPopup.vue';
import { statusChoices } from '@/store/choices'
const statusStore = statusChoices();
const useStatus = statusStore.legend;
const router = useRouter();
const selectedPatients = ref(null);
const metaKey = ref(true);
const patients = ref(null);
const user_details = JSON.parse(localStorage.getItem('user_details'));
// console.log('user_details',user_details);
const visibleSetAppointment = ref(false);
const appointmentStore = appointment();
const useAppoinment =  appointmentStore.appointmentDetails;
const informedConsentStore= informedConsent();
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();

onMounted(async () => {
    informedConsentStore.resetData();
    appointmentStore.resetAppointmentDetails();
    const data = await fetchAppointmentPatient(user_details.user_details.user_id); // Fetch the patient records
    records.value = data;
    console.log('asdfg',data)
    // console.log('patients value popup',records.value)
});

const records = ref([]);

function dialogOpen(event) {
    const selectedPatient = event.data;
    if (selectedPatient) {
        router.push({ name: 'record', params: { id: selectedPatient.id } });
        console.log('patid', selectedPatient.id);
    } else {
        console.warn('No patient selected');
    }
}

async function clickSave(){
    if(useAppoinment.user_details_id!== null&& useAppoinment.appointment_date!==null && useAppoinment.appointment_time!==null && useAppoinment.consent_form!== null){
        console.log('sent to backend', useAppoinment);
        await storeAppointment(useAppoinment,toast);
        // patients.value = await fetchAppointment(formattedDate.value);
        const data = await fetchAppointmentPatient(user_details.user_details.user_id); // Fetch the patient records
        // informedConsentStore.resetData();
        // appointmentStore.resetAppointmentDetails();
        records.value = data;
        window.location.reload();
        visibleSetAppointment.value = false
    }
    // visibleSetAppointment.value = false
}
const getStatusName = (statusId) => {
    // console.log('Looking for status name for ID:', statusId);
    const status = useStatus.find(item => item.id == statusId);
    // console.log('Found status:', status); // Log the found status
    return status ? status.name : 'Unknown';
};

const isAppointmentDisabled = computed(() => {
      return records.value.some(record => record.status === 2);
    });
</script>
<template>
    <Toast/>
<DataTable v-model:selection="selectedPatients" :value="records" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
    <template #header>
        <div class="flex flex-wrap align-items-center justify-content-between gap-2">
            
            <Button icon="pi pi-plus" label="Add New Appointment" raised @click="visibleSetAppointment=true" :disabled="isAppointmentDisabled" />
        </div>
    </template>
    <Column field="appointment_date" header="Appointment Date"></Column>
    <Column field="appointment_time" header="Appointment Time"></Column>
    <Column field="status" header="Status">
        <template #body="slotProps">
            <span>{{ getStatusName(slotProps.data.status) }}</span>
        </template>
    </Column>

</DataTable>
<Dialog v-model:visible="visibleSetAppointment" modal header="Set Appointment" :style="{ width: '35rem' }" :dismissableMask="true">
    <AppointmentPopup/>
    <div class="my-4">
        <h6 class="font-bold mb-2">1. PLEASE READ THE DENTAL CLINIC APPOINTMENT POLICY</h6>
        <ul class="pl-4 text-sm">
            <li>Failure to come on your appointment or being late for more than ten minutes is considered a broken appointment.</li>
            <li>Please arrive 15 minutes or earlier before your appointment.</li>
        </ul>
        <h6 class="font-bold mb-2">2. Please follow these guidelines:</h6>
        <ul class="pl-4 text-sm">
            <li>Remove pens or pointed objects from your back pocket.</li>
            <li>Avoid heavy makeup (mascara, lipstick, etc.).</li>
            <li>No ponytail or jaw/claw clips at the back of the head.</li>
            <li>No validated ID card, no appointment slip, no treatment.</li>
        </ul>
    </div>
    <div class="flex justify-content-end gap-2">
        <Button type="button" label="Cancel" severity="secondary" @click="visibleSetAppointment = false"></Button>
        <Button type="button" label="Save" @click="clickSave()"></Button>
    </div>
</Dialog>
</template>
