<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { fetchAppointmentPatient } from '@/api/ApiAppointment';
const router = useRouter();
const selectedPatients = ref(null);
const metaKey = ref(true);
const patients = ref(null);
const props = defineProps({
    patient: {
        type: Object,
        required: true
    }
});
onMounted(async () => {
    const data = await fetchAppointmentPatient(props.patient.id); // Fetch the patient records
    records.value = data;
    console.log('patients value popup',records.value)
});

const records = ref([
    { id: '1', appointmentdate: '09/23/2024', appointmenttime: '8:00 am - 9:00 am', servicerendered: 'Tooth Cleaning', toothno: 'R35 and L36', medicine: 'Doe, John Jr.', remark: 'Student' },
    { id: '2', appointmentdate: '09/26/2024', appointmenttime: '11:00 am - 12:00 pm', servicerendered: 'Tooth Extracting', toothno: 'R35 and L36', medicine: 'Doe, John Jr.', remark: 'Student' },
    { id: '3', appointmentdate: '09/27/2024', appointmenttime: '1:00 pm - 2:00 pm', servicerendered: 'Yes', toothno: 'R35 and L36', medicine: 'Doe, John Jr.', remark: 'Student' },
]);

function dialogOpen(event) {
    const selectedPatient = event.data;
    if (selectedPatient) {
        router.push({ name: 'record', params: { id: selectedPatient.id } });
        console.log('patid', selectedPatient.id);
    } else {
        console.warn('No patient selected');
    }
}
</script>


<template>
    <!-- {{ props.patient }} -->
<DataTable v-model:selection="selectedPatients" :value="records" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
    <Column field="appointment_date" header="Appointment Date"></Column>
    <Column field="appointment_time" header="Appointment Time"></Column>
    <Column field="status" header="Status"></Column>
    <!-- <Column field="toothno" header="Tooth No."></Column>
    <Column field="medicine" header="Medicine Given / Prescribed"></Column>
    <Column field="remark" header="Remarks"></Column> -->
</DataTable>
</template>
