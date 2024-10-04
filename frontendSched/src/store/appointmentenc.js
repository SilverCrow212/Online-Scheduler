import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const appointment = defineStore('appointment', () => {
    const userDetails = ref([
        {id: null, enccode:null, appointmentDate:null, appointmentTime:null, clinicalDetails:null, created_at:null },
    ]);
    return { userDetails };
});
