<script setup>
import { ref,computed,watch,onMounted } from 'vue';
import { fetchDashboardDataAdmin } from '@/api/ApiDashboard';
const date = ref(null);
const values = ref();
onMounted(async () => {
   values.value = await fetchDashboardDataAdmin(date.value);
});


</script>

<template>
<div class="grid">
    {{ date }}
    <div class="col-12 lg:col-6 xl:col-4">
        <div class="card mb-0">
            <div class="flex justify-content-between mb-3">
                <div>
                    <span class="block text-500 font-medium mb-3">Total Patients</span>
                    <div class="text-900 font-medium text-xl">152</div>
                </div>
                <div class="flex align-items-center justify-content-center bg-blue-100 border-round" style="width: 2.5rem; height: 2.5rem">
                    <i class="pi pi-book text-blue-500 text-xl"></i>
                </div>
            </div>
            <span class="text-green-500 font-medium"></span>
            <span class="text-500">&nbsp;</span>
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-4">
        <div class="card mb-0">
            <div class="flex justify-content-between mb-3">
                <div>
                    <span class="block text-500 font-medium mb-3">Patients this week</span>
                    <div class="text-900 font-medium text-xl">35</div>
                </div>
                <div class="flex align-items-center justify-content-center bg-orange-100 border-round" style="width: 2.5rem; height: 2.5rem">
                    <i class="pi pi-map-marker text-orange-500 text-xl"></i>
                </div>
            </div>
            <span class="text-green-500 font-medium">&nbsp;</span>
            <span class="text-500">&nbsp;</span>
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-4">
        <div class="card mb-0">
            <div class="flex justify-content-between mb-3">
                <div>
                    <span class="block text-500 font-medium mb-3">Today Appointments</span>
                    <div class="text-900 font-medium text-xl">4</div>
                </div>
                <div class="flex align-items-center justify-content-center bg-cyan-100 border-round" style="width: 2.5rem; height: 2.5rem">
                    <i class="pi pi-arrow-down text-cyan-500 text-xl"></i>
                </div>
            </div>
            <span class="text-green-500 font-medium">&nbsp; </span>
            <span class="text-500">&nbsp;</span>
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-6">
        <div class="card mb-0">
            <Calendar v-model="date" inline class="w-full"/>
        </div>
    </div>
    <div class="col-12 lg:col-6 xl:col-6">
        <div class="card mb-0">
            <div class="flex justify-content-between mb-3">
                <div>
                    <span class="block text-500 font-medium mb-3">Appointments</span>
                    <div class="text-900 font-medium text-xl">Total? or table of patients?</div>
                </div>
                <!-- <div class="flex align-items-center justify-content-center bg-cyan-100 border-round" style="width: 2.5rem; height: 2.5rem">
                    <i class="pi pi-inbox text-cyan-500 text-xl"></i>
                </div> -->
            </div>
            <span class="text-green-500 font-medium">5/9</span>
            <span class="text-500"><-connected on the calendar, total or Table?</span>
        </div>
    </div>
    
</div>
</template>

