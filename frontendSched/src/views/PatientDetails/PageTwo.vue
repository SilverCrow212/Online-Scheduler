<script setup>
import {ref} from 'vue'
import {serviceRendered} from '@/store/choices'
const serviceRenderedStore = serviceRendered();
const serviceChoices = serviceRenderedStore.legend;

const multiselectValue = ref(null);
const value = ref();
</script>
<template>
    <h5>Services Rendered</h5>
    <MultiSelect v-model="multiselectValue" :options="serviceChoices" optionLabel="name" placeholder="Select Services" :filter="true" class="w-full">
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
    <!-- <h5>Remarks</h5> -->
    <div class="p-fluid formgrid grid">
        <!-- <div class="field col-12 md:col-6">
            <label >Service Rendered</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div> -->
        <div class="field col-12 md:col-6">
            <label >Tooth Number</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div>
        <div class="field col-12 md:col-6">
            <label >Medicine Given / Prescribed</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div>
        <div class="field col-12 md:col-12">
            <label >Remarks</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div>
    </div>
</template>