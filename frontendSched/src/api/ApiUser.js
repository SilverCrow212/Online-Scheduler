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