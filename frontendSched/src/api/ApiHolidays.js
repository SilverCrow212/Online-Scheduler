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

export async function storeHoliday(holiday) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.post('/holiday/store', {...holiday}, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error Saving Holiday:', error);
  }
}

export async function updateHoliday(holiday) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.put('/holiday/update', {...holiday}, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error Saving Holiday:', error);
  }
}

export async function deleteHoliday(holiday) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.delete('/holiday/delete',  {
      params:holiday,
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error Saving Holiday:', error);
  }
}
