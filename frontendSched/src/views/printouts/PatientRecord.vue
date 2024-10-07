<script setup>
import {ref} from 'vue';
const records = ref([
    { id: '1', appointmentdate: '09/23/2024', servicerendered: 'Tooth Cleaning', toothno: 'R35 and L36', medicine: 'Rx', remark: 'Toothbrush 3x a day' },
    { id: '2', appointmentdate: '09/26/2024', servicerendered: 'Tooth Extracting', toothno: 'R35 and L36', medicine: 'Xtrajoss', remark: 'Toothbrush 3x a day' },
    { id: '3', appointmentdate: '09/27/2024', servicerendered: 'Yes', toothno: 'R35 and L36', medicine: 'Lola Remedios', remark: 'Toothbrush 3x a day' },
    { id: '4', appointmentdate: '09/28/2024', servicerendered: 'Yes', toothno: 'R35 and L36', medicine: 'Too Big', remark: 'Toothbrush 3x a day' },

]);
</script>
<template>
    
    <table class="styled-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Service/s rendered</th>
                <th>Tooth No.</th>
                <th>Medicine/s Given</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="record in records" :key="record.id">
                <td>{{ record.appointmentdate }}</td>
                <td>{{ record.servicerendered }}</td>
                <td>{{ record.toothno }}</td>
                <td>{{ record.medicine }}</td>
                <td>{{ record.remark }}</td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
.styled-table {
    width: 100%;
    border-collapse: collapse; /* Ensures borders are combined */
}

.styled-table th,
.styled-table td {
    border: 1px solid #ddd; /* Border for cells */
    padding: 8px; /* Padding inside cells */
    text-align: left; /* Align text to the left */
}

.styled-table th {
    background-color: #f2f2f2; /* Header background color */
    font-weight: bold; /* Bold font for headers */
}

.styled-table tr:nth-child(even) {
    background-color: #f9f9f9; /* Alternate row background color */
}

.styled-table tr:hover {
    background-color: #e2e2e2; /* Highlight on row hover */
}

@media print {
    /* Hide any non-essential elements */
    .header, 
    .footer, 
    .navigation {
        display: none;
    }

    /* Optional: Adjust the main content */
    .content {
        margin: 0;
        padding: 0;
    }
}

</style>

