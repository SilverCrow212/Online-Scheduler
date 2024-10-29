import axios from 'axios';

export async function fetchHoliday() {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/holiday/show', {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching all Holidays:', error);
  }
}

export async function storeHoliday() {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/holiday/store', {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error Saving Holiday:', error);
  }
}
