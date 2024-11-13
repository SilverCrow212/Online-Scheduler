<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
// Use the URLSearchParams to extract query parameters
const urlParams = new URLSearchParams(window.location.search);
const patientId = urlParams.get('id'); // This gets the 'id' from the URL

async function fetchRecords(id) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/print_records', {
      params: { id },
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching records:', error);
  }
}

// You can now use this patientId to fetch the related records or data
const records = ref([]);

// Optionally filter records based on the received patientId
// const patientRecords = ref(records.value.filter(record => record.id === patientId));

onMounted(async () => {
  if (patientId) {
    const fetchedRecords = await fetchRecords(patientId);
    // Ensure `services_rendered` is parsed before using it
    fetchedRecords.data.forEach(record => {
      record.services_rendered = JSON.parse(record.services_rendered);  // Parse the stringified JSON
    });
    records.value = fetchedRecords.data;  // Set the fetched records to the `records` ref
  } else {
    console.warn('No patient ID found in URL');
  }
});
</script>

<template>
    Name: {{records[0]?.lastname}}, {{records[0]?.firstname}}
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
           <tr v-for="record in records" :key="record.appointment_id">
                <td>{{ record.appointment_date }}</td>
                <td>
                    <span v-for="service in record.services_rendered" :key="service.id">
                        {{ service.name }}, 
                    </span>
                </td>
                <td>{{ record.tooth_number }}</td>
                <td>{{ record.medicine_prescribed }}</td>
                <td>{{ record.remarks }}</td>
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

