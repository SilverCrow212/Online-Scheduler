import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const createacc = defineStore('createacc', () => {
    const accDetails = ref({
        school_id_number: null, 
        password: null, 
        firstname:null, 
        lastname:null, 
        middlename:null,
        birthday:null,
        user_type:'patient',
        type:null, 
        employee_student_type:null, 
        office_level:null, 
        department_program:null, 
        sex:null, 
        email:null, 
        contact_no:null, 
        civil_status:null, 
        guardian_firstname:null, 
        guardian_middlename:null, 
        guardian_lastname:null, 
        guardian_no:null, 
        permanent_address:null, 
        bsu_address:null, 
        updated_at:null, 
        created_at:null,
        age:null,
        security_answer:null,
        security_question:null
     },
    );
    const resetAccDetails = () => {
        console.log('Before Reset:', accDetails.value);  // Log current state
        accDetails.value = {
            school_id_number: null, 
            password: null, 
            firstname: null, 
            lastname: null, 
            middlename: null,
            birthday:null,
            user_type: 'patient',
            type: null, 
            employee_student_type: null, 
            employment_classification: null, 
            office_level: null, 
            department_program: null, 
            sex: null, 
            email: null, 
            contact_no: null, 
            civil_status: null, 
            guardian: null, 
            guardian_no: null, 
            permanent_address: null, 
            bsu_address: null, 
            updated_at: null, 
            created_at: null,
            age: null,
            security_answer: null,
            security_question: null
        };
        console.log('After Reset:', accDetails.value);  // Log state after reset
    };
    
    return { accDetails, resetAccDetails };
});