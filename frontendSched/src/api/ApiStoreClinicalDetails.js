import axios from 'axios';

export async function storeClinicalDetails(appointmentId,patientData,toast) {
    try {
      const token = localStorage.getItem('token');
      const response = await axios.post('/teeth/store',{appointment_id:appointmentId,...patientData},  {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      toast.add({ 
        severity: 'success', 
        summary: 'Saving Successful', 
        detail: 'You saved successfully.', 
        life: 3000 
      });
      return response.data;
    } catch (error) {
      console.error('Error fetching all patient data:', error);
      toast.add({ severity: 'error', summary: error.response.data.message, detail: 'Message Detail', life: 3000 });
    }
  };
  
  export async function updateClinicalDetails(appointmentId, patientData, toast) {
    try {
      const token = localStorage.getItem('token');
      
      // Construct the URL using a template literal
      const url = `/teeth/update/${appointmentId}`;
      
      const response = await axios.post(url, patientData, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      toast.add({ 
        severity: 'success', 
        summary: 'Update Successful', 
        detail: 'You updated successfully.', 
        life: 3000 
      });
      return response.data;
    } catch (error) {
      console.error('Error updating clinical details:', error);
      toast.add({ severity: 'error', summary: error.response.data.message, detail: 'Message Detail', life: 3000 });
    }
  }

  export async function fetchClinicalDetails(appointmentId) {
    try {
      const token = localStorage.getItem('token');
      
      // Construct the URL using a template literal
      const url = `/teeth/fetch/${appointmentId}`;
      
      const response = await axios.get(url, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
  
      return response.data;
    } catch (error) {
      console.error('Error updating clinical details:', error);
    }
  }