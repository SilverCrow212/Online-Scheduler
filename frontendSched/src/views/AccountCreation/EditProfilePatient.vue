<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
import { createacc } from '@/store/createacc';
import { departmentChoices, sexChoices, civilStatusChoices } from '@/store/choices';
import { EditAcc, EditEmail, EditPassword, EditSecurity, SecurityQuestions  } from '@/api/ApiLogin';
import { fetchUserDataPatient } from '@/api/ApiUser';
import { useToast } from 'primevue/usetoast';

const toast = useToast();
const departmentStore = departmentChoices();
const createAccStore = createacc();
const civilStore = civilStatusChoices();
const sexStore = sexChoices();
const sexchoices = sexStore.legend;
const createaccount = createAccStore.accDetails;
const typeChoice = departmentStore.type;
const departmentChoice = departmentStore.department;
const employmentTypeChoice = departmentStore.employmentType;
const employmentClassificationChoice = departmentStore.employmentClassification;
const civilStatusChoice = civilStore.legend
const route = useRoute();
const appointment_id = route.params.id;
const security_questions = ref([]);
onMounted(async () => {
    try {
            // Fetch the user data from the API (you can modify this if necessary)
        const  data  = await fetchUserDataPatient(appointment_id);  // Assuming `user_details.id` is the user's ID
        security_questions.value = await SecurityQuestions();

        console.log('asd',data.data)
        if (data) {
            // Populate the form fields with the fetched data
            createaccount.school_id_number = data.data[0].school_id_number;
            createaccount.firstname = data.data[0].firstname;
            createaccount.middlename = data.data[0].middlename;
            createaccount.lastname = data.data[0].lastname;
            createaccount.email = data.data[0].email;
            // createaccount.password = data.data[0].password;
            createaccount.employment_classification = data.data[0].employment_classification;
            createaccount.age = data.data[0].age;
            createaccount.sex = data.data[0].sex;
            createaccount.user_type = data.data[0].user_type;
            createaccount.type = data.data[0].type;
            createaccount.employee_student_type = data.data[0].employee_student_type;
            createaccount.office_level = data.data[0].office_level;
            createaccount.department_program = data.data[0].department_program;
            createaccount.contact_no = data.data[0].contact_no;
            createaccount.civil_status = data.data[0].civil_status;
            // console.log(createaccount.civil_status)
            createaccount.guardian = data.data[0].guardian;
            createaccount.guardian_no = data.data[0].guardian_no;
            createaccount.permanent_address = data.data[0].permanent_address;
            createaccount.bsu_address = data.data[0].bsu_address;
        }
    } catch (error) {
        console.error('Error fetching user data:', error);
    }
});
const validationErrors = ref({});
const userTypeChoice = ['patient'];
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



const type = ref([
    { name: 'Student', id:1 },
    { name: 'Faculty', id:2 },
]);

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
    if (!createaccount.middlename || createaccount.middlename.length <= 1 || /^[A-Za-z]+(\s[A-Za-z]+)*$/.test(createaccount.middlename) === false) {
        validationErrors.value.middlename = 'Middle name is required.';
    }
    if (!createaccount.lastname) {
        validationErrors.value.lastname = 'Last name is required.';
    }
    if (!createaccount.age) {
        validationErrors.value.age = 'Birthday is required.';
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
    if (createaccount.contact_no==createaccount.guardian_no) {
        validationErrors.value.same_no = 'Contact number should not be the same.';
    }
    if (!createaccount.civil_status) {
        validationErrors.value.civil_status = 'Civil status is required.';
    }
    if (!createaccount.guardian_firstname) {
        validationErrors.value.guardian_firstname = 'Parent/Guardian Firstname is required.';
    }
    if (!createaccount.guardian_middlename) {
        validationErrors.value.guardian_middlename = 'Parent/Guardian Middlename is required.';
    }
    if (!createaccount.guardian_lastname) {
        validationErrors.value.guardian_lastname = 'Parent/Guardian Lastname is required.';
    }
    if (!createaccount.guardian_no) {
        validationErrors.value.guardian_no = 'Guardian contact number is required.';
    }
    if (!createaccount.guardian_no) {
        validationErrors.value.guardian_no = 'Guardian contact number is required.';
    }
    if(createaccount.type == 2 && !createaccount.employment_classification){
        validationErrors.value.employment_classification = 'Classification is required.';
    }
    if(!createaccount.permanent_address){
        validationErrors.value.permanent_address = 'Address is required.';
    }
    if(!createaccount.bsu_address){
        validationErrors.value.bsu_address = 'Address is required.';
    }

    

    // Check if there are any validation errors
    if (Object.keys(validationErrors.value).length === 0) {
        // Submit the form if there are no validation errors
        await EditAcc(createaccount, toast);
        createAccStore.resetAccDetails();
        console.log('Form submitted:', createaccount);
        // goBack(); // You can replace this with your form submission logic
    }
};



/// password and email
// const email = ref(null);
async function sendSecurity(){
    const data = {
            school_id_number:createaccount.school_id_number,
            security_question:createaccount.question,
            security_answer:createaccount.answer
        }
        await EditSecurity(data, toast);
}

const validationErrorsEmail = ref({});

const validateEmailForm = async () => {
    validationErrorsEmail.value = {};

  if (!createaccount.email) {
        validationErrorsEmail.value.email = 'Email is required.';
    } else if (!/\S+@\S+\.\S+/.test(createaccount.email)) {
        validationErrorsEmail.value.email = 'Email is not valid.';
    }

  if (Object.keys(validationErrorsEmail.value).length === 0) {
    // Call EditEmail API to update email
    try {
        const data = {
            email:createaccount.email,
            school_id_number:createaccount.school_id_number
        }
        await EditEmail(data, toast);
        console.log('Email updated:', email.value);
    } catch (error) {
        console.error('Error updating email:', error);
    }
  }
};


const validationErrorsPassword = ref({});
const confirmPassword = ref('');
const password = ref(null);
const validatePasswordForm = async () => {
  validationErrorsPassword.value = {};

    if (!password.value || password.value.trim() === '') {
        validationErrorsPassword.value.password = 'Password is required.';
    } 
    else if (password.value.length < 8 || password.value.length > 16) {
        validationErrorsPassword.value.password = 'Password must be between 8 and 16 characters.';
    }
    if (password.value !== confirmPassword.value) {
        validationErrorsPassword.value.confirmPassword = 'Passwords do not match.';
    }

  if (Object.keys(validationErrorsPassword.value).length === 0) {
    try {
        const data = {
            password:password.value,
            school_id_number:createaccount.school_id_number
        }
        await EditPassword(data, toast);
        console.log('Password updated.');
    } catch (error) {
        console.error('Error updating password:', error);
    }
  }
};
</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <h5>Edit Profile</h5>
                <Fieldset legend="Personal Profile">
                <div class="p-fluid formgrid grid" >
                    <div class="field col-12 md:col-4">
                        <label>ID number</label>
                        <InputText v-model="createaccount.school_id_number" type="text" :class="{'p-invalid': validationErrors.school_id_number}" disabled/>
                        <!-- <InputMask  v-model="createaccount.school_id_number" mask="9999999" :class="{'p-invalid': validationErrors.school_id_number}" disabled/> -->
                        <small v-if="validationErrors.school_id_number" class="p-error">{{ validationErrors.school_id_number }}</small>
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
                        <label>Birthday</label>
                        <!-- <InputText v-model="createaccount.age" type="text" :class="{'p-invalid': validationErrors.age}" /> -->
                        <Calendar  v-model="createaccount.age" dateFormat="dd/mm/yy" :class="{'p-invalid': validationErrors.age}" :manualInput="false"/>
                        <small v-if="validationErrors.age" class="p-error">{{ validationErrors.age }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Sex Assigned at Birth</label>
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
                    <div v-if="createaccount.type === 2" class="field col-12 md:col-4">
                        <label>Employment Classification</label>
                        <!-- <InputText v-model="createaccount.employee_student_type" type="text" :class="{'p-invalid': validationErrors.employee_student_type}" /> -->
                        <Dropdown v-model="createaccount.employment_classification" 
                                :options="employmentClassificationChoice" 
                                optionLabel="name" 
                                optionValue="id" 
                                placeholder="Select One"
                                :class="{'p-invalid': validationErrors.employment_classification}" />
                        <small v-if="validationErrors.employment_classification" class="p-error">{{ validationErrors.employment_classification }}</small>
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
                        <label>Contact Number</label>
                        <InputMask  v-model="createaccount.contact_no" mask="09999999999" placeholder="09090909090" :class="{'p-invalid': validationErrors.contact_no,'p-invalid': validationErrors.same_no}"/>
                        <!-- <InputText v-model="createaccount.contact_no" type="text" :class="{'p-invalid': validationErrors.contact_no}" /> -->
                        <small v-if="validationErrors.contact_no" class="p-error">{{ validationErrors.contact_no }}</small>
                        <small v-if="validationErrors.same_no" class="p-error">{{ validationErrors.same_no }}</small>
                    </div>
                    <div class="field col-12 md:col-12">
                        <label>Civil Status</label>
                        <!-- <InputText v-model="createaccount.civil_status" type="text" :class="{'p-invalid': validationErrors.civil_status}" /> -->
                         <Dropdown 
                            v-model="createaccount.civil_status" 
                            :options="civilStatusChoice" 
                            optionLabel="name" 
                            optionValue="id" 
                            placeholder="Select One" 
                            :class="{'p-invalid': validationErrors.civil_status}" 
                        />
                        <small v-if="validationErrors.civil_status" class="p-error">{{ validationErrors.civil_status }}</small>
                    </div>
                    
                    <div class="field col-12">
                        <label>Permanent Address</label>
                        <Textarea v-model="createaccount.permanent_address" rows="3":class="{'p-invalid': validationErrors.permanent_address}" />
                        <small v-if="validationErrors.permanent_address" class="p-error">{{ validationErrors.permanent_address }}</small>
                    </div>
                    <div class="field col-12">
                        <label>Address while at BSU</label>
                        <Textarea v-model="createaccount.bsu_address" rows="3" :class="{'p-invalid': validationErrors.bsu_address}"/>
                        <small v-if="validationErrors.bsu_address" class="p-error">{{ validationErrors.bsu_address }}</small>
                    </div>
                    <div class="field col-12 flex justify-content-end gap-2">
                        <!-- <Button label="Back" @click="goBack" /> -->
                        
                    </div>
                </div>
                </Fieldset>
                <Fieldset legend="Emergency Contact Information">
                    <div class="p-fluid formgrid grid" >
                        <div class="field col-6 md:col-6">
                            <label>Contact Person Firstname</label>
                            <InputText v-model="createaccount.guardian_firstname" type="text" :class="{'p-invalid': validationErrors.guardian_firstname}" />
                            <small v-if="validationErrors.guardian_firstname" class="p-error">{{ validationErrors.guardian_firstname }}</small>
                        </div>
                        <div class="field col-6 md:col-6">
                            <label>Contact Person Middlename</label>
                            <InputText v-model="createaccount.guardian_middlename" type="text" :class="{'p-invalid': validationErrors.guardian_middlename}" />
                            <small v-if="validationErrors.guardian_middlename" class="p-error">{{ validationErrors.guardian_middlename }}</small>
                        </div>
                        <div class="field col-6 md:col-6">
                            <label>Contact Person Lastname</label>
                            <InputText v-model="createaccount.guardian_lastname" type="text" :class="{'p-invalid': validationErrors.guardian_lastname}" />
                            <small v-if="validationErrors.guardian_lastname" class="p-error">{{ validationErrors.guardian_lastname }}</small>
                        </div>
                        <div class="field col-12 md:col-6">
                            <label>Contact Number</label>
                            <!-- <InputText v-model="createaccount.guardian_no" type="text" :class="{'p-invalid': validationErrors.guardian_no}" /> -->
                            <InputMask  v-model="createaccount.guardian_no" mask="09999999999" placeholder="09090909090" :class="{'p-invalid': validationErrors.guardian_no,'p-invalid': validationErrors.same_no}"/>
                            <small v-if="validationErrors.guardian_no" class="p-error">{{ validationErrors.guardian_no }}</small>
                            <small v-if="validationErrors.same_no" class="p-error">{{ validationErrors.same_no }}</small>
                        </div>
                        <Button label="Update" @click="validateForm" />
                    </div>
                </Fieldset>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h5>Edit Security Questions</h5>
                <div class="p-fluid formgrid grid" >
                    <div class="field col-12 md:col-12">
                        <label>Question</label>
                        <Dropdown v-model="createaccount.question" 
                              :options="security_questions"
                              optionLabel="item"
                              optionValue="id"
                              placeholder="Select One"
                            />
                        <!-- <small v-if="validationErrorsEmail.email" class="p-error">{{ validationErrorsEmail.email }}</small> -->
                    </div>
                    <div class="field col-12 md:col-12">
                        <label>Answer <span style="color:red;">(!Case Sensitive!)</span></label>
                        <InputText v-model="createaccount.answer" type="text"  />
                        <!-- <small v-if="validationErrorsEmail.email" class="p-error">{{ validationErrorsEmail.email }}</small> -->
                    </div>
                    <div class="field col-12 flex justify-content-end gap-2">
                        <Button label="Update Security Question" @click="sendSecurity()" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h5>Edit Password</h5>
                <div class="p-fluid formgrid grid" >
                    <div class="field col-12 md:col-6">
                        <label>Password</label>
                        <Password v-model="password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :class="{'p-invalid': validationErrorsPassword.password}" />
                        <small v-if="validationErrorsPassword.password" class="p-error">{{ validationErrorsPassword.password }}</small>
                    </div>
                    <div class="field col-12 md:col-6">
                        <label>Confirm Password</label>
                        <Password v-model="confirmPassword" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :class="{'p-invalid': validationErrorsPassword.confirmPassword}" />
                        <small v-if="validationErrorsPassword.confirmPassword" class="p-error">{{ validationErrorsPassword.confirmPassword }}</small>
                    </div>
                    <div class="field col-12 flex justify-content-end gap-2">
                        <Button label="Update Password" @click="validatePasswordForm" />

                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <h5>Edit Email</h5>
                <div class="p-fluid formgrid grid" >
                    <div class="field col-12 md:col-12">
                        <label>Email</label>
                        <InputText v-model="createaccount.email" type="text" :class="{'p-invalid': validationErrorsEmail.email}" />
                        <small v-if="validationErrorsEmail.email" class="p-error">{{ validationErrorsEmail.email }}</small>
                    </div>
                    <div class="field col-12 flex justify-content-end gap-2">
                        <Button label="Update Email" @click="validateEmailForm" />
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
