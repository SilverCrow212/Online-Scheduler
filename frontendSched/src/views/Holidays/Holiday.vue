<script setup>
import { ref, onMounted, computed, watch } from 'vue';
import AppointmentPopup from '@/views/AppointmentList/AppointmentPopup.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
import { fetchHoliday } from '@/api/ApiHolidays';

const holiday = ref();

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
    holiday.value = await fetchHoliday();
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

</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <Button label="Add Holiday" @click="visibleSetAppointment = true" />
                    </div>
                </div>
                <DataTable v-model:selection="selectedPatient" v-model:filters="filters"  :globalFilterFields="['name']" :value="holiday" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
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
                            <span>{{ slotProps.data.date }}</span>
                        </template>
                    </Column>
                    <Column field="description" header="Description"></Column>
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

