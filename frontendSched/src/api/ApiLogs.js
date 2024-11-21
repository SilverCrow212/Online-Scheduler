import axios from 'axios';

export async function fetchLogs() {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.get('/logs',  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching all logs', error);
  }
};

