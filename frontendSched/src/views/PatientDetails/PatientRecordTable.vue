<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { fetchAppointmentPatient } from '@/api/ApiAppointment';
import { statusChoices } from '@/store/choices'
import InformedConsentPopUp from '@/views/InformedConsent/InformedConsentPopUp.vue';
const statusStore = statusChoices();
const useStatus = statusStore.legend;
const user_details = JSON.parse(localStorage.getItem('user_details'));
const getStatusName = (statusId) => {
    console.log('Looking for status name for ID:', statusId);
    const status = useStatus.find(item => item.id == statusId);
    console.log('Found status:', status); // Log the found status
    return status ? status.name : 'Unknown';
};

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

const records = ref([]);

function dialogOpen(event) {
    const selectedPatient = event.data;
    if (selectedPatient && user_details.user_type === 'admin') {
        router.push({ name: 'record', params: { id: selectedPatient.id } });
        console.log('patid', selectedPatient.id);
    } else {
        console.warn('No patient selected');
    }
}
const selectedConsentForm = ref(null);
const visibleInformedConsentPopUp = ref(false);
function viewConsentForm(consentForm) {
    selectedConsentForm.value = JSON.parse(consentForm);
    visibleInformedConsentPopUp.value = true;
}
</script>


<template>
    <!-- {{ props.patient }} -->
<DataTable v-model:selection="selectedPatients" :value="records" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
    <Column field="appointment_date" header="Appointment Date"></Column>
    <Column field="appointment_time" header="Appointment Time"></Column>
    <Column field="status" header="Status">
        <template #body="slotProps">
            <span>{{ getStatusName(slotProps.data.status)}}</span>
        </template>
    </Column>
    <Column  header="Consent Form">
        <template #body="slotProps">
            <!-- {{ slotProps.data.consent_form }} -->
            <!-- <span>{{ getStatusName(slotProps.data.status) }}</span> -->
            <Button type="button" label="View Consent Form" severity="primary" @click="viewConsentForm(slotProps.data.consent_form)"></Button>
        </template>
    </Column>
    <!-- <Column field="toothno" header="Tooth No."></Column>
    <Column field="medicine" header="Medicine Given / Prescribed"></Column>
    <Column field="remark" header="Remarks"></Column> -->
</DataTable>

<Dialog v-model:visible="visibleInformedConsentPopUp" modal header="Dental Health Record - Informed Consent" :style="{ width: '75%' }" :dismissableMask="true">
        <InformedConsentPopUp :consent-form="selectedConsentForm"/>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Close" @click="visibleInformedConsentPopUp=false"></Button>
        </div>
    </Dialog>
</template>
