<template>
    <div class="card">
    Select Date(Based on Month)
    <div class="mb-4">
      <Calendar v-model="date" dateFormat="mm/dd/yy" />
    </div>
    <div>
      <!-- <button @click="downloadDocx">Download DOCX</button> -->
      <button @click="getData">Download DOCX</button>
    </div>
</div>
<!-- {{ templateData }} -->
</template>
<script setup>
import { ref } from 'vue';
import { fetchDataReport } from '@/api/ApiExportReport';
import Docxtemplater from 'docxtemplater';
import PizZip from 'pizzip';
import { saveAs } from 'file-saver';
// Sample data to replace in the template

async function getData (){

  const data= await fetchDataReport();
  console.log('data',data)
  if(data){
    templateData.value = data;
    console.log(templateData.value)
    downloadDocx();
  }
  
}


const templateData = ref(null);
const TestOnly = {
  name: {testname:'TestingOnly'}
}
// Function to handle DOCX download
const downloadDocx = async () => {
  console.log('testData',templateData.value)
  try {
    // Fetch the DOCX template (ensure the template is in your public directory or accessible path)
    const response = await fetch('/reports/reports.docx'); // Use the correct path, e.g., '/reports/reports.docx' if it's in the public folder
    if (!response.ok) {
      throw new Error('Template not found');
    }
    const arrayBuffer = await response.arrayBuffer();
    // Load the template into PizZip
    const zip = new PizZip(arrayBuffer);
    // Initialize docxtemplater with the PizZip instance
    const doc = new Docxtemplater(zip, { paragraphLoop: true, lineBreaks: true });
    // Set the data to replace in the template
    doc.setData(templateData.value);
    // Render the document (replace the placeholders with the actual data)
    doc.render();
    // Generate the final document (output as a binary .docx file)
    const out = doc.getZip().generate({ type: 'blob' });
    // Trigger the download
    saveAs(out, 'generated_document.docx');
  } catch (error) {
    console.error('Error generating DOCX:', error);
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