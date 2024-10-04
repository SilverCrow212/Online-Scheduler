<script setup>
import { ref } from 'vue';
import { informedConsent } from '@/store/informedconsent';
const informedConsentStore = informedConsent();
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
                <div class="field col-12">
                    <label >Address</label>
                    <Textarea  rows="4" />
                </div>
                <div class="field col-12 md:col-6">
                    <label >City</label>
                    <InputText type="text" />
                </div>
                <div class="field col-12 md:col-3">
                    <label >State</label>
                    <Dropdown  v-model="dropdownItem" :options="dropdownItems" optionLabel="name" placeholder="Select One"></Dropdown>
                </div>
                <div class="field col-12 md:col-3">
                    <label >Zip</label>
                    <InputText type="text" />
                </div>
            </div>
        </div>
    </div>
</div>
</template>