<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { fetchAppointmentPatient, storeAppointment } from '@/api/ApiAppointment';
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
console.log('user_details',user_details);
const visibleSetAppointment = ref(false);
const appointmentStore = appointment();
const useAppoinment =  appointmentStore.appointmentDetails;

onMounted(async () => {
    const data = await fetchAppointmentPatient(user_details.user_details.user_id); // Fetch the patient records
    records.value = data;
    console.log('patients value popup',records.value)
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
    console.log('sent to backend', useAppoinment)
    await storeAppointment(useAppoinment);
    const data = await fetchAppointmentPatient(user_details.user_details.user_id); // Fetch the patient records
    records.value = data;
    visibleSetAppointment.value = false
}
const getStatusName = (statusId) => {
    console.log('Looking for status name for ID:', statusId);
    const status = useStatus.find(item => item.id == statusId);
    console.log('Found status:', status); // Log the found status
    return status ? status.name : 'Unknown';
};
</script>
<template>
<DataTable v-model:selection="selectedPatients" :value="records" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
    <template #header>
        <div class="flex flex-wrap align-items-center justify-content-between gap-2">
            
            <Button icon="pi pi-plus" label="Add New Appointment" raised @click="visibleSetAppointment=true"/>
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
    <div class="flex justify-content-end gap-2">
        <Button type="button" label="Cancel" severity="secondary" @click="visibleSetAppointment = false"></Button>
        <Button type="button" label="Save" @click="clickSave()"></Button>
    </div>
</Dialog>
</template>
