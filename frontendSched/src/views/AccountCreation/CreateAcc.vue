<script setup>
import { ref } from 'vue';

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
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <h5>Patient Profile</h5>
                <div class="p-fluid formgrid grid">
                    <div class="field col-12 md:col-6">
                        <label for="firstname2">ID number</label>
                        <InputText id="firstname2" type="text" />
                    </div>
                    <div class="field col-12 md:col-6">
                        <label for="password">Password</label>
                        <Password id="password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" ></Password>
                    </div>
                    <div class="field col-12 md:col-6">
                        <label for="firstname2">Firstname</label>
                        <InputText id="firstname2" type="text" />
                    </div>
                    <div class="field col-12 md:col-6">
                        <label for="lastname2">Lastname</label>
                        <InputText id="lastname2" type="text" />
                    </div>
                    <div class="field col-12 md:col-4">
                        <label for="state">Type</label>
                        <Dropdown id="state" v-model="typeInput" :options="type" optionLabel="name" optionValue="id" placeholder="Select One"></Dropdown>
                    </div>
                    <div v-if="typeInput === 1" class="field col-12 md:col-4">
                        <label for="city">Student Type</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div v-else class="field col-12 md:col-4">
                        <label for="city">Employment Type</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div v-if="typeInput ===1" class="field col-12 md:col-4">
                        <label for="city">Level</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div v-else class="field col-12 md:col-4">
                        <label for="city">Office / College</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div v-if="typeInput ===1" class="field col-12 md:col-4">
                        <label for="city">Program</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div v-else class="field col-12 md:col-4">
                        <label for="city">Department</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div class="field col-12 md:col-4">
                        <label for="city">Email</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div class="field col-12 md:col-4">
                        <label for="city">Contact Number</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div class="field col-12 md:col-6">
                        <label for="city">Parent/Guardian</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div class="field col-12 md:col-6">
                        <label for="city">Contact Number</label>
                        <InputText id="city" type="text" />
                    </div>
                    <div class="field col-12">
                        <label for="address">Permanent Address</label>
                        <Textarea id="address" rows="3" />
                    </div>
                    <div class="field col-12">
                        <label for="address">Address while at BSU</label>
                        <Textarea id="address" rows="3" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
