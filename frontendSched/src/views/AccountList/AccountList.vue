<script setup>
import { ref, onMounted, computed } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
import { fetchAllPatient } from '@/api/ApiPatientRecords';
import { departmentChoices } from '@/store/choices';
import { activateUserData, deactivateUserData } from '@/api/ApiUser';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();
const { type } = departmentChoices();  // Get the type options from the store

// Function to get the corresponding type name based on type.id
const getTypeName = (typeId) => {
  const typeItem = type.find(t => t.id == typeId);
  return typeItem ? typeItem.name : 'Dependent';  // Return 'Unknown' if no match
};


onMounted(async () => {
    const data = await fetchAllPatient(); // Fetch the patient records
    patients.value = data;
});

const selectedPatient = ref();
const metaKey = ref(true);

const visible = ref(false);
const patients = ref(null);

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    'school_id_number': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.lastname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.firstname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.middlename': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.department_program': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_details.type': { value: null, matchMode: FilterMatchMode.EQUALS },
});


const typeOptions = computed(() => {
    return type.map(t => ({
        name: t.name, // Display name
        id: t.id      // The id will be used for filtering
    }));
});

async function deactivateUser(){
    await deactivateUserData(selectedPatient.value,toast);
    // window.location.reload();
    patients.value = await fetchAllPatient();
    showDeactivate.value=false
}
async function activateUser(){
    await activateUserData(selectedPatient.value,toast);
    // window.location.reload();
    patients.value = await fetchAllPatient();
    showActivate.value=false
}

const showActivate = ref(false)
const showDeactivate = ref(false)
</script>

<template>
    <Toast />
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <div class="flex gap-3 align-items-center mb-3">
                <!-- Type Filter Dropdown -->
                <div class="flex flex-column gap-2 align-items-start">
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
                
                <!-- Activate User -->
                <div class="flex flex-column gap-2 align-items-start">
                    <label for="activateUser">Activate User</label>
                    <Button label="Activate Account" @click="showActivate=true" :disabled="!selectedPatient"/>
                </div>

                <!-- Deactivate User -->
                <div class="flex flex-column gap-2 align-items-start">
                    <label for="deactivateUser">Deactivate User</label>
                    <Button label="Deactivate Account" @click="showDeactivate=true" :disabled="!selectedPatient"/>
                </div>
            </div>
                <DataTable v-model:selection="selectedPatient" v-model:filters="filters"  :globalFilterFields="['school_id_number','user_details.lastname','user_details.firstname','user_details.middlename','user_details.department_program']" :value="patients" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" paginator :rows="10">
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
                    <Column selectionMode="multiple" headerStyle="width: 3rem"></Column>
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
                    <Column header="Account Status">
                        <template #body="slotProps">
                            <!-- {{ slotProps.data.status }} -->
                            <Tag v-if="slotProps.data.status==0" severity="danger" value="Inactive"></Tag>
                            <Tag v-else value="Active"></Tag>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="showActivate" modal header="Activate User" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <div class="field col-12 md:col-12">
            <label>Are you sure you entered the correct entries?</label>
        </div>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="showActivate = false"></Button>
            <Button type="button" label="Confirm" @click="activateUser"></Button>
        </div>
    </Dialog>
    <Dialog v-model:visible="showDeactivate" modal header="Deactivate User" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <div class="field col-12 md:col-12">
            <label>Are you sure you entered the correct entries?</label>
        </div>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="showDeactivate = false"></Button>
            <Button type="button" label="Confirm" @click="deactivateUser"></Button>
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

