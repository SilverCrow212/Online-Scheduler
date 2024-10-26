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
    const user_details = ref({
            id: null,
            age:null,
            user_id: null,
            school_id_number: null,
            firstname: null,
            lastname: null,
            middlename: null,
            type: null,
            employee_student_type: null,
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
            created_at: null,
            updated_at: null,
     },
    );
    return { user_details };
});
























