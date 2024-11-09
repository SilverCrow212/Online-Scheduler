<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import { createacc } from '@/store/createacc';
import { departmentChoices, sexChoices } from '@/store/choices';
import { EditAcc } from '@/api/ApiLogin';
import { fetchUserData } from '@/api/ApiUser';

const departmentStore = departmentChoices();
const createAccStore = createacc();
const sexStore = sexChoices();
const sexchoices = sexStore.legend;
const createaccount = createAccStore.accDetails;
const typeChoice = departmentStore.type;
const departmentChoice = departmentStore.department;
onMounted(async () => {
    try {
            // Fetch the user data from the API (you can modify this if necessary)
        const  data  = await fetchUserData();  // Assuming `user_details.id` is the user's ID
        console.log('asd',data)
        if (data) {
            // Populate the form fields with the fetched data
            createaccount.school_id_number = data[0].user_details.school_id_number;
            createaccount.firstname = data[0].user_details.firstname;
            createaccount.middlename = data[0].user_details.middlename;
            createaccount.lastname = data[0].user_details.lastname;
            createaccount.email = data[0].user_details.email;
            // createaccount.password = data[0].password;  // You might not want to populate password for security reasons
            createaccount.age = data[0].user_details.age;
            createaccount.sex = data[0].user_details.sex;
            createaccount.user_type = data[0].user_type;
            createaccount.type = data[0].type;
            createaccount.employee_student_type = data[0].user_details.employee_student_type;
            createaccount.office_level = data[0].user_details.office_level;
            createaccount.department_program = data[0].user_details.department_program;
            createaccount.contact_no = data[0].user_details.contact_no;
            createaccount.civil_status = data[0].user_details.civil_status;
            createaccount.guardian = data[0].user_details.guardian;
            createaccount.guardian_no = data[0].user_details.guardian_no;
            createaccount.permanent_address = data[0].user_details.permanent_address;
            createaccount.bsu_address = data[0].user_details.bsu_address;
        }
    } catch (error) {
        console.error('Error fetching user data:', error);
    }
});
const validationErrors = ref({});
const userTypeChoice = ['user'];
// const goBack = () => {
//     router.push({ name: 'login' }); // Adjust the route name as needed
// };

if (localStorage.getItem('user_details')) {
    const user_details = JSON.parse(localStorage.getItem('user_details'));
    if (user_details.user_type === 'admin') {
        userTypeChoice.push('admin');
    }
}


const dropdownItems = ref([
    { name: 'Option 1', code: 'Option 1' },
    { name: 'Option 2', code: 'Option 2' },
    { name: 'Option 3', code: 'Option 3' }
]);

const router = useRoute();

const type = ref([
    { name: 'Student', id:1 },
    { name: 'Faculty', id:2 },
]);
const confirmPassword = ref('');
console.log('create account', createaccount)
const typeInput = ref(null);
const dropdownItem = ref(null);
const validateForm = async () => {
    validationErrors.value = {};

    // Required fields validation
    if (!createaccount.school_id_number) {
        validationErrors.value.school_id_number = 'ID number is required.';
    }
    if (!createaccount.firstname) {
        validationErrors.value.firstname = 'First name is required.';
    }
    if (!createaccount.middlename) {
        validationErrors.value.middlename = 'Middle name is required.';
    }
    if (!createaccount.lastname) {
        validationErrors.value.lastname = 'Last name is required.';
    }
    if (!createaccount.email) {
        validationErrors.value.email = 'Email is required.';
    } else if (!/\S+@\S+\.\S+/.test(createaccount.email)) {
        validationErrors.value.email = 'Email is not valid.';
    }
    if (!createaccount.password) {
        validationErrors.value.password = 'Password is required.';
    }
    if (!createaccount.age) {
        validationErrors.value.age = 'Age is required.';
    }
    if (!createaccount.sex) {
        validationErrors.value.sex = 'Sex is required.';
    }
    if (!createaccount.user_type) {
        validationErrors.value.user_type = 'User type is required.';
    }
    // if (!createaccount.type) {
    //     validationErrors.value.type = 'Type is required.';
    // }
    if (!createaccount.employee_student_type) {
        validationErrors.value.employee_student_type = 'Employee/Student type is required.';
    }
    if (!createaccount.office_level) {
        validationErrors.value.office_level = 'Required.';
    }
    if (!createaccount.department_program) {
        validationErrors.value.department_program = 'Department/Program is required.';
    }
    if (!createaccount.contact_no) {
        validationErrors.value.contact_no = 'Contact number is required.';
    }
    if (!createaccount.civil_status) {
        validationErrors.value.civil_status = 'Civil status is required.';
    }
    if (!createaccount.guardian) {
        validationErrors.value.guardian = 'Parent/Guardian is required.';
    }
    if (!createaccount.guardian_no) {
        validationErrors.value.guardian_no = 'Guardian contact number is required.';
    }
    if (createaccount.password !== confirmPassword.value) {
        validationErrors.value.confirmPassword = 'Passwords do not match.';
    }

    // Check if there are any validation errors
    if (Object.keys(validationErrors.value).length === 0) {
        // Submit the form if there are no validation errors
        await EditAcc(createaccount);
        createAccStore.resetAccDetails();
        console.log('Form submitted:', createaccount);
        // goBack(); // You can replace this with your form submission logic
    }
};
</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <h5>Edit Profile</h5>
                <div class="p-fluid formgrid grid" >
                    <div class="field col-12 md:col-4">
                        <label>ID number</label>
                        <InputText v-model="createaccount.school_id_number" type="text" :class="{'p-invalid': validationErrors.school_id_number}" disabled/>
                        <small v-if="validationErrors.school_id_number" class="p-error">{{ validationErrors.school_id_number }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Password</label>
                        <Password v-model="createaccount.password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :class="{'p-invalid': validationErrors.password}" />
                        <small v-if="validationErrors.password" class="p-error">{{ validationErrors.password }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Confirm Password</label>
                        <Password v-model="confirmPassword" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :class="{'p-invalid': validationErrors.confirmPassword}" />
                        <small v-if="validationErrors.confirmPassword" class="p-error">{{ validationErrors.confirmPassword }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Firstname</label>
                        <InputText v-model="createaccount.firstname" type="text" :class="{'p-invalid': validationErrors.firstname}" />
                        <small v-if="validationErrors.firstname" class="p-error">{{ validationErrors.firstname }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Middlename</label>
                        <InputText v-model="createaccount.middlename" type="text" :class="{'p-invalid': validationErrors.middlename}"/>
                        <small v-if="validationErrors.middlename" class="p-error">{{ validationErrors.middlename }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Lastname</label>
                        <InputText v-model="createaccount.lastname" type="text" :class="{'p-invalid': validationErrors.lastname}" />
                        <small v-if="validationErrors.lastname" class="p-error">{{ validationErrors.lastname }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Age</label>
                        <InputText v-model="createaccount.age" type="text" :class="{'p-invalid': validationErrors.age}" />
                        <small v-if="validationErrors.age" class="p-error">{{ validationErrors.age }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Sex</label>
                        <!-- <InputText v-model="createaccount.sex" type="text" :class="{'p-invalid': validationErrors.sex}" /> -->
                        <Dropdown v-model="createaccount.sex" 
                                :options="sexchoices" 
                                placeholder="Select One"
                                :class="{'p-invalid': validationErrors.user_type}" />
                        <small v-if="validationErrors.sex" class="p-error">{{ validationErrors.sex }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>User Type</label>
                        <Dropdown v-model="createaccount.user_type" 
                                :options="userTypeChoice" 
                                placeholder="Select One"
                                :class="{'p-invalid': validationErrors.user_type}" />
                        <small v-if="validationErrors.user_type" class="p-error">{{ validationErrors.user_type }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Type</label>
                        <Dropdown v-model="createaccount.type" 
                                :options="typeChoice" 
                                optionLabel="name" 
                                optionValue="id" 
                                placeholder="Select One"
                                :class="{'p-invalid': validationErrors.type}" />
                        <small v-if="validationErrors.type" class="p-error">{{ validationErrors.type }}</small>
                    </div>
                    <div v-if="createaccount.type === 1" class="field col-12 md:col-4">
                    <label>Student Type</label>
                    <!-- <InputText v-model="createaccount.employee_student_type" type="text" :class="{'p-invalid': validationErrors.employee_student_type}" /> -->
                    <Dropdown v-model="createaccount.employee_student_type" 
                              :options="studentTypeChoice" 
                              optionLabel="name" 
                              optionValue="id" 
                              placeholder="Select One"
                              :class="{'p-invalid': validationErrors.employee_student_type}" />
                    
                    <small v-if="validationErrors.employee_student_type" class="p-error">{{ validationErrors.employee_student_type }}</small>
                </div>
                <div v-if="createaccount.type === 2" class="field col-12 md:col-4">
                    <label>Employment Type</label>
                    <!-- <InputText v-model="createaccount.employee_student_type" type="text" :class="{'p-invalid': validationErrors.employee_student_type}" /> -->
                    <Dropdown v-model="createaccount.employee_student_type" 
                              :options="employmentTypeChoice" 
                              optionLabel="name" 
                              optionValue="id" 
                              placeholder="Select One"
                              :class="{'p-invalid': validationErrors.employee_student_type}" />
                    <small v-if="validationErrors.employee_student_type" class="p-error">{{ validationErrors.employee_student_type }}</small>
                </div>
                <div v-if="createaccount.type === 1" class="field col-12 md:col-4">
                    <label>Level</label>
                    <InputText v-model="createaccount.office_level" type="text" :class="{'p-invalid': validationErrors.office_level}" />
                    <small v-if="validationErrors.office_level" class="p-error">{{ validationErrors.office_level }}</small>
                </div>
                <div v-if="createaccount.type === 2" class="field col-12 md:col-4">
                    <label>Office / College</label>
                    <Dropdown v-model="createaccount.office_level" 
                              :options="departmentChoice" 
                              optionLabel="name" 
                              optionValue="id" 
                              placeholder="Select One"
                              :class="{'p-invalid': validationErrors.office_level}" />
                    <small v-if="validationErrors.office_level" class="p-error">{{ validationErrors.office_level }}</small>
                </div>
                <div v-if="createaccount.type === 1" class="field col-12 md:col-4">
                    <label>Program</label>
                    <InputText v-model="createaccount.department_program" type="text" :class="{'p-invalid': validationErrors.department_program}" />
                    <small v-if="validationErrors.department_program" class="p-error">{{ validationErrors.department_program }}</small>
                </div>
                <div v-if="createaccount.type === 2" class="field col-12 md:col-4">
                    <label>Department</label>
                    <InputText v-model="createaccount.department_program" type="text" :class="{'p-invalid': validationErrors.department_program}" />
                    <small v-if="validationErrors.department_program" class="p-error">{{ validationErrors.department_program }}</small>
                </div>
                    <div class="field col-12 md:col-4">
                        <label>Email</label>
                        <InputText v-model="createaccount.email" type="text" :class="{'p-invalid': validationErrors.email}" />
                        <small v-if="validationErrors.email" class="p-error">{{ validationErrors.email }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Contact Number</label>
                        <InputText v-model="createaccount.contact_no" type="text" :class="{'p-invalid': validationErrors.contact_no}" />
                        <small v-if="validationErrors.contact_no" class="p-error">{{ validationErrors.contact_no }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Civil Status</label>
                        <InputText v-model="createaccount.civil_status" type="text" :class="{'p-invalid': validationErrors.civil_status}" />
                        <small v-if="validationErrors.civil_status" class="p-error">{{ validationErrors.civil_status }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Parent/Guardian</label>
                        <InputText v-model="createaccount.guardian" type="text" :class="{'p-invalid': validationErrors.guardian}" />
                        <small v-if="validationErrors.guardian" class="p-error">{{ validationErrors.guardian }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Guardian Contact Number</label>
                        <InputText v-model="createaccount.guardian_no" type="text" :class="{'p-invalid': validationErrors.guardian_no}" />
                        <small v-if="validationErrors.guardian_no" class="p-error">{{ validationErrors.guardian_no }}</small>
                    </div>
                    <div class="field col-12">
                        <label>Permanent Address</label>
                        <Textarea v-model="createaccount.permanent_address" rows="3" />
                    </div>
                    <div class="field col-12">
                        <label>Address while at BSU</label>
                        <Textarea v-model="createaccount.bsu_address" rows="3" />
                    </div>
                    <div class="field col-12 flex justify-content-end gap-2">
                        <!-- <Button label="Back" @click="goBack" /> -->
                        <Button label="Update" @click="validateForm" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.p-error {
    color: red;
}
.p-invalid {
    border-color: red;
}
</style>
