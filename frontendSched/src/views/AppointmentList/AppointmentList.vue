<script setup>
import { ref, onMounted, computed } from 'vue';
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
    [{id:'1', name:'Doe, John Jr.', time:'8:00 am - 9:00 am', department:'College of Agriculture'},
    {id:'2', name:'Curtis, Anne', time:'9:00 am - 10:00 am', department:'College of Information Sciences'},
    {id:'3', name:'Reyes, Raul', time:'10:00 am - 11:00 am', department:'Office of Student Affairs'}

    ]
);

function dialogOpen(){
    visible.value = true;

}

const today = new Date();
const date = ref(today);
const formattedDate = computed(() => {
    if (!date.value) return '';
    const inputDate = new Date(date.value);
    return `${inputDate.getMonth() + 1}/${inputDate.getDate()}/${inputDate.getFullYear()}`;
});
</script>

<template>
    <div class="grid">
        <!-- {{ formattedDate }} -->
        <div class="col-12">
            <div class="card">
                <Calendar v-model="date" dateFormat="mm/dd/yy"/>
                <DataTable v-model:selection="selectedPatient" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen()">
                    <Column field="name" header="Patient Name"></Column>
                    <Column field="time" header="Time"></Column>
                    <Column field="department" header="Department"></Column>
                </DataTable>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
:deep(.p-datatable-frozen-tbody) {
    font-weight: bold;
}

:deep(.p-datatable-scrollable .p-frozen-column) {
    font-weight: bold;
}
</style>

