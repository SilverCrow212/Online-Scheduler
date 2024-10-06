<script setup>
import { ref, onMounted } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue';
import { useRouter } from 'vue-router';
import { FilterMatchMode } from 'primevue/api';
// import { ProductService } from '@/service/ProductService';

// onMounted(() => {
//     ProductService.getProductsMini().then((data) => (products.value = data));
// });

const products = ref();
const selectedPatient = ref();
const metaKey = ref(true);

const visible = ref(false);
const patients = ref(
    [{id:'1', name:'Doe, John Jr.', type:'Student', department:'College of Agriculture'},
    {id:'2', name:'Curtis, Anne', type:'Faculty', department:'College of Information Sciences'},
    {id:'3', name:'Reyes, Raul', type:'Staff', department:'Office of Student Affairs'}

    ]
);

function dialogOpen(){
    visible.value = true;
}

const router = useRouter();
function openProfile(){
    router.push({ name: 'editprofile', params: { id: selectedPatient.value.id } });
    console.log(selectedPatient.value);
}

const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
});
</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                
                <DataTable v-model:selection="selectedPatient" v-model:filters="filters"  :globalFilterFields="['name']" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" paginator :rows="10" @row-click="dialogOpen()">
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
                    <Column field="name" header="Patient Name"></Column>
                    <Column field="type" header="Type"></Column>
                    <Column field="department" header="Department"></Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visible" modal :header="selectedPatient?.name" :style="{ width: '70rem' }">
            <span class="p-text-secondary">
                <Button type="button" label="View Profile" icon="pi pi-profile" size="small" @click="openProfile()"/>
            </span>
            
            <!-- :loading="loading" @click="load"  -->
            <!-- <div class="flex align-items-center gap-3 mb-3">
                <label for="username" class="font-semibold w-6rem">Username</label>
                <InputText id="username" class="flex-auto" v-model="selectedPatient.id" autocomplete="off" />
            </div>
            <div class="flex align-items-center gap-3 mb-5">
                <label for="email" class="font-semibold w-6rem">Email</label>
                <InputText id="email" class="flex-auto" autocomplete="off" />
            </div> -->
            <PatientRecordTable/>
            <div class="flex justify-content-end gap-2">
                <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
                <Button type="button" label="Save" @click="visible = false"></Button>
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

