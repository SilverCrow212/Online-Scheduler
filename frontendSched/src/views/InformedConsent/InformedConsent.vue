<script setup>
// import { onBeforeUnmount, onMounted } from 'vue';
import { informedConsent } from '@/store/informedconsent';
import { medicalHistoryChoices } from '@/store/choices';

const informedConsentStore = informedConsent();
const medicalHistoryChoicesStore = medicalHistoryChoices();

const questions = medicalHistoryChoicesStore.legend;
const q8Choices = medicalHistoryChoicesStore.q8Choices;
const q10Choices = medicalHistoryChoicesStore.q10Choices;
const details = informedConsentStore.data.details;
const dentalHistory = informedConsentStore.data.dentalHistory;
const medicalHistory = informedConsentStore.data.medicalHistory;
const preconsent = informedConsentStore.data.preconsent;
const finalconsent = informedConsentStore.data.finalconsent;

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
                    </div>
                    <div class="col-4">
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

                <div class="field col-12 md:col-12 grid">
                    <div class="col-8">
                        <div class="grid">
                            <span class="col-12">{{ questions[8].question }}</span>
                            <span class="ml-4 mb-2 col-10">{{ questions[8].followUp1 }}</span>
                            <span class="ml-4 mb-2 col-10">{{ questions[8].followUp2 }}</span>
                            <span class="ml-4 col-10">{{ questions[8].followUp3 }}</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="flex mb-2 flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q9.pregnant" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q9.pregnant" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                        <div class="flex mb-2 flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q9.nursing" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q9.nursing" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                        <div class="flex flex-wrap gap-3 align-items-center">
                            <RadioButton v-model="medicalHistory.q9.birthcontrol" value="Yes" />
                            <label class="ml-2">Yes</label>
                            <RadioButton v-model="medicalHistory.q9.birthcontrol" value="No" />
                            <label class="ml-2">No</label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="field col-12 md:col-12 grid mt-3">
                    <div class="col-12">
                        <div class="grid">
                            <span class="col-12">{{ questions[9].question }}</span>
                        </div>
                    </div>
                    <!-- {{ medicalHistory.q10.answ }} -->
                    <div class="col-12 grid mt-2">
                        <div v-for="category of q10Choices" :key="category.id" class="col-4 mt-2">
                            <Checkbox v-model="medicalHistory.q10.answ" :inputId="category.id" :value="category.id" class="mr-2" />
                            <label :for="category.id">{{ category.name }}</label>
                            
                            <div v-if="category.id === 1 && medicalHistory.q10.answ.includes(category.id)">
                                <div v-for="sub_category of category.sub_choices" :key="sub_category.id" class="ml-4">
                                    <Checkbox v-model="medicalHistory.q10.c1" :inputId="sub_category.id" :value="sub_category.id" class="mr-2" />
                                    <label :for="sub_category.id">{{ sub_category.name }}</label>
                                    <div v-if="sub_category.id === 5 && medicalHistory.q10.c1.includes(sub_category.id)">
                                        <InputText type="text" v-model="medicalHistory.q10.c1others" />
                                    </div>
                                </div>
                            </div>

                            <div v-if="category.id === 2 && medicalHistory.q10.answ.includes(category.id)">
                                <InputText type="text" v-model="medicalHistory.q10.c2cancer1" />
                            </div>

                            <div v-if="category.id === 3 && medicalHistory.q10.answ.includes(category.id)">
                                <InputText type="text" v-model="medicalHistory.q10.c3respiratory" />
                            </div>

                            <div v-if="category.id === 4 && medicalHistory.q10.answ.includes(category.id)">
                                <InputText type="text" v-model="medicalHistory.q10.c4blood" />
                            </div>

                            <div v-if="category.id === 15 && medicalHistory.q10.answ.includes(category.id)">
                                <InputText type="text" v-model="medicalHistory.q10.others" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h4>Read Carefully:</h4>
            
            <div class="treatment-section">
                <span class="font-bold">TREATMENT TO BE DONE:</span>
                <p class="justify">I understand and consent to have any treatment done by the dentist after the procedure, risks, benefits and costs have been fully explained. These treatments include, but are not limited to, oral prophylaxis (scaling and polishing), tooth restoration (filling), tooth extraction, local anesthesia, and other dental treatments that may arise during treatment or are necessary for my oral health.</p>
                <div class="signature">Signature:<InputText type="text" v-model="preconsent.treatment"/></div>
            </div>

            <div class="treatment-section">
                <span class="font-bold">DRUGS AND MEDICATIONS:</span>
                <p class="justify">I understand that antibiotics, analgesics, local anesthesia, and other medications can cause allergic reactions like redness and swelling of tissues, pain, itching, vomiting, and/or anaphylactic shock.</p>
                <div class="signature">Signature:<InputText type="text" v-model="preconsent.drugs"/></div>
            </div>

            <div class="treatment-section">
                <span class="font-bold">CHANGES IN TREATMENT PLAN:</span>
                <p class="justify">I understand that during treatment, it may be necessary to change/add procedures because of conditions that may arise or were not discovered during examination while working on the tooth (for example, root canal therapy may be needed following routine restorative procedure). I give my permission to the dentist to make any/all changes and additions or he/she may refer me to private practitioners to do the necessary treatment.</p>
                <div class="signature">Signature:<InputText type="text" v-model="preconsent.treatmentPlan"/></div>
            </div>

            <div class="treatment-section">
                <span class="font-bold">RADIOGRAPH:</span>
                <p class="justify">I understand that an x-ray shot or a radiograph may be necessary as part of the diagnostic aid to come up with a tentative diagnosis of my dental problem and to make a good treatment plan, but this will not give me a 100% assurance for the accuracy of the treatment since all dental treatments are subject to unpredictable complications that may later lead to sudden change of treatment and subject to new charges.</p>
                <div class="signature">Signature:<InputText type="text" v-model="preconsent.radiograph"/></div>
            </div>

            <div class="treatment-section">
                <span class="font-bold">REMOVAL OF TEETH:</span>
                <p class="justify">I understand there are alternatives to tooth removal (root canal therapy, crowns, and periodontal surgery, etc.) and I completely understand these alternatives, including their risks and benefits prior to authorizing the dentist to remove teeth and any other structures necessary for reasons above. I understand that removing teeth does not always remove all the infections, if present, and it may be necessary to have further treatment. I understand the risks involved in having teeth removed, such as pain, swelling, spread of infection, dry socket, fractured jaw, loss of feeling on the teeth, lips, tongue, surrounding tissues that can last for an indefinite period of time. I understand that I may need further treatment under a specialist if complications arise during or following treatment.</p>
                <div class="signature">Signature:<InputText type="text" v-model="preconsent.removal"/></div>
            </div>

            <div class="treatment-section">
                <span class="font-bold">PERIODONTAL DISEASE:</span>
                <p class="justify">I understand that periodontal disease is a serious condition causing gum and bone inflammation and/or loss and that can eventually lead to the loss of my teeth. I understand the alternative treatment plans to correct periodontal disease, including gum surgery, tooth extraction with or without replacement. I understand that undertaking any dental procedures may have future adverse effects on my periodontal conditions.</p>
                <div class="signature">Signature:<InputText type="text" v-model="preconsent.periodontal"/></div>
            </div>

            <div class="treatment-section">
                <span class="font-bold">FILLINGS:</span>
                <p class="justify">I understand that care must be exercised in chewing on fillings, especially during the first 24 hours to avoid breakage. I understand that an extensive filling or a crown may be required, as additional decay or fracture may become evident after initial excavation. I understand that significant sensitivity is a common, but usually temporary, after-effect of a newly placed filling. I further understand that filling a tooth may irritate the nerve tissue, creating sensitivity, and treating such sensitivity could require root canal therapy or extractions.</p>
                <div class="signature">Signature:<InputText type="text" v-model="preconsent.fillings"/></div>
            </div>

            <div class="font-bold underline">I understand that dentistry is not an exact science and that no dentist can properly guarantee accurate results all the time.</div>
            <div class="justify">I hereby authorize the dentist to proceed with and perform dental treatment/s as explained to me. I understand that these are subject to modifications on undiagnosable circumstances that may arise during the course of treatment. The treatments were properly explained to me and any untoward circumstances that may arise during the procedure, the attending dentist will not be held liable since it is my free will, with full trust and confidence in him/her, to undergo dental treatment under his/her care.</div>

            <div class="signatures">
                <div>Patient Signature:<InputText type="text" v-model="finalconsent.patient"/></div>
                <div>Date:<InputText type="text" v-model="finalconsent.date"/></div>
                <div>Dentist Signature:<InputText type="text" v-model="finalconsent.dentist"/></div>
            </div>
            <!-- <Button class="mt-4" label="Finish" @click="closeTab"/> -->
        </div>
    </div>
</div>
</template>



<style>
    .treatment-section {
        margin-bottom: 20px;
    }
    .justify {
        text-align: justify;
        margin: 10px 0;
    }
    .signature {
        text-align: right;
        margin-top: 10px;
    }
    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
</style>