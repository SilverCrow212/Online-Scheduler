import axios from 'axios';
import carbone from 'carbone';

export function useCarbone() {
  async function generateReport() {
    try {
      const reportData = {
        // Your report data goes here
        name: 'John Doe',
        email: 'john@example.com',
        // Add more data as needed
      };

      const response = await axios.post('/generate-report', reportData);
      const buffer = response.data;
      downloadReport(buffer);
    } catch (error) {
      console.error('Error generating report:', error);
    }
  }

  function downloadReport(buffer) {
    // Create a download link and trigger the file download
    const url = window.URL.createObjectURL(new Blob([buffer]));
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', 'report.docx');
    document.body.appendChild(link);
    link.click();
    link.remove();
  }

  return { generateReport };
}