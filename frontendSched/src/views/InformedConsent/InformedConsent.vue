<script setup>
import { ref } from 'vue';
import { informedConsent } from '@/store/informedconsent';
import { medicalHistoryChoices } from '@/store/choices';

const informedConsentStore = informedConsent();
const medicalHistoryChoicesStore= medicalHistoryChoices();

const questions= medicalHistoryChoicesStore.legend;
const q8Choices = medicalHistoryChoicesStore.q8Choices;
const details = informedConsentStore.details;
const dentalHistory = informedConsentStore.dentalHistory;
const medicalHistory = informedConsentStore.medicalHistory;
const preconsent = informedConsentStore.preconsent;
const finalconsent = informedConsentStore.finalconsent;
// { details,dentalHistory,medicalHistory,preconsent,finalconsent }

</script>

<template>
<div class="grid">
    <div class="col-12">
        <div class="card">
            <h5>Informed Consent</h5>
            <div class="p-fluid formgrid grid">
                <div class="field col-12 md:col-6">
                    <label >Name</label>
                    <InputText type="text" v-model="details.name"/>
                </div>
                <div class="field col-12 md:col-6">
                    <label >Coll-Prog-Yr/Office</label>
                    <InputText type="text" v-model="details.collegeOffice"/>
                </div>
                <div class="field col-12 md:col-12">
                    <label >What is your reason for coming to the dental clinic:</label>
                    <InputText type="text" v-model="details.reason"/>
                </div>
                <h6 class="col-12 font-semibold flex align-items-center justify-content-center">Dental History</h6>
                <div class="field col-12 md:col-6">
                    <label >Previous Dentist</label>
                    <InputText type="text" v-model="dentalHistory.previousDentist"/>
                </div>
                <div class="field col-12 md:col-6">
                    <label >Address</label>
                    <InputText type="text" v-model="dentalHistory.address"/>
                </div>
                <div class="field col-12 md:col-6">
                    <label >Last Dental Visit</label>
                    <InputText type="text" v-model="dentalHistory.lastDentalVisit"/>
                </div>
                <div class="field col-12 md:col-6">
                    <label >Reason for Last Dental Visit</label>
                    <InputText type="text" v-model="dentalHistory.reason"/>
                </div>

                <h6 class="col-12 font-semibold flex align-items-center justify-content-center">Medical History</h6>
                <div class="field col-12 md:col-6">
                    <label >Name of Physician</label>
                    <InputText type="text" v-model="medicalHistory.physician"/>
                </div>
                <div class="field col-12 md:col-6">
                    <label >Specialty, if applicable</label>
                    <InputText type="text" v-model="medicalHistory.specialty"/>
                </div>
                <div class="field col-12 md:col-6">
                    <label >Clinic Address</label>
                    <InputText type="text" v-model="medicalHistory.clinicAddress"/>
                </div>
                <div class="field col-12 md:col-6">
                    <label >Contact Number</label>
                    <InputText type="text" v-model="medicalHistory.contactNumber"/>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{questions[0].question}}
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q1.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q1.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                    </div>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{ questions[1].question }}
                        <div v-if="medicalHistory.q2.answ === 'Yes'">
                            {{ questions[1].followUp }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q2.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q2.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                        <div class="flex flex-wrap gap-3 align-items-center" v-if="medicalHistory.q2.answ === 'Yes'">
                            <InputText type="text" v-model="medicalHistory.q2.remarks" />
                        </div>
                    </div>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{ questions[2].question }}
                        <div v-if="medicalHistory.q3.answ === 'Yes'">
                            {{ questions[2].followUp }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q3.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q3.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                        <div class="flex flex-wrap gap-3 align-items-center" v-if="medicalHistory.q3.answ === 'Yes'">
                            <InputText type="text" v-model="medicalHistory.q3.remarks" />
                        </div>
                    </div>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{ questions[3].question }}
                        <div v-if="medicalHistory.q4.answ === 'Yes'">
                            {{ questions[3].followUp }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q4.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q4.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                        <div class="flex flex-wrap gap-3 align-items-center" v-if="medicalHistory.q4.answ === 'Yes'">
                            <InputText type="text" v-model="medicalHistory.q4.remarks" />
                        </div>
                    </div>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{ questions[4].question }}
                        <div v-if="medicalHistory.q5.answ === 'Yes'">
                            {{ questions[4].followUp }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q5.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q5.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                        <div class="flex flex-wrap gap-3 align-items-center" v-if="medicalHistory.q5.answ === 'Yes'">
                            <InputText type="text" v-model="medicalHistory.q5.remarks" />
                        </div>
                    </div>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{questions[5].question}}
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q6.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q6.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                    </div>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{questions[6].question}}
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q7.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q7.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                    </div>
                </div>
                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        {{ questions[7].question }}
                        <div v-if="medicalHistory.q8.answ === 'Yes'" class="ml-4">
                            <div v-for="category of q8Choices" :key="category.id" class="flex align-items-center mt-2">
                                <Checkbox v-model="medicalHistory.q8.remarks" :inputId="category.id" :value="category.id" class="mr-2" />
                                <label :for="category.id">{{ category.name }}</label>
                                
                                <!-- Conditional input box for ID 3 -->
                                <div v-if="category.id === 3 && medicalHistory.q8.remarks.includes(category.id)">
                                    <InputText type="text" v-model="medicalHistory.q8.others" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q8.answ" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q8.answ" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                    </div>
                </div>
                
                <!-- <div v-for="" class="">
                    loop choices here
                </div> -->

                
            </div>
        </div>
    </div>
</div>
</template>