import axios from 'axios';

export async function fetchDataReport(date) {
  try {
    console.log('date',date)
    const token = localStorage.getItem('token');
    const response = await axios.get('/export_report', {
      headers: {
        Authorization: `Bearer ${token}`,
      },
      params: {
        date: date,
      },
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching data report:', error);
  }
}