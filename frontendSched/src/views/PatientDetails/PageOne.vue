<script setup>
import {ref} from 'vue'
import Teeth from '@/views/Teeth/Teeth.vue';
const imageurl = '/asd.png'; // Use the path directly
import {periodicalScreeningChoices, occlusionChoices, appliancesChoices, tmdChoices, oralHygieneChoices } from '@/store/choices';
import {otherInputs} from '@/store/teethothers';
const periodicalScreeningStore = periodicalScreeningChoices();
const occlusionStore = occlusionChoices();
const appliancesStore = appliancesChoices();
const tmdStore = tmdChoices();
const oralHygieneStore = oralHygieneChoices();
const otherStore = otherInputs();
const useOthers = otherStore.firstPage


const periodicalScreeningChoice = periodicalScreeningStore.legend;
const occlusionChoice = occlusionStore.legend;
const appliancesChoice = appliancesStore.legend;
const tmdChoice = tmdStore.legend;
const oralHygieneChoice = oralHygieneStore.legend;

</script>

<template>
<div class="grid formgrid col-12 m-0 p-0" style="display: flex;">
    <div class="col-12"> 
        <Teeth/>
        <!-- <img :src="imageurl" alt="Description of image" style="width: 100%; height: auto;"/> -->
    </div>
    <!-- <Divider layout="vertical" class="p-0 m-0"/> -->
    
</div>
<div class="p-fluid formgrid grid mt-3">
        <div class="field col-12 md:col-6">
            <h5>Periodical Screening</h5>
            <!-- {{ useOthers.periodicalScreening }} -->
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category in periodicalScreeningChoice" :key="category.id" class="col-4 mb-1">
                    <Checkbox
                        v-model="useOthers.periodicalScreening"
                        name="category"
                        :value="category.id"
                    />
                    <label :for="category.id">{{ category.name }}</label>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-6">
            <h5>Occlusion</h5>
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category in occlusionChoice" :key="category.id" class="col-4 mb-1">
                    <Checkbox
                        v-model="useOthers.occlusion"
                        name="category"
                        :value="category.id"
                    />
                    <label :for="category.id">{{ category.name }}</label>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-6">
            <h5>Appliances</h5>
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category in appliancesChoice" :key="category.id" class="col-4 mb-1">
                    <Checkbox
                        v-model="useOthers.appliances"
                        name="category"
                        :value="category.id"
                    />
                    <label :for="category.id">{{ category.name }}</label>

                    <div v-if="category.id === 8 && useOthers.appliances.includes(category.id)">
                        <InputText type="text" v-model="useOthers.rpd" />
                    </div>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-6">
            <h5>TMD</h5>
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category in tmdChoice" :key="category.id" class="col-4 mb-1">
                    <Checkbox
                        v-model="useOthers.tmd"
                        name="category"
                        :value="category.id"
                        :disabled="category.id===1"
                    />
                    <label :for="category.id">{{ category.name }}</label>

                    <div v-if="category.id === 7 && useOthers.tmd.includes(category.id)">
                        <InputText type="text" v-model="useOthers.tmdOthers" />
                    </div>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-12">
            <h5>Others</h5>
            <div class="col-12 p-0 m-0">
                <div class="field col-12 md:col-12">
                    <InputText v-model="useOthers.others" type="text" class="w-full"/>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-3">
            <label for="dateOfExamination1">Date of Examination</label>
            <InputText id="dateOfExamination1" v-model="useOthers.dateOfExamination1" placeholder="Date of Examination" />
            <div class="oral-hygiene-status">
                <div v-for="category in oralHygieneChoice" :key="category.id" class="mb-1">
                    <RadioButton 
                        v-model="useOthers.oralHygieneStatus1"
                        :inputId="`oralHygieneStatus1-${category.id}`"
                        name="oralHygieneStatus1"
                        :value="category.id"
                    />
                    <label :for="`oralHygieneStatus1-${category.id}`">{{ category.name }}</label>
                </div>
            </div>
            <div class="status-label">Oral Hygiene Status</div>
        </div>

        <div class="field col-12 md:col-3">
            <label for="dateOfExamination2">Date of Examination</label>
            <InputText id="dateOfExamination2" v-model="useOthers.dateOfExamination2" placeholder="Date of Examination" />
            <div class="oral-hygiene-status">
                <div v-for="category in oralHygieneChoice" :key="category.id" class="mb-1">
                    <RadioButton 
                        v-model="useOthers.oralHygieneStatus2"
                        :inputId="`oralHygieneStatus2-${category.id}`"
                        name="oralHygieneStatus2"
                        :value="category.id"
                    />
                    <label :for="`oralHygieneStatus2-${category.id}`">{{ category.name }}</label>
                </div>
            </div>
            <div class="status-label">Oral Hygiene Status</div>
        </div>

        <div class="field col-12 md:col-3">
            <label for="dateOfExamination3">Date of Examination</label>
            <InputText id="dateOfExamination3" v-model="useOthers.dateOfExamination3" placeholder="Date of Examination" />
            <div class="oral-hygiene-status">
                <div v-for="category in oralHygieneChoice" :key="category.id" class="mb-1">
                    <RadioButton 
                        v-model="useOthers.oralHygieneStatus3"
                        :inputId="`oralHygieneStatus3-${category.id}`"
                        name="oralHygieneStatus3"
                        :value="category.id"
                    />
                    <label :for="`oralHygieneStatus3-${category.id}`">{{ category.name }}</label>
                </div>
            </div>
            <div class="status-label">Oral Hygiene Status</div>
        </div>

        <div class="field col-12 md:col-3">
            <label for="dateOfExamination4">Date of Examination</label>
            <InputText id="dateOfExamination4" v-model="useOthers.dateOfExamination4" placeholder="Date of Examination" />
            <div class="oral-hygiene-status">
                <div v-for="category in oralHygieneChoice" :key="category.id" class="mb-1">
                    <RadioButton 
                        v-model="useOthers.oralHygieneStatus4"
                        :inputId="`oralHygieneStatus4-${category.id}`"
                        name="oralHygieneStatus4"
                        :value="category.id"
                    />
                    <label :for="`oralHygieneStatus4-${category.id}`">{{ category.name }}</label>
                </div>
            </div>
            <div class="status-label">Oral Hygiene Status</div>
        </div>

    </div>
</template>
<style scoped>
.status-label {
    font-weight: bold;
    margin-top: 0.5rem;
}
.oral-hygiene-status {
    display: flex;
    flex-direction: column;
}
</style>