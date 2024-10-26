import axios from 'axios';

export async function fetchDashboardDataAdmin(date) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/appointment/show_date', { params:{date} }, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};