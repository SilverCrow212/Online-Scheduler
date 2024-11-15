import { defineStore } from 'pinia';
import { ref } from 'vue';

export const appointment = defineStore('appointment', () => {
  // Define default appointment state
  const getDefaultAppointmentState = () => ({
    id: null,
    user_details_id: null,
    consent_form: null,
    enccode: null,
    appointment_date: null,
    appointment_time: null,
    status: 2, // Default status
    created_at: null,
    updated_at: null,
  });

  // Reactive state using `ref`
  const appointmentDetails = ref(getDefaultAppointmentState());

  // Reset function to reset state to default values
  const resetAppointmentDetails = () => {
    console.log('Before Reset:', appointmentDetails.value);
    // Use Object.assign to reset deeply reactive state
    Object.assign(appointmentDetails.value, getDefaultAppointmentState()); 
    console.log('After Reset:', appointmentDetails.value);
  };

  return { appointmentDetails, resetAppointmentDetails };
});
