import axios from 'axios';

export async function storeClinicalDetails(appointmentId,patientData) {
    try {
      const token = localStorage.getItem('token');
      const response = await axios.post('/teeth/store',{id:appointmentId,data:patientData},  {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      return response.data;
    } catch (error) {
      console.error('Error fetching all patient data:', error);
    }
  };
  