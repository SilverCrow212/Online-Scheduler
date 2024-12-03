<script setup>
  import { ref } from 'vue';
  import axios from 'axios';

  const token = localStorage.getItem('token')
  const backupFile = ref(null) // Store the uploaded file
  console.log(token);
  const backupDatabase = async () => {
    console.log(token);
    
    try {
      // Send request to backend to backup the database
      const response = await axios.get('/database/backup', {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });

      // Check if response contains the URL
      if (response.data.fileUrl) {
        // Trigger the download by setting the URL as the location
        window.location.href = response.data.fileUrl;
      } else {
        console.error('Backup URL not found in the response.');
      }
    } catch (error) {
      console.error('Error during backup:', error);
      alert('Failed to backup the database');
    }
  }


  // const handleFileUpload = (event) => {
  //   backupFile.value = event.target.files[0];
  // }

  // const restoreDatabase = async () => {
  //   if (!backupFile.value) {
  //     alert('Please select a backup file.');
  //     return;
  //   }

  //   const formData = new FormData();
  //   formData.append('backup_file', backupFile.value);

  //   try {
  //     // Send the file to the backend to restore the database
  //     const response = await axios.post('/database/restore', formData, {
  //       headers: {
  //         Authorization: `Bearer ${token}`,
  //       },
  //     });
  //     alert('Database restored successfully');
  //   } catch (error) {
  //     console.error('Error during restore:', error);
  //     alert('Failed to restore the database');
  //   }
  // }

    const handleFileUpload = (event) => {
      const file = event.target.files[0];
      console.log(file); 

      if (file && file.size > 0) {
        backupFile.value = file;
      } else {
        alert('Invalid file selected. Please choose a valid SQL backup file.');
      }
    };

    const restoreDatabase = async () => {
      if (!backupFile.value) {
        alert('Please select a backup file.');
        return;
      }

      const formData = new FormData();
      formData.append('backup_file', backupFile.value); 

      try {
       
        const response = await axios.post('/database/restore', formData, {
          headers: {
            'Authorization': `Bearer ${token}`,
            'Content-Type': 'multipart/form-data',
          },
        });
        alert('Database restored successfully');
      } catch (error) {
        console.error('Error during restore:', error);
        alert('Failed to restore the database');
      }
    };
</script>

<template>
  <div class="card">
    <button @click="backupDatabase">Backup Database</button>
  </div>
  <div class="card">
    <input type="file" @change="handleFileUpload" />
    <button class="ml-5" @click="restoreDatabase" :disabled="!backupFile">Restore Database</button>
  </div>
</template>