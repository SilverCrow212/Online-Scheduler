import axios from 'axios';

export async function fetchDataReport() {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.get('/export_report',  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};