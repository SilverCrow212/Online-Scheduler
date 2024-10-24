import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';



export const login = defineStore('login', () => {
    const loginDetails = ref({
        school_id_number:null,
        password:null
     },
    );
    return { loginDetails };
});

export const user = defineStore('user', () => {
    const userDetails = ref({
        id: null, 
        id_number:null, 
        personal_details:null, 
        status:null, 
        created_at:null },
    );
    return { userDetails };
});
























