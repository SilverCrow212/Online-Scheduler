import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const appointment = defineStore('appointment', () => {
    const appointmentDetails = ref(
        {
            id: null, 
            user_details_id:null,
            consent_form:null,
            enccode:null, 
            appointment_date:null, 
            appointment_time:null, 
            status:2,
            created_at:null,
            updated_at:null,
     },
    );

    const resetAppointmentDetails = () => {
        appointmentDetails.value = {
            id: null, 
            user_details_id: null,
            consent_form: null,
            enccode: null, 
            appointment_date: null, 
            appointment_time: null, 
            status: 2,  // default status
            created_at: null,
            updated_at: null,
        };
    };

    
    return { appointmentDetails, resetAppointmentDetails };
});
