<template>
  <div class="card">
    Select Date (Based on Month)
    <div class="mb-4">
      <Calendar v-model="date" dateFormat="mm/yy" :manualInput="false"/>
    </div>
    <div>
      <button @click="downloadXlsx">Download Excel</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import * as XLSX from 'xlsx';  // Import the full XLSX library

const date = ref();

// Sample data to replace in the template
const templateData = ref({
  name: 'John Doe',
  date: '', // This will be dynamically updated based on user selection
  otherInfo: 'Some additional data'
});

// Function to handle Excel download
const downloadXlsx = async () => {
  try {
    // Update templateData with the selected date
    templateData.value.date = date.value ? date.value : 'October 2024'; // Use actual selected date, fallback to 'October 2024'

    // Force re-fetching by appending a timestamp to the file URL (to prevent cache issues)
    const timestamp = new Date().getTime();
    const response = await fetch(`/reports/reports.xlsx?timestamp=${timestamp}`);  // File is in the 'public/reports' folder
    if (!response.ok) {
      throw new Error('Template not found');
    }
    const arrayBuffer = await response.arrayBuffer();

    // Load the Excel template into a workbook
    const wb = XLSX.read(arrayBuffer, { type: 'array' });

    // Access the first sheet in the template (assuming you want to modify the first sheet)
    const ws = wb.Sheets[wb.SheetNames[0]];

    // Get the reference to the range of the sheet
    const range = XLSX.utils.decode_range(ws['!ref']);

    // Iterate over each cell in the range
    for (let row = range.s.r; row <= range.e.r; row++) {
      for (let col = range.s.c; col <= range.e.c; col++) {
        const cellAddress = XLSX.utils.encode_cell({ r: row, c: col });
        let cell = ws[cellAddress];

        if (cell && typeof cell.v === 'string') {
          // Save the original style (if any)
          const originalStyle = cell.s ? { ...cell.s } : null; // Copy style if it exists

          // Replace placeholders with corresponding data
          cell.v = cell.v.replace(/{name}/g, templateData.value.name)
                         .replace(/{date}/g, templateData.value.date)
                         .replace(/{otherInfo}/g, templateData.value.otherInfo);

          // Restore the original style if it was available
          if (originalStyle) {
            cell.s = originalStyle;
          }
        }
      }
    }

    // Use writeFile to directly trigger the download (keeping original formatting)
    XLSX.writeFile(wb, 'generated_report.xlsx');
  } catch (error) {
    console.error('Error generating Excel:', error);
  }
};
</script>

<style scoped>
button {
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px;
}
button:hover {
  background-color: #45a049;
}
</style>
