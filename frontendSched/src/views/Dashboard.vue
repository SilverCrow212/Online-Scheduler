<script setup>
import { ref,computed,watch,onMounted } from 'vue';
import { fetchDashboardDataAdmin } from '@/api/ApiDashboard';
import { fetchAppointment } from '@/api/ApiAppointment';
import { FilterMatchMode } from 'primevue/api';

const today = new Date();
const date = ref(today);
const values = ref();
const patients = ref();
onMounted(async () => {
   values.value = await fetchDashboardDataAdmin(date.value);
   patients.value = await fetchAppointment(formattedDate.value);
});

const formattedDate = computed(() => {
    if (!date.value) return '';
    const inputDate = new Date(date.value);
    return `${inputDate.getMonth() + 1}/${inputDate.getDate()}/${inputDate.getFullYear()}`;
});
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
});

watch(date, async (newValue, oldValue) => {
    console.log('Date changed from', oldValue, 'to', newValue);
    patients.value = await fetchAppointment(formattedDate.value);
    console.log("FETCHED APPTS: ", patients.value);
    
});

</script>

<template>
<div class="grid">
    <div class="col-12 lg:col-6 xl:col-4">
        <div class="card mb-0">
            <div class="flex justify-content-between mb-3">
                <div>
                    <span class="block text-500 font-medium mb-3">Total Patients</span>
                    <div class="text-900 font-medium text-xl">{{ values?.total_patients }}</div>
                </div>
                <div class="flex align-items-center justify-content-center bg-blue-100 border-round" style="width: 2.5rem; height: 2.5rem">
                    <i class="pi pi-book text-blue-500 text-xl"></i>
                </div>
            </div>
            <span class="text-green-500 font-medium"></span>
            <span class="text-500">&nbsp;</span>
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-4">
        <div class="card mb-0">
            <div class="flex justify-content-between mb-3">
                <div>
                    <span class="block text-500 font-medium mb-3">Patients this week</span>
                    <div class="text-900 font-medium text-xl">{{values?.total_appointments_this_week}}</div>
                </div>
                <div class="flex align-items-center justify-content-center bg-orange-100 border-round" style="width: 2.5rem; height: 2.5rem">
                    <i class="pi pi-map-marker text-orange-500 text-xl"></i>
                </div>
            </div>
            <span class="text-green-500 font-medium">&nbsp;</span>
            <span class="text-500">&nbsp;</span>
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-4">
        <div class="card mb-0">
            <div class="flex justify-content-between mb-3">
                <div>
                    <span class="block text-500 font-medium mb-3">Today Appointments</span>
                    <div class="text-900 font-medium text-xl">{{ values?.total_appointments_today }}</div>
                </div>
                <div class="flex align-items-center justify-content-center bg-cyan-100 border-round" style="width: 2.5rem; height: 2.5rem">
                    <i class="pi pi-arrow-down text-cyan-500 text-xl"></i>
                </div>
            </div>
            <span class="text-green-500 font-medium">&nbsp; </span>
            <span class="text-500">&nbsp;</span>
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-4">
        <div class="card mb-0">
            <Calendar v-model="date" inline class="w-full" :disabledDays="[0, 6]" />
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-8">
        <div class="card mb-0">
            <div>
                <span class="block text-500 font-medium mb-3">Appointments</span>
                <!-- <div class="text-900 font-medium text-xl">Total? or table of patients?</div> -->
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
</template>

