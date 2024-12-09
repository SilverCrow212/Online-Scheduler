<script setup>
import { ref,onMounted, defineProps } from 'vue';
import { useRouter } from 'vue-router';
import { createacc } from '@/store/createacc';
import { departmentChoices, sexChoices, civilStatusChoices } from '@/store/choices';
import { CreateAccDependent, SecurityQuestions } from '@/api/ApiLogin';
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
// const typeChoice = departmentStore.type;
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
createaccount.type = 3;
createaccount.school_id_number = user_details.school_id_number;
createaccount.school_id_number_original = user_details.school_id_number;
const props = defineProps({
  patients: {
    type: Array,
    required: true
  }
});

// Get the number of patients in the array
const patientsCount = props.patients.length;

// Default values
let nextLetter = 'A';
let numericPart = user_details.school_id_number; // Initialize numericPart to an empty string by default

if (patientsCount > 0) {
  // If there are patients, get the last school_id_number to find the next letter
  const lastPatientId = props.patients[props.patients.length - 1]?.school_id_number || "";

  // Extract the numeric part (first part) and the letter part (last character)
  numericPart = lastPatientId.slice(0, -1); // Remove the last character (the letter part)
  const letterPart = lastPatientId.slice(-1); // Get the last character (the letter part)

  // Determine the next letter by incrementing the last letter
  if (letterPart) {
    const lastCharCode = letterPart.charCodeAt(0); // Get the char code of the last letter (e.g., 'A' -> 65)
    nextLetter = String.fromCharCode(lastCharCode + 1); // Increment the letter by 1
  }
}

// Create the new school_id_number by appending the next letter
createaccount.school_id_number = numericPart + nextLetter;






const confirmPassword = ref('');
const validateForm = async () => {
    visible.value = false 
    visibleDataPrivacy.value = false
    validationErrors.value = {};

    // Required fields validation
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
    if (!createaccount.type) {
        validationErrors.value.type = 'Type is required.';
    }
    if(!createaccount.permanent_address){
        validationErrors.value.permanent_address = 'Address is required.';
    }
    if(!createaccount.relation){
        validationErrors.value.relation = 'Relationship is required.';
    }



    // Check if there are any validation errors
    if (Object.keys(validationErrors.value).length === 0) {
        // Submit the form if there are no validation errors
        createaccount.school_id_number = createaccount.school_id_number
        const create = await CreateAccDependent(createaccount, toast);

        setTimeout(() => {
        goBack();
        }, 2000);
        
    }
};


const security = ref({
    question:null,
    answer:null,
});
const security_questions = ref([]);


const visible = ref(null);
const typeChoice = [{ name: 'Dependent', id:3 }];
const visibleDataPrivacy = ref(false)
</script>

<template>
    <Toast />
    <!-- {{ props.patients }} -->
    <div class="flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 100%;">
            <!-- <h5 class="text-center">Patient Profile</h5> -->
                <!-- {{ createaccount }} -->
            <Fieldset legend="Personal Profile" class="mb-4">
                <div class="p-fluid formgrid grid">
                    <div class="field col-12 md:col-4" hidden>
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
                        <label>Birthday</label>
                        <!-- <InputText v-model="createaccount.age" type="number" :class="{'p-invalid': validationErrors.age}" /> -->
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
                    <div v-if="user_details && user_details.user_type === 'admin'" class="field col-12 md:col-4">
                        <label>User Type</label>
                        <Dropdown v-model="createaccount.user_type" 
                                :options="userTypeChoice" 
                                placeholder="Select One"
                                :class="{'p-invalid': validationErrors.user_type}" />
                        <small v-if="validationErrors.user_type" class="p-error">{{ validationErrors.user_type }}</small>
                    </div>
                    
                    <div class="field col-12">
                        <label>Permanent Address</label>
                        <Textarea v-model="createaccount.permanent_address" rows="3":class="{'p-invalid': validationErrors.permanent_address}" />
                        <small v-if="validationErrors.permanent_address" class="p-error">{{ validationErrors.permanent_address }}</small>
                    </div>
                    <div class="field col-12">
                        <label>Relationship with dependent</label>
                        <InputText v-model="createaccount.relation" rows="3":class="{'p-invalid': validationErrors.relation}" />
                        <small v-if="validationErrors.relation" class="p-error">{{ validationErrors.relation }}</small>
                    </div>
                    
                    
                </div>
            </Fieldset>
            <!-- <Fieldset legend="Emergency Contact Information" class="mb-4">
                <div class="p-fluid formgrid grid">
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
                    <div class="field col-6 md:col-6">
                        <label>Contact Number</label>
                        <InputMask  v-model="createaccount.guardian_no" mask="09999999999" placeholder="09090909090" :class="{'p-invalid': validationErrors.guardian_no,'p-invalid': validationErrors.same_no}"/>
                        <small v-if="validationErrors.guardian_no" class="p-error">{{ validationErrors.guardian_no }}</small>
                        <small v-if="validationErrors.same_no" class="p-error">{{ validationErrors.same_no }}</small>
                    </div>
                </div>
            </Fieldset> -->
            <div class="field col-12 flex justify-content-end gap-2">
                <!-- <Button label="Back" @click="goBack()" /> -->
                <Button label="Submit" @click="visibleDataPrivacy=true" />
            </div>
        </div>
    </div>

    <Dialog v-model:visible="visibleDataPrivacy" modal header="Data Privacy" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <div class="field col-12 md:col-12">
            <label>I acknowledge that I have read and fully understood the terms outlined in this Data Privacy Consent Form. I voluntarily grant my consent to the Benguet State University Dental Clinic, located at Km6, La Trinidad, Benguet, to collect, process, and store my personal data, including my full name, address, contact details, and other pertinent information, solely for the purpose of maintaining accurate and comprehensive dental health records. I understand that my personal information will only be used for legitimate purposes and will not be shared with third parties without my explicit consent, except as required by law. Furthermore, I am aware of my rights under the Data Privacy Act of 2012 (RA 10173), which include the right to access, update, or correct my personal data, withdraw my consent at any time, and file a complaint with the National Privacy Commission should there be any violations of my data privacy.</label>
        </div>
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visibleDataPrivacy = false"></Button>
            <Button type="button" label="I agree" @click="visible=true"></Button>
        </div>
    </Dialog>

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
