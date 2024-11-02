<script setup>
import { ref, onMounted, computed, watch } from 'vue';
import HolidayAddPopup from '@/views/Holidays/HolidayPopup.vue';
import HolidayUpdatePopup from '@/views/Holidays/HolidayUpdatePopup.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
import { fetchHoliday, storeHoliday, updateHoliday, deleteHoliday } from '@/api/ApiHolidays';
import { holidayInput } from '@/store/holiday';

const holidayStore = holidayInput();
const useHoliday = holidayStore.setHoliday;

const holiday = ref();

const selectedHoliday = ref(null);
const metaKey = ref(true);
const router = useRouter();
const today = new Date();
const date = ref(today);
const formattedDate = computed(() => {
    if (!date.value) return '';
    const inputDate = new Date(date.value);
    return `${inputDate.getMonth() + 1}/${inputDate.getDate()}/${inputDate.getFullYear()}`;
});
const visibleSetHoliday = ref(false);
const visibleUpdateHoliday = ref(false);
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
});

onMounted(async () => {
    holiday.value = await fetchHoliday();
});

function dialogOpen(event) {
    if (event) {
        useHoliday.id = event.data.id;
        useHoliday.date = event.data.date; // assuming event.data has a date property
        useHoliday.description = event.data.description; // assuming it has a description property
        visibleUpdateHoliday.value = true;
    } else {
        console.warn('No patient selected');
    }
}

async function clickSave(){
    await storeHoliday(useHoliday);
    console.log('holiday', useHoliday)
    holiday.value = await fetchHoliday();
    visibleSetHoliday.value = false;
}

async function clickUpdate(){
    await updateHoliday(useHoliday);
    console.log('holiday', useHoliday)
    holiday.value = await fetchHoliday();
    visibleUpdateHoliday.value = false;
}

async function clickDelete(){
    await deleteHoliday(useHoliday);
    holiday.value = await fetchHoliday();
    visibleUpdateHoliday.value = false;
}
</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <Button label="Add Holiday" @click="visibleSetHoliday = true" />
                    </div>
                </div>
                <DataTable v-model:selection="selectedHoliday" v-model:filters="filters"  :globalFilterFields="['name']" :value="holiday" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen">
                    <!-- <template #header>
                        <div class="flex justify-content-end">
                            <IconField iconPosition="left">
                                <InputIcon>
                                    <i class="pi pi-search" />
                                </InputIcon>
                                <InputText v-model="filters['global'].value" placeholder="Name Search" />
                            </IconField>
                        </div>
                    </template> -->
                    <Column header="Date">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.date }}</span>
                        </template>
                    </Column>
                    <Column field="description" header="Description"></Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visibleSetHoliday" modal header="Set Holiday" :style="{ width: '35rem' }" :dismissableMask="true">
        <HolidayAddPopup/>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visibleSetHoliday = false"></Button>
            <Button type="button" label="Save" @click="clickSave"></Button>
        </div>
    </Dialog>

    <Dialog v-model:visible="visibleUpdateHoliday" modal header="Set Holiday" :style="{ width: '35rem' }" :dismissableMask="true">
        <HolidayUpdatePopup/>
        <div class="flex justify-content-end gap-2">
            <!-- {{ useHoliday }} -->
            <Button type="button" label="Cancel" severity="secondary" @click="visibleUpdateHoliday = false"></Button>
            <Button type="button" label="Delete" severity="danger" @click="clickDelete"></Button>
            <Button type="button" label="Update" @click="clickUpdate"></Button>
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

