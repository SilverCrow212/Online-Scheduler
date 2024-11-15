<script setup>
import { ref, onMounted, computed, watch } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue';
import AppointmentPopup from '@/views/AppointmentList/AppointmentPopup.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
import { fetchAppointment, storeAppointment } from '@/api/ApiAppointment';
import { appointment } from '@/store/appointmentenc';
import { departmentChoices, statusChoices } from '@/store/choices'
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();
const departmentStore = departmentChoices();
const statusStore = statusChoices();
const appointmentStore = appointment();
const useAppoinment =  appointmentStore.appointmentDetails;
const useDepartment = departmentStore.type;
const useStatus = statusStore.legend;
const patients = ref();
const a = ref([
    { id: '1', name: 'Doe, John Jr.', time: '8:00 am - 9:00 am', department: 'College of Agriculture' },
    { id: '2', name: 'Curtis, Anne', time: '9:00 am - 10:00 am', department: 'College of Information Sciences' },
    { id: '3', name: 'Reyes, Raul', time: '10:00 am - 11:00 am', department: 'Office of Student Affairs' }
]);

const selectedPatient = ref(null);
const metaKey = ref(true);
const router = useRouter();
const today = new Date();
const date = ref(today);
const formattedDate = computed(() => {
    if (!date.value) return '';
    const inputDate = new Date(date.value);
    return `${inputDate.getMonth() + 1}/${inputDate.getDate()}/${inputDate.getFullYear()}`;
});
const visibleSetAppointment = ref(false);

async function clickSave(){
    if(useAppoinment.user_details_id!== null&& useAppoinment.appointment_date!==null && useAppoinment.appointment_time!==null && useAppoinment.consent_form!== null){
        console.log('sent to backend', useAppoinment);
        await storeAppointment(useAppoinment,toast);
        patients.value = await fetchAppointment(formattedDate.value);
        visibleSetAppointment.value = false
    }
}
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    'user_details.lastname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.firstname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.middlename': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.department_program': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'status': { value: null, matchMode: FilterMatchMode.EQUALS },
});

onMounted(async () => {
    patients.value = await fetchAppointment(formattedDate.value);
});

function dialogOpen(event) {
    console.log('Row clicked', event.data);
    if (event) {
        selectedPatient.value = event.data;
        router.push({ name: 'record', params: { id: selectedPatient.value.id } });
        console.log('patid', selectedPatient.value.id);
    } else {
        console.warn('No patient selected');
    }
}

watch(date, async (newValue, oldValue) => {
    console.log('Date changed from', oldValue, 'to', newValue);
    patients.value = await fetchAppointment(formattedDate.value);
    console.log("FETCHED APPTS: ", patients.value);
    
});

const getStatusName = (statusId) => {
    console.log('Looking for status name for ID:', statusId);
    const status = useStatus.find(item => item.id == statusId);
    console.log('Found status:', status); // Log the found status
    return status ? status.name : 'Unknown';
};

const statusOptions = computed(() => {
    return useStatus.map(status => ({
        label: status.name,  // Name of the status
        value: status.id     // ID of the status (used for filtering)
    }));
});
</script>

<template>
    <Toast/>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <Calendar v-model="date" dateFormat="mm/dd/yy" :disabledDays="[0, 6]" :manualInput="false"/>
                    </div>
                    <div>
                        <Button label="Add New Appointment" @click="visibleSetAppointment = true" />
                    </div>
                    <!-- Status Filter Dropdown -->
                    <div class="flex justify-content-between mt-3">
                        <div class="flex gap-2 align-items-center">
                            <label for="statusFilter">Filter by Status</label>
                            <Dropdown id="statusFilter" v-model="filters.status.value" :options="statusOptions" optionLabel="label" optionValue="value" placeholder="Select Status" class="w-15rem" />
                        </div>
                    </div>
                </div>
                <DataTable v-model:selection="selectedPatient" v-model:filters="filters"  :globalFilterFields="['user_details.department_program','user_details.lastname','user_details.firstname','user_details.middlename']" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
                    <template #header>
                        <div class="flex justify-content-end">
                            <IconField iconPosition="left">
                                <InputIcon>
                                    <i class="pi pi-search" />
                                </InputIcon>
                                <InputText v-model="filters['global'].value" placeholder="Name Search" />
                            </IconField>
                        </div>
                    </template>
                    <template #empty> No patients found. </template>
                    <Column field="name" header="Patient Name">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.user_details?.lastname }}, {{ slotProps.data.user_details?.firstname }} {{ slotProps.data.user_details?.middlename }}</span>
                        </template>
                    </Column>
                    <Column header="Contact Number">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.user_details?.contact_no}}</span>
                        </template>
                    </Column>
                    <Column field="appointment_time" header="Time"></Column>
                    <Column field="department" header="Department">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.user_details?.department_program }}</span>
                        </template>
                    </Column>
                    <Column field="status" header="Status">
                        <template #body="slotProps">
                            <span>{{ getStatusName(slotProps.data.status) }}</span>
                        </template>
                        
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visibleSetAppointment" modal header="Set Appointment" :style="{ width: '35rem' }" :dismissableMask="true">
        <AppointmentPopup/>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visibleSetAppointment = false"></Button>
            <Button type="button" label="Save" @click="clickSave()"></Button>
        </div>
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

