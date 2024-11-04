import axios from 'axios';

export async function fetchAppointment(date) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/appointment/show_all_by_date', {
      params: { date },
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching appointment:', error);
  }
}

export async function fetchAppointmentOngoing(date) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/appointment/show_all_by_date_ongoing', {
      params: { date },
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching appointment:', error);
  }
}

export async function fetchAppointmentPatient(user_details_id) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/appointment/show_all', {
      params: { user_details_id },
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching appointment:', error);
  }
}

export async function storeAppointment(data) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.post('/appointment/store',data, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error storing appointment:', error);
  }
}

