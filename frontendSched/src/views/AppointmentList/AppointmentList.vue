<script setup>
import { ref, onMounted, computed } from 'vue';
import PatientRecordTable from '@/views/PatientDetails/PatientRecordTable.vue'
import AppointmentPopup from '@/views/AppointmentList/AppointmentPopup.vue'
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

const visibleSetAppointment = ref(false);
</script>

<template>
    <div class="grid">
        <!-- {{ formattedDate }} -->
        <div class="col-12">
            <div class="card">
                <div class="flex justify-content-between align-items-center">
                    <div>
                        <Calendar v-model="date" dateFormat="mm/dd/yy"/>
                    </div>
                    <div>
                        <Button label="Add New Appointment" @click="visibleSetAppointment = true" />
                    </div>
                </div>
                <DataTable v-model:selection="selectedPatient" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen()">
                    <Column field="name" header="Patient Name"></Column>
                    <Column field="time" header="Time"></Column>
                    <Column field="department" header="Department"></Column>
                    <Column field="status" header="Status"></Column>
                </DataTable>
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visibleSetAppointment" modal header="Edit Profile" :style="{ width: '25rem' }">
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

