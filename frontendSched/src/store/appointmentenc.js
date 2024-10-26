import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const appointment = defineStore('appointment', () => {
    const userDetails = ref([
        {
            id: null, 
            user_details_id:null,
            consent_form:null,
            enccode:null, 
            appointment_date:null, 
            appointment_time:null, 
            status:null,
            created_at:null,
            updated_at:null,
     },
    ]);

    const clinicalDetails = ref([
        {
            id: null, 
            appointment_id:null,
            hygiene_status:null,
            services_rendered:null, 
            teeth_questionmark:null, 
            medicine_given:null, 
            remarks:null,
            created_at:null,
            updated_at:null,
        },
    ]);
    return { userDetails, clinicalDetails };
});
