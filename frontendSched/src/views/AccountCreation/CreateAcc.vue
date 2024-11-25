<script setup>
import { ref,onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { createacc } from '@/store/createacc';
import { departmentChoices, sexChoices, civilStatusChoices } from '@/store/choices';
import { CreateAcc, SecurityQuestions } from '@/api/ApiLogin';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';


const toast = useToast();


onMounted(async () => {
   security_questions.value = await SecurityQuestions();
});

const departmentStore = departmentChoices();
const createAccStore = createacc();
const sexStore = sexChoices();
const civilStore = civilStatusChoices();
const sexchoices = sexStore.legend;
const createaccount = createAccStore.accDetails;
const typeChoice = departmentStore.type;
const departmentChoice = departmentStore.department;
const studentTypeChoice = departmentStore.studentType;
const employmentTypeChoice = departmentStore.employmentType;
const civilStatusChoice = civilStore.legend

const router = useRouter();
const validationErrors = ref({});
const userTypeChoice = ['patient'];
const goBack = async () => {
    console.log("GoBack triggered"); // Debug if this log appears
    router.go(-1);
    createAccStore.resetAccDetails();  // Reset store data here
    // await nextTick(); // Ensure reactivity is handled properly
};

const user_details = JSON.parse(localStorage.getItem('user_details'));
if (localStorage.getItem('user_details')) {
    if (user_details.user_type === 'admin') {
        userTypeChoice.push('admin');
    }
}
const confirmPassword = ref('');
const validateForm = async () => {
    visible.value = false 
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
    if (!createaccount.password || createaccount.password.trim() === '') {
        validationErrors.value.password = 'Password is required.';
    } else if (createaccount.password.length < 8 || createaccount.password.length > 16) {
        validationErrors.value.password = 'Password must be between 8 and 16 characters.';
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
    if (!createaccount.type) {
        validationErrors.value.type = 'Type is required.';
    }
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
    if (!createaccount.guardian) {
        validationErrors.value.guardian = 'Parent/Guardian is required.';
    }
    if (!createaccount.guardian_no) {
        validationErrors.value.guardian_no = 'Guardian contact number is required.';
    }
    if (createaccount.password !== confirmPassword.value) {
        validationErrors.value.confirmPassword = 'Passwords do not match.';
    }
    if (!createaccount.security_question) {
        validationErrors.value.question = 'Security Question is required.';
    }
    if (!createaccount.security_answer) {
        validationErrors.value.answer = 'Security Question Answer is required.';
    }


    // Check if there are any validation errors
    if (Object.keys(validationErrors.value).length === 0) {
        // Submit the form if there are no validation errors
        const create = await CreateAcc(createaccount, toast);
        if(create==='received'){
            createAccStore.resetAccDetails();
            console.log('Form submitted:', createaccount);
            const delay = 3000;

            setTimeout(() => {
            goBack();
            }, delay);
        }
    }
};


const security = ref({
    question:null,
    answer:null,
});
const security_questions = ref([]);


const visible = ref(null);
</script>

<template>
    <Toast />
    <div class="flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 800px;">
            <h5 class="text-center">Patient Profile</h5>
                
            <Fieldset legend="Personal Profile" class="mb-4">
                <div class="p-fluid formgrid grid">
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
                        <InputText v-model="createaccount.age" type="number" :class="{'p-invalid': validationErrors.age}" />
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
                    <div v-if="user_details && user_details.user_type === 'admin'" class="field col-12 md:col-4">
                        <label>User Type</label>
                        <Dropdown v-model="createaccount.user_type" 
                                :options="userTypeChoice" 
                                placeholder="Select One"
                                :class="{'p-invalid': validationErrors.user_type}" />
                        <small v-if="validationErrors.user_type" class="p-error">{{ validationErrors.user_type }}</small>
                    </div>
                    
                    <div class="field col-12 md:col-4">
                        <label>Email</label>
                        <InputText v-model="createaccount.email" type="text" :class="{'p-invalid': validationErrors.email}" />
                        <small v-if="validationErrors.email" class="p-error">{{ validationErrors.email }}</small>
                    </div>
                    <div class="field col-12 md:col-4">
                        <label>Contact Number</label>
                        <!-- <InputText v-model="createaccount.contact_no" type="text" :class="{'p-invalid': validationErrors.contact_no}" /> -->
                        <InputMask  v-model="createaccount.contact_no" mask="09999999999" placeholder="09090909090" :class="{'p-invalid': validationErrors.contact_no,'p-invalid': validationErrors.same_no}"/>
                        <small v-if="validationErrors.contact_no" class="p-error">{{ validationErrors.contact_no }}</small>
                        <small v-if="validationErrors.same_no" class="p-error">{{ validationErrors.same_no }}</small>
                    </div>
                    <div class="field col-12 md:col-12">
                        <label>Civil Status</label>
                            <Dropdown v-model="createaccount.civil_status" 
                                :options="civilStatusChoice"
                                optionLabel="name"
                                optionValue="id"
                                placeholder="Select One"
                                :class="{'p-invalid': validationErrors.civil_status}" />
                        <!-- <InputText v-model="createaccount.civil_status" type="text" :class="{'p-invalid': validationErrors.civil_status}" /> -->
                        <small v-if="validationErrors.civil_status" class="p-error">{{ validationErrors.civil_status }}</small>
                    </div>
                    
                    <div class="field col-12">
                        <label>Permanent Address</label>
                        <Textarea v-model="createaccount.permanent_address" rows="3" />
                    </div>
                    <div class="field col-12">
                        <label>Address while at BSU</label>
                        <Textarea v-model="createaccount.bsu_address" rows="3" />
                    </div>
                    
                    
                </div>
            </Fieldset>
            <Fieldset legend="Emergency Contact Information" class="mb-4">
                <div class="p-fluid formgrid grid">
                    <div class="field col-6 md:col-6">
                        <label>Contact Person</label>
                        <InputText v-model="createaccount.guardian" type="text" :class="{'p-invalid': validationErrors.guardian}" />
                        <small v-if="validationErrors.guardian" class="p-error">{{ validationErrors.guardian }}</small>
                    </div>
                    <div class="field col-6 md:col-6">
                        <label>Contact Number</label>
                        <!-- <InputText v-model="createaccount.guardian_no" type="text" :class="{'p-invalid': validationErrors.guardian_no}" /> -->
                        <InputMask  v-model="createaccount.guardian_no" mask="09999999999" placeholder="09090909090" :class="{'p-invalid': validationErrors.guardian_no,'p-invalid': validationErrors.same_no}"/>
                        <small v-if="validationErrors.guardian_no" class="p-error">{{ validationErrors.guardian_no }}</small>
                        <small v-if="validationErrors.same_no" class="p-error">{{ validationErrors.same_no }}</small>
                    </div>
                </div>
            </Fieldset>
            <Fieldset legend="Details" class="mb-4">
                    <div class="p-fluid formgrid grid">
                        <div class="field col-12 md:col-4">
                            <label>ID number</label>
                            <InputMask  v-model="createaccount.school_id_number" mask="9999999" :class="{'p-invalid': validationErrors.school_id_number}"/>
                            <!-- <InputText v-model="createaccount.school_id_number" type="text" :class="{'p-invalid': validationErrors.school_id_number}" /> -->
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
                        <div class="field col-12 md:col-6">
                            <label>Choose Security Question</label>
                            <!-- {{security}} -->
                            <!-- <InputText v-model="createaccount.sex" type="text" :class="{'p-invalid': validationErrors.sex}" /> -->
                            <Dropdown v-model="createaccount.security_question" 
                                    :options="security_questions"
                                    optionLabel="item"
                                    optionValue="id"
                                    placeholder="Select One"
                                    :class="{'p-invalid': validationErrors.question}" />
                            <small v-if="validationErrors.question" class="p-error">{{ validationErrors.question }}</small>
                        </div>
                        <div class="field col-12 md:col-6">
                            <label>Answer <span style="color:red;">(!Case Sensitive!)</span></label>
                            <InputText v-model="createaccount.security_answer" type="text" :class="{'p-invalid': validationErrors.answer}" />
                            <small v-if="validationErrors.answer" class="p-error">{{ validationErrors.answer }}</small>
                        </div>
                    </div>
                </Fieldset>
            <div class="field col-12 flex justify-content-end gap-2">
                <Button label="Back" @click="goBack()" />
                <Button label="Submit" @click="visible=true" />
            </div>
        </div>
    </div>


    <Dialog v-model:visible="visible" modal header="Confirmation" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <div class="field col-12 md:col-12">
            <label>Are you sure you entered the correct Details?</label>
        </div>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
            <Button type="button" label="Confirm" @click="validateForm"></Button>
        </div>
    </Dialog>
</template>



<style>
.p-error {
    color: red;
}
.p-invalid {
    border-color: red;
}
</style>
