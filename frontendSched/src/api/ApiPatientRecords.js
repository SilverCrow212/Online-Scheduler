import axios from 'axios';

export async function fetchAllPatient() {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.get('/allrecords',  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};


export async function fetchPatientRecord(patientId) {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.post('/patientrecord',{id:patientId},  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};

