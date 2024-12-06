<script setup>
  import { ref } from 'vue';
  import axios from 'axios';

  const token = localStorage.getItem('token');

  // Define backupFile as a reactive reference
  const backupFile = ref(null);

  const backupDatabase = async () => {
    try {
        // Send request to backend to backup the database
        const response = await axios.get('/database/backup', {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        });

        // Check if response contains the URL
        if (response.data.fileUrl) {
            const downloadUrl = response.data.fileUrl;
            console.log('this is backup link', response.data.fileUrl);
            // Create an invisible anchor element to trigger the download
            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = downloadUrl.substring(downloadUrl.lastIndexOf('/') + 1); // Extract filename from URL
            // a.target = '_blank';  // Open the download in a new tab (optional)
            
            // Append anchor tag to body and trigger click
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);  // Remove the element after the download has started

            alert('Database backed up successfully');
        } else {
            console.error('Backup URL not found in the response.');
        }
    } catch (error) {
        console.error('Error during backup:', error);
        alert('Failed to backup the database');
    }
  };

  // File upload handler
  const handleFileUpload = (event) => {
    const file = event.target.files[0];
    console.log(file); 

    if (file && file.size > 0) {
      backupFile.value = file;
    } else {
      alert('Invalid file selected. Please choose a valid SQL backup file.');
    }
  };

  // Restore database handler
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
