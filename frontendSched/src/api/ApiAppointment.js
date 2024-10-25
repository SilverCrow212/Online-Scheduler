import axios from 'axios';

export async function fetchDashboardDataAdmin(date) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.post('/appointment', { date }, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};