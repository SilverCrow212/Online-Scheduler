import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const informedConsent = defineStore('informedConsent', () => {
    const details= ref(
        {name:null, collegeOffice:null, reason:null },
    );
    const dentalHistory= ref(
        { previousDentist:null, address:null, lastDentalVisit:null, reason:null},
    );
    const medicalHistory = ref(
        {
            physician:null,
            specialty:null,
            clinicAddress:null,
            contactNumber:null,
            q1:{answ:null},
            q2:{ answ:null, remarks:null},
            q3:{ answ:null, remarks:null},
            q4:{ answ:null, remarks:null},
            q5:{ answ:null, remarks:null},
            q6:{ answ:null},
            q7:{ answ:null},
            q8:{ answ:null, remarks:[],others:null},
            q9:{ answ:{pregnant:null, nursing:null, birthcontrol:null}},
            q10:{answ:[]},
            
        }
        
    );
    const preconsent = ref(
        {
            treatment:null,
            drugs:null,
            treatmentPlan:null,
            radiograph:null,
            removal:null,
            periodontal:null,
            fillings:null
        }
    );
    const finalconsent = ref(
        {
            patient:null,
            date:null,
            dentist:null
        }
    );
    return { details,dentalHistory,medicalHistory,preconsent,finalconsent };
});