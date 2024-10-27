<script setup>
import { ref, onMounted, computed, watch } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue';
import AppointmentPopup from '@/views/AppointmentList/AppointmentPopup.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
import { fetchAppointment } from '@/api/ApiAppointment';

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
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
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

</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <Calendar v-model="date" dateFormat="mm/dd/yy" :disabledDays="[0, 6]" />
                    </div>
                    <div>
                        <Button label="Add New Appointment" @click="visibleSetAppointment = true" />
                    </div>
                </div>
                <DataTable v-model:selection="selectedPatient" v-model:filters="filters"  :globalFilterFields="['name']" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
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
                    <Column field="name" header="Patient Name">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.user_details?.lastname }}, {{ slotProps.data.user_details?.firstname }} {{ slotProps.data.user_details?.middlename }}</span>
                        </template>
                    </Column>
                    <Column field="appointment_time" header="Time"></Column>
                    <Column field="department" header="Department">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.user_details?.department_program }}</span>
                        </template>
                    </Column>
                    <Column field="status" header="Status"></Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visibleSetAppointment" modal header="Set Appointment" :style="{ width: '35rem' }" :dismissableMask="true">
        <AppointmentPopup/>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visibleSetAppointment = false"></Button>
            <Button type="button" label="Save" @click="visibleSetAppointment = false"></Button>
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

