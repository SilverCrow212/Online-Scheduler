import axios from 'axios';

export async function fetchUserData() {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.get('/user/user_details',  {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });

    return response.data;
  } catch (error) {
    console.error('Error fetching User Data:', error);
  }
};

export async function activateUserData(data, toast) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.post('/user/activate_account', {data}, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    toast.add({ 
      severity: 'success', 
      summary: 'Successful', 
      detail: 'You have Activated the User Successfully.', 
      life: 3000 
    });
    return response.data;
  } catch (error) {
    toast.add({ severity: 'error', summary: 'An Error Occured', detail: 'Message Detail', life: 3000 });
    console.error('Error fetching User Data:', error);
  }
};

export async function deactivateUserData(data, toast) {
  try {
    const token = localStorage.getItem('token');

    const response = await axios.post('/user/deactivate_account', {data}, {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    toast.add({ 
      severity: 'success', 
      summary: 'Successful', 
      detail: 'You have Deactivated the User Successfully.', 
      life: 3000 
    });
    return response.data;
  } catch (error) {
    console.error('Error fetching User Data:', error);
    toast.add({ severity: 'error', summary: 'An Error Occured', detail: 'Message Detail', life: 3000 });
  }
};

