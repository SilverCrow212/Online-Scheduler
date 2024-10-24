import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const appointment = defineStore('appointment', () => {
    const userDetails = ref([
        {id: null, 
        user_details_id:null,
        consent_form:null,
        enccode:null, 
        appointment_date:null, 
        appointment_time:null, 
        // clinicalDetails:null, 
        status:null,
        created_at:null },
    ]);
    return { userDetails };
});
