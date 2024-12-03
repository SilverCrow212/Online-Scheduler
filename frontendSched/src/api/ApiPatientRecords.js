import axios from 'axios';

export async function fetchAllPatient() {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.get('/all_patients',  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};


export async function fetchPatientRecord(patientId,toast) {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.post('/patientrecord',{id:patientId},  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    toast.add({ 
      severity: 'success', 
      summary: 'Account Created Successfully', 
      detail: 'You have created an account successfully.', 
      life: 3000 
  });
    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
    toast.add({ severity: 'error', summary: error.response.data.message, detail: 'Message Detail', life: 3000 });
  }
};

