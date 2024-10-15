<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

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
                    <label for="idNumber">ID number</label>
                    <InputText id="idNumber" type="text" />
                </div>
                <div class="field col-12 md:col-6">
                    <label for="password">Password</label>
                    <Password id="password" :toggleMask="true" class="w-full mb-3" inputClass="w-full"></Password>
                </div>
                <div class="field col-12 md:col-6">
                    <label for="firstname">Firstname</label>
                    <InputText id="firstname" type="text" />
                </div>
                <div class="field col-12 md:col-6">
                    <label for="lastname">Lastname</label>
                    <InputText id="lastname" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label for="type">Type</label>
                    <Dropdown id="type" v-model="typeInput" :options="type" optionLabel="name" optionValue="id" placeholder="Select One"></Dropdown>
                </div>
                <div v-if="typeInput === 1" class="field col-12 md:col-4">
                    <label for="studentType">Student Type</label>
                    <InputText id="studentType" type="text" />
                </div>
                <div v-else class="field col-12 md:col-4">
                    <label for="employmentType">Employment Type</label>
                    <InputText id="employmentType" type="text" />
                </div>
                <div v-if="typeInput === 1" class="field col-12 md:col-4">
                    <label for="level">Level</label>
                    <InputText id="level" type="text" />
                </div>
                <div v-else class="field col-12 md:col-4">
                    <label for="officeCollege">Office / College</label>
                    <InputText id="officeCollege" type="text" />
                </div>
                <div v-if="typeInput === 1" class="field col-12 md:col-4">
                    <label for="program">Program</label>
                    <InputText id="program" type="text" />
                </div>
                <div v-else class="field col-12 md:col-4">
                    <label for="department">Department</label>
                    <InputText id="department" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label for="email">Email</label>
                    <InputText id="email" type="text" />
                </div>
                <div class="field col-12 md:col-4">
                    <label for="contactNumber">Contact Number</label>
                    <InputText id="contactNumber" type="text" />
                </div>
                <div class="field col-12 md:col-6">
                    <label for="guardian">Parent/Guardian</label>
                    <InputText id="guardian" type="text" />
                </div>
                <div class="field col-12 md:col-6">
                    <label for="guardianContact">Contact Number</label>
                    <InputText id="guardianContact" type="text" />
                </div>
                <div class="field col-12">
                    <label for="permanentAddress">Permanent Address</label>
                    <Textarea id="permanentAddress" rows="3" />
                </div>
                <div class="field col-12">
                    <label for="bsuAddress">Address while at BSU</label>
                    <Textarea id="bsuAddress" rows="3" />
                </div>
                <div class="field col-12 flex justify-content-end gap-2">
                    <Button label="Back" @click="goBack" />
                    <Button label="Submit" @click="goBack"/>
                </div>
            </div>
        </div>
    </div>
</template>

