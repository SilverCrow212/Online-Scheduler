<script setup>
import { ref, onMounted, computed } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
import { fetchAllPatient } from '@/api/ApiPatientRecords';
import { departmentChoices } from '@/store/choices';

const { type } = departmentChoices();  // Get the type options from the store

// Function to get the corresponding type name based on type.id
const getTypeName = (typeId) => {
  const typeItem = type.find(t => t.id == typeId);
  return typeItem ? typeItem.name : 'Unknown';  // Return 'Unknown' if no match
};


onMounted(async () => {
    const data = await fetchAllPatient(); // Fetch the patient records
    patients.value = data;
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
    router.push({ name: 'editprofile', params: { id: selectedPatient.value.id } });
    console.log(selectedPatient.value);
}

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    'user_details.lastname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.firstname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.middlename': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.department_program': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.type': { value: null, matchMode: FilterMatchMode.EQUALS },
});

const openProfileWindow = (patient) => {
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
</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="flex gap-3 align-items-center mb-3">
                    <!-- Type Filter Dropdown -->
                    <div class="flex gap-2 align-items-center">
                        <label for="typeFilter">Filter by Type</label>
                        <Dropdown 
                            id="typeFilter" 
                            v-model="filters['user_details.type'].value" 
                            :options="typeOptions" 
                            optionLabel="name" 
                            optionValue="id" 
                            placeholder="Select Type"
                        />
                    </div>
                </div>
                <DataTable v-model:selection="selectedPatient" v-model:filters="filters"  :globalFilterFields="['user_details.lastname','user_details.firstname','user_details.middlename']" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" paginator :rows="10" @row-click="dialogOpen">
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
                    <Column header="Patient Name">
                        <template #body="slotProps">
                            <span>{{ slotProps.data?.user_details?.lastname}}, {{ slotProps.data?.user_details?.firstname}} {{ slotProps.data?.user_details?.middlename}}</span>
                        </template>
                    </Column>
                    <Column field="type" header="Type">
                        <template #body="slotProps">
                            <!-- {{ slotProps.data?.user_details?.type}} -->
                            {{ getTypeName(slotProps.data?.user_details?.type) }}
                            <!-- {{ slotProps.data }} -->
                        </template>
                        
                    </Column>
                    <Column field="department" header="Department">
                        <template #body="slotProps">
                            {{ slotProps.data?.user_details?.department_program}}
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visible" modal :header="selectedPatient?.name" :style="{ width: '70rem' }" :dismissableMask="true">
        <div class="flex justify-content-end">
            <!-- {{selectedPatient.id}} -->
            <!-- <span class="p-text-secondary mr-2">
                <Button type="button" label="View Profile" icon="pi pi-profile" size="small" @click="openProfile()" />
            </span> -->
            <span class="p-text-secondary">
                <Button type="button" label="Print Record" icon="pi pi-profile" size="small" @click="openProfileWindow(selectedPatient)" />
            </span>
        </div>
            <PatientRecordTable :patient="selectedPatient"/>
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

