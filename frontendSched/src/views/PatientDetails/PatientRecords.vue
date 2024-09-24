<script setup>
import { ref, onMounted } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue'
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
</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                
                <DataTable v-model:selection="selectedPatient" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen()">
                    <Column field="name" header="Patient Name"></Column>
                    <Column field="type" header="Type"></Column>
                    <Column field="department" header="Department"></Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visible" modal :header="selectedPatient?.name" :style="{ width: '70rem' }">
            <!-- <span class="p-text-secondary block mb-5">Update your information.</span> -->
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

