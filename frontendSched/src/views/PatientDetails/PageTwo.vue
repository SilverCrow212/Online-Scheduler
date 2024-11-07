<script setup>
import {ref} from 'vue'
import {serviceRendered} from '@/store/choices'
import {otherInputs} from '@/store/teethothers';
import { appointment } from '@/store/appointmentenc';
const appointmentStore = appointment();
const serviceRenderedStore = serviceRendered();
const serviceChoices = serviceRenderedStore.legend;
const otherInputsStore = otherInputs();
import { createacc } from '@/store/createacc';
import { statusChoices } from '@/store/choices';
const createaccStore = createacc();
const createaccount  =createaccStore.accDetails;
const statusStore = statusChoices();
const statuschoices = statusStore.legend
const otherInput = otherInputsStore.servicesRendered;
// const multiselectValue = ref(null);
const value = ref();
const user_details = JSON.parse(localStorage.getItem('user_details'));
</script>
<template>
    <!-- {{ otherInputsStore }} -->
      <!-- {{ appointmentStore }} -->
    <h5>Services Rendered</h5>
    <MultiSelect v-model="otherInput.services_rendered" :options="serviceChoices" optionLabel="name" placeholder="Select Services" :filter="true" class="w-full" :disabled="user_details.user_type === 'user'">
        <template #value="slotProps">
            <div class="inline-flex align-items-center py-1 px-2 bg-primary text-primary border-round mr-2" v-for="option in slotProps.value" :key="option.id">
                <div>{{ option.name }}</div>
            </div>
            <template v-if="!slotProps.value || slotProps.value.length === 0">
                <div class="p-1">Select Services</div>
            </template>
        </template>
        <template #option="slotProps">
            <div class="flex align-items-center">
                <div>{{ slotProps.option.name }}</div>
            </div>
        </template>
    </MultiSelect>
    <div class="p-fluid formgrid grid">
        <div class="field col-12 md:col-6">
            <label >Tooth Number</label>
            <Textarea v-model="otherInput.tooth_number" rows="5" cols="30" :disabled="user_details.user_type === 'user'"/>
        </div>
        <div class="field col-12 md:col-6">
            <label >Medicine Given / Prescribed</label>
            <Textarea v-model="otherInput.medicine_prescribed" rows="5" cols="30" :disabled="user_details.user_type === 'user'"/>
        </div>
        <div class="field col-12 md:col-12">
            <label >Remarks</label>
            <Textarea v-model="otherInput.remarks" rows="5" cols="30" :disabled="user_details.user_type === 'user'"/>
        </div>
        <div class="field col-12 md:col-12">
            <label>Status</label>
            <Dropdown
            id="status"
            placeholder="Select One"
            v-model="appointmentStore.appointmentDetails.status"
            :options="statuschoices"
            optionLabel="name"
            optionValue="id"
            />
        </div>
    </div>
</template>