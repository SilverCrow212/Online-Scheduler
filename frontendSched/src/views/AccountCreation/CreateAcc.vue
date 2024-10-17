<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import {createacc} from '@/store/createacc'

const createAccStore = createacc();
const createaccount = createAccStore.accDetails

// State
const router = useRouter();
const goBack = () => {
    router.push({ name: 'login' }); // Adjust the route name as needed
};

const dropdownItems = ref([
    { name: 'Option 1', code: 'Option 1' },
    { name: 'Option 2', code: 'Option 2' },
    { name: 'Option 3', code: 'Option 3' }
]);


const type = ref([
    { name: 'Student', id:1 },
    { name: 'Faculty', id:2 },
]);
const typeInput = ref(null);
const dropdownItem = ref(null);

</script>

<template>
    <div class="flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 600px;">
            <h5 class="text-center">Patient Profile</h5>
            <div class="p-fluid formgrid grid">
                <div class="field col-12 md:col-6">
                    <label>ID number</label>
                    <InputText v-model="createaccount.school_id_number" type="text" />
                </div>
                <div class="field col-12 md:col-6">
                    <label>Password</label>
                    <Password v-model="createaccount.password" :toggleMask="true" class="w-full mb-3" inputClass="w-full"></Password>
                </div>
                <div class="field col-12 md:col-6">
                    <label>Firstname</label>
                    <InputText v-model="createaccount.firstname" id="firstname" type="text" />
                </div>
                <div class="field col-12 md:col-6">
                    <label>Lastname</label>
                    <InputText v-model="createaccount.lastname" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label >Type</label>
                    <Dropdown v-model="createaccount.type" :options="type" optionLabel="name" optionValue="id" placeholder="Select One"></Dropdown>
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
                    <label >Office / College</label>
                    <InputText v-model="createaccount.office_level" type="text" />
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
                    <InputText v-model="createaccount.email" type="text" />
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
                    <label>Contact Number</label>
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
                    <Button label="Submit" @click="goBack"/>
                </div>
            </div>
        </div>
    </div>
</template>

