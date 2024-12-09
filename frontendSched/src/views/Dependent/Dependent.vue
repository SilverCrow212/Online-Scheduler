<script setup>
import { ref, onMounted, computed } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
import { fetchAllDependent } from '@/api/ApiPatientRecords';
import { departmentChoices } from '@/store/choices';
// import AppointmentPopup from '@/views/PatientDetails/AppointmentPopup.vue';
import AppointmentPopup from '@/views/PatientOnlyView/AppointmentPopupDependent.vue';
import { appointment } from '@/store/appointmentenc';
import { fetchAppointment, storeAppointment } from '@/api/ApiAppointment';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
import CreateDependent from '@/views/AccountCreation/CreateAccDependent.vue'
const toast = useToast();
const { type } = departmentChoices();  // Get the type options from the store

// Function to get the corresponding type name based on type.id
const getTypeName = (typeId) => {
  const typeItem = type.find(t => t.id == typeId);
  return typeItem ? typeItem.name : 'Dependent';  // Return 'Unknown' if no match
};

const user_details = JSON.parse(localStorage.getItem('user_details'));
onMounted(async () => {
    const data = await fetchAllDependent(user_details.school_id_number); // Fetch the patient records
    console.log(data.dependents_details)
    patients.value = data.dependents_details;
});

const products = ref();
const selectedPatient = ref();
const metaKey = ref(true);

const visible = ref(false);
const patients = ref(null);

function dialogOpen(event){
    console.log('Row clicked:', event.data); // Log the clicked row's data
    if (event) {
        selectedPatient.value = event.data; // Set the selected patient data
        console.log('Selected Patient:', selectedPatient.value); // Log for confirmation
    } else {
        console.warn('No patient selected');
    }
    visible.value = true;
}

const router = useRouter();
function openProfile(){
    router.push({ name: 'editprofilepatient', params: { id: selectedPatient.value.id } });
    console.log(selectedPatient.value);
}

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    'school_id_number': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.lastname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.firstname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.middlename': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.department_program': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.type': { value: null, matchMode: FilterMatchMode.EQUALS },
});

const openProfileWindow = (patient) => {
    console.log('this is selected patient',patient)
    const width = 800;  // Desired width
    const height = 600; // Desired height
    const left = (window.screen.width / 2) - (width / 2);  // Center horizontally
    const top = (window.screen.height / 2) - (height / 2); // Center vertically

     // Construct the URL for the route
     const url = `${window.location.origin}/print/record?id=${patient.id}`;

// Open the new window/tab with the specified dimensions
window.open(url, 'PrintRecordWindow', `width=${width},height=${height},top=${top},left=${left}`);
};

const typeOptions = computed(() => {
    return type.map(t => ({
        name: t.name, // Display name
        id: t.id      // The id will be used for filtering
    }));
});

const visibleSetAppointment = ref(false);

function openSetAppointment(patientDetails){
    selectedPatient.value = patientDetails
    visibleSetAppointment.value= true
}

const appointmentStore = appointment();
const useAppoinment =  appointmentStore.appointmentDetails;

async function clickSave(){
    console.log(useAppoinment)
    if(useAppoinment.user_details_id!== null&& useAppoinment.appointment_date!==null && useAppoinment.appointment_time!==null && useAppoinment.consent_form!== null){
        console.log('here')
        console.log('sent to backend', useAppoinment);
        await storeAppointment(useAppoinment,toast);
        appointmentStore.resetAppointmentDetails();
        const data = await fetchAllDependent(user_details.school_id_number); // Fetch the patient records
        patients.value = data.dependents_details;
        visibleSetAppointment.value = false
        visible.value=false
    }
}

const openDependent = ref(false);
</script>

<template>
    <Toast/>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="flex flex-wrap align-items-center justify-content-between gap-2">
                    <Button icon="pi pi-plus" label="Add Dependent" raised @click="openDependent=true" />
                </div>
                <DataTable v-model:selection="selectedPatient" v-model:filters="filters"  :globalFilterFields="['school_id_number','user_details.lastname','user_details.firstname','user_details.middlename','user_details.department_program']" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" paginator :rows="10" @row-click="dialogOpen">
                    <template #header>
                        <div class="flex flex-wrap align-items-center justify-content-between gap-2">
                            <span class="text-xl text-900 font-bold">Dependents</span>
                            <IconField iconPosition="left">
                                <InputIcon>
                                    <i class="pi pi-search" />
                                </InputIcon>
                                <InputText v-model="filters['global'].value" placeholder="Name Search" />
                            </IconField>
                        </div>
                    </template>
                    <template #empty> No patients found. </template>
                    <Column header="ID Number">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.school_id_number}}</span>
                        </template>
                    </Column>
                    <Column header="Patient Name">
                        <template #body="slotProps">
                            <span>{{ slotProps.data?.user_details?.lastname}}, {{ slotProps.data?.user_details?.firstname}} {{ slotProps.data?.user_details?.middlename}}</span>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visible" modal :header="selectedPatient?.name" :style="{ width: '70rem' }" :dismissableMask="true">
        <div class="flex justify-content-end gap-4">
            <!-- {{selectedPatient.id}} -->
            <span class="p-text-secondary mr-2">
                <Button type="button" label="View Profile" icon="pi pi-profile" size="small" @click="openProfile()" />
            </span>
            <span class="p-text-secondary">
                <Button type="button" label="Add Appointment" icon="pi pi-profile" size="small" @click="openSetAppointment(selectedPatient)" />
            </span>
            <span class="p-text-secondary">
                <Button type="button" label="Print Record" icon="pi pi-profile" size="small" @click="openProfileWindow(selectedPatient)" />
            </span>
        </div>
            <PatientRecordTable :patient="selectedPatient"/>
    </Dialog>


    <Dialog v-model:visible="visibleSetAppointment" modal header="Set Appointment" :style="{ width: '35rem' }" :dismissableMask="true">
        <AppointmentPopup :patientDetails="selectedPatient"/>
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


    <Dialog v-model:visible="openDependent" modal header="Create Dependent Account" :style="{ width: '70rem' }" :dismissableMask="true">
        <CreateDependent :patients="patients"/>
    </Dialog>


    
</template>

<style scoped lang="scss">
:deep(.p-datatable-frozen-tbody) {
    font-weight: bold;
}

:deep(.p-datatable-scrollable .p-frozen-column) {
    font-weight: bold;
}
</style>

