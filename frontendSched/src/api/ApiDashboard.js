const fetchDashboardData = async () => {
    try {
      const response = await axios.get('/api/all-patients');
      dashboardData.value = response.data.patient_details;
      dashboardToday.value= response.data.total_patients_today;
      dashboardTotal.value=response.data.total_patients;
      // console.log('Today',dashboardToday.value);
    } catch (error) {
      console.error('Error fetching all patient data:', error);
    }
  };
  

  const fetchAdmittedDashboardData = async () => {
    try {
      // Make an API call to fetch dashboard data
      const response = await axios.get('/api/admitted-patients');
      currentlyAdmitted.value = response.data.patient_details;
      admittedToday.value=response.data.total_admitted_today;
      admittedTotal.value=response.data.total_admitted;
      admittedActive.value=response.data.active_admitted;
      dischargedToday.value=response.data.discharged_today;
      
  
      console.log(currentlyAdmitted.value);
    } catch (error) {
      console.error('Error fetching all patient data:', error);
    }
  };

  