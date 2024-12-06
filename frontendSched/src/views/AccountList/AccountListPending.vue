<script setup>
import { ref, onMounted, computed } from 'vue';
import { CreateAcc } from '@/api/ApiLogin';
import { FilterMatchMode } from 'primevue/api';
import { fetchAllPatient, fetchPendingRecord, deletePendingAccount } from '@/api/ApiPatientRecords';
import { departmentChoices } from '@/store/choices';
import { activateUserData, deactivateUserData } from '@/api/ApiUser';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();
const { type } = departmentChoices();  // Get the type options from the store

// Function to get the corresponding type name based on type.id
const getTypeName = (typeId) => {
  const typeItem = type.find(t => t.id == typeId);
  return typeItem ? typeItem.name : 'Unknown';  // Return 'Unknown' if no match
};


onMounted(async () => {
    // const data = await fetchAllPatient(); // Fetch the patient records
    const data = await fetchPendingRecord();
    // console.log('data', data);
    // console.log('datanew', datanew);
    patients.value = data;
});

const selectedPatient = ref();
const metaKey = ref(true);

const visible = ref(false);
const patients = ref([]);

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    'details.school_id_number': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'details.lastname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'details.firstname': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'details.middlename': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'details.department_program': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'details.type': { value: null, matchMode: FilterMatchMode.EQUALS },
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

const showAcceptDialog = ref(false);
const showDeclineDialog = ref(false);


async function acceptUser() {
    try {
        // Call the API to activate the user
        // await activateUserData(selectedPatient.value, toast);
        const create = await CreateAcc(selectedPatient.value.details, toast);
        await deletePendingAccount(selectedPatient.value.id, toast);
        // toast.add({ severity: 'success', summary: 'Success', detail: 'User activated successfully', life: 3000 });
        
        // Refresh the patient list
        patients.value = await fetchPendingRecord();
        
        // Close the dialog
        showAcceptDialog.value = false;
    } catch (error) {
        console.error("Error accepting user:", error);
        toast.add({ severity: 'error', summary: 'Error', detail: 'Failed to accept user', life: 3000 });
    }
}

async function declineUser() {
    try {
        // Call the API to delete the record from the pending_accounts table
        await deletePendingAccount(selectedPatient.value.id, toast);
        // toast.add({ severity: 'success', summary: 'Success', detail: 'User declined and deleted from pending accounts', life: 3000 });
        
        // Refresh the patient list
        patients.value = await fetchPendingRecord();
        
        // Close the dialog
        showDeclineDialog.value = false;
    } catch (error) {
        console.error("Error declining user:", error);
        toast.add({ severity: 'error', summary: 'Error', detail: 'Failed to decline user', life: 3000 });
    }
}

function openDecline(data){
    console.log(data);
    selectedPatient.value=data
    showDeclineDialog.value=true
}
function openAccept(data){
    console.log(data)
    selectedPatient.value=data
    console.log('selectedPatient',selectedPatient.value.details)
    showAcceptDialog.value=true
}
</script>

<template>
    <Toast />
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <DataTable v-model:filters="filters"  :globalFilterFields="['details.school_id_number','details.lastname','details.firstname','details.middlename','details.department_program']" :value="patients" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" paginator :rows="10">
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
                    <Column header="ID Number">
                        <template #body="slotProps">
                            <span>{{ slotProps.data.details.school_id_number}}</span>
                        </template>
                    </Column>
                    <Column header="Patient Name">
                        <template #body="slotProps">
                            <span>{{ slotProps.data?.details?.lastname}}, {{ slotProps.data?.details?.firstname}} {{ slotProps.data?.details?.middlename}}</span>
                        </template>
                    </Column>
                    <Column field="type" header="Type">
                        <template #body="slotProps">
                            <!-- {{ slotProps.data?.user_details?.type}} -->
                            {{ getTypeName(slotProps.data?.details?.type) }}
                            <!-- {{ slotProps.data }} -->
                        </template>
                    </Column>
                    <Column field="department" header="Department">
                        <template #body="slotProps">
                            {{ slotProps.data?.details?.department_program}}
                        </template>
                    </Column>
                    <Column header="Image">
                        <template #body="slotProps">
                            <!-- {{ slotProps.data.file_url}} -->
                            <a :href="slotProps.data.file_url" target="_blank" rel="noopener noreferrer">
                                <img :src="slotProps.data.file_url" alt="Uploaded Image" class="uploaded-image" style=" width: 200px;height:200px"/>
                            </a>
                        </template>
                    </Column>
                    <Column header="Action">
                        <template #body="slotProps">
                            <Button label="Accept User" @click="openAccept(slotProps.data)" />
                            <Button label="Decline User" severity="danger" @click="openDecline(slotProps.data)" />
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>
    </div>

    <Dialog v-model:visible="showAcceptDialog" modal header="Accept User" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <div class="field col-12 md:col-12">
            <label>Are you sure you want to accept this user?</label>
        </div>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="showAcceptDialog = false"></Button>
            <Button type="button" label="Confirm" @click="acceptUser"></Button>
        </div>
    </Dialog>

    <Dialog v-model:visible="showDeclineDialog" modal header="Decline User" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <div class="field col-12 md:col-12">
            <label>Are you sure you want to decline this user?</label>
        </div>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="showDeclineDialog = false"></Button>
            <Button type="button" label="Confirm" @click="declineUser"></Button>
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

