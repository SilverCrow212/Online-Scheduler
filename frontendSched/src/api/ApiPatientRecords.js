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


export async function fetchPendingRecord() {
  try {
    const token = localStorage.getItem('token');
    const response = await axios.get('/getpendingaccounts',  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching all patient data:', error);
  }
};


export async function savePendingRecord(patientDetails) {
  try {
    const token = localStorage.getItem('token');
    const formData = new FormData();
    
    // Append the security question and answer
    formData.append('details', JSON.stringify(patientDetails));

    // Ensure the file is valid before appending
    if (patientDetails.file) {
      console.log('Appending file to FormData:', patientDetails.file);
      formData.append('demo', patientDetails.file);  // 'demo' is the name expected by the backend
    }

    // Log FormData contents
    console.log('FormData contents:');
    for (let [key, value] of formData.entries()) {
      console.log(`${key}: ${value}`);
    }

    // Send the request to the API
    const response = await axios.post('/savependingaccounts', formData, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Content-Type': 'multipart/form-data',
      },
    });

    console.log('Response:', response.data);
    return response.data;
  } catch (error) {
    console.error('Error uploading data:', error);
  }
};


export async function deletePendingAccount(id, toast) {
  const token = localStorage.getItem('token');
  try {
      const response = await axios.delete(`/pendingaccounts/${id}`,
        {
          headers: {
              'Authorization': `Bearer ${token}`,
            }
        }
      );
      if (response.status === 200) {
          toast.add({ severity: 'success', summary: 'Success', detail: 'Record deleted successfully', life: 3000 });
      }
      return response.data;
  } catch (error) {
      console.error('Error deleting record:', error);
      toast.add({ severity: 'error', summary: 'Error', detail: 'Failed to delete record', life: 3000 });
  }
}