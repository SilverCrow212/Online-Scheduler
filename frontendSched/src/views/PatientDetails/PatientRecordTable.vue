<script setup>
import { ref, onMounted } from 'vue';

const selectedPatient = ref();
const metaKey = ref(true);

const visible = ref(false);
const records = ref(
    [{id:'1', appointmentdate:'09/23/2024', appointmenttime:'8:00 am - 9:00 am', servicerendered:'Tooth Cleaning', toothno: 'R35  and L36', medicine:'Doe, John Jr.', remark:'Student'},
    {id:'2', appointmentdate:'09/26/2024', appointmenttime:'11:00 am - 12:00 pm', servicerendered:'Tooth Extracting', toothno: 'R35  and L36', medicine:'Doe, John Jr.', remark:'Student'},
    {id:'3', appointmentdate:'09/27/2024', appointmenttime:'1:00 pm - 2:00 pm', servicerendered:'Yes', toothno: 'R35  and L36', medicine:'Doe, John Jr.', remark:'Student'},
    // {id:'2', name:'Curtis, Anne', type:'Faculty', department:'College of Information Sciences'},
    // {id:'3', name:'Reyes, Raul', type:'Staff', department:'Office of Student Affairs'}

    ]
);

    // '8:00 am - 9:00 am',
    //   '9:00 am - 10:00 am', 
    //   '10:00 am - 11:00 am',
    //   '11:00 am - 12:00 pm',
    //   '1:00 pm - 2:00 pm', 
    //   '2:00 pm - 3:00 pm', 
    //   '3:00 pm - 4:00 pm',

function dialogOpen(){
    visible.value = true;
}
</script>

<template>

<DataTable v-model:selection="selectedPatient" :value="records" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem" @row-click="dialogOpen()">
    <Column field="appointmentdate" header="Appointment Date"></Column>
    <Column field="appointmenttime" header="Appointment Time"></Column>
    <Column field="servicerendered" header="Service Rendered"></Column>
    <Column field="toothno" header="Tooth No."></Column>
    <Column field="medicine" header="Medicine Given / Prescribed"></Column>
    <Column field="remark" header="Remarks"></Column>
</DataTable>

</template>