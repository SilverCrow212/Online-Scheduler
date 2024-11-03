<script setup>
import { ref,computed,watch } from 'vue';
import PatientRecordTable from '@/views/PatientOnlyView/PatientRecordTable.vue';
</script>

<template>

    <div class="col-12 lg:col-12 xl:col-12">
        <div class="card mb-0">
            <PatientRecordTable/>
        </div>
    </div>


</template>

