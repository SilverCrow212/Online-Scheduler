<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { createacc } from '@/store/createacc';
import { departmentChoices } from '@/store/choices';
import { CreateAcc } from '@/api/ApiLogin';

const departmentStore = departmentChoices();
const createAccStore = createacc();
const createaccount = createAccStore.accDetails;
const typeChoice = departmentStore.type;
const departmentChoice = departmentStore.department;

const router = useRouter();
const validationErrors = ref({});

const goBack = () => {
    router.push({ name: 'login' }); // Adjust the route name as needed
};

const validateForm = async () => {
    validationErrors.value = {};

    if (!createaccount.school_id_number) {
        validationErrors.value.school_id_number = 'ID number is required.';
    }
    if (!createaccount.firstname) {
        validationErrors.value.firstname = 'First name is required.';
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

    if (Object.keys(validationErrors.value).length === 0) {
        // Submit the form if there are no validation errors
        await CreateAcc(createaccount);
        createAccStore.resetAccDetails();
        console.log('Form submitted:', createaccount);
        goBack(); // You can replace this with your form submission logic
    }
};
</script>

<template>
    <div class="flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 600px;">
            <h5 class="text-center">Patient Profile</h5>
            <div class="p-fluid formgrid grid">
                <div class="field col-12 md:col-6">
                    <label>ID number</label>
                    <InputText v-model="createaccount.school_id_number" type="text" :class="{'p-invalid': validationErrors.school_id_number}" />
                    <small v-if="validationErrors.school_id_number" class="p-error">{{ validationErrors.school_id_number }}</small>
                </div>
                <div class="field col-12 md:col-6">
                    <label>Password</label>
                    <Password v-model="createaccount.password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :class="{'p-invalid': validationErrors.password}" />
                    <small v-if="validationErrors.password" class="p-error">{{ validationErrors.password }}</small>
                </div>
                <div class="field col-12 md:col-4">
                    <label>Firstname</label>
                    <InputText v-model="createaccount.firstname" type="text" :class="{'p-invalid': validationErrors.firstname}" />
                    <small v-if="validationErrors.firstname" class="p-error">{{ validationErrors.firstname }}</small>
                </div>
                <div class="field col-12 md:col-4">
                    <label>Middlename</label>
                    <InputText v-model="createaccount.middlename" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label>Lastname</label>
                    <InputText v-model="createaccount.lastname" type="text" :class="{'p-invalid': validationErrors.lastname}" />
                    <small v-if="validationErrors.lastname" class="p-error">{{ validationErrors.lastname }}</small>
                </div>
                <div class="field col-12 md:col-4">
                    <label>Type</label>
                    <Dropdown v-model="createaccount.type" :options="typeChoice" optionLabel="name" optionValue="id" placeholder="Select One"/>
                </div>
                <div v-if="createaccount.type === 1" class="field col-12 md:col-4">
                    <label>Student Type</label>
                    <InputText v-model="createaccount.employee_student_type" type="text" />
                </div>
                <div v-else class="field col-12 md:col-4">
                    <label>Employment Type</label>
                    <InputText v-model="createaccount.employee_student_type" type="text" />
                </div>
                <div v-if="createaccount.type === 1" class="field col-12 md:col-4">
                    <label>Level</label>
                    <InputText v-model="createaccount.office_level" type="text" />
                </div>
                <div v-else class="field col-12 md:col-4">
                    <label>Office / College</label>
                    <Dropdown v-model="createaccount.office_level" :options="departmentChoice" optionLabel="name" optionValue="id" placeholder="Select One"/>
                </div>
                <div v-if="createaccount.type === 1" class="field col-12 md:col-4">
                    <label>Program</label>
                    <InputText v-model="createaccount.department_program" type="text" />
                </div>
                <div v-else class="field col-12 md:col-4">
                    <label>Department</label>
                    <InputText v-model="createaccount.department_program" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label>Email</label>
                    <InputText v-model="createaccount.email" type="text" :class="{'p-invalid': validationErrors.email}" />
                    <small v-if="validationErrors.email" class="p-error">{{ validationErrors.email }}</small>
                </div>
                <div class="field col-12 md:col-4">
                    <label>Contact Number</label>
                    <InputText v-model="createaccount.contact_no" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label>Civil Status</label>
                    <InputText v-model="createaccount.civil_status" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label>Parent/Guardian</label>
                    <InputText v-model="createaccount.guardian" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label>Guardian Contact Number</label>
                    <InputText v-model="createaccount.guardian_no" type="text" />
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
                    <Button label="Back" @click="goBack" />
                    <Button label="Submit" @click="validateForm"/>
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
