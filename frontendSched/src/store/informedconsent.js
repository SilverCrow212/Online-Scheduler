import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const informedConsent = defineStore('informedConsent', () => {
    const data = ref({
        details:{name:null, collegeOffice:null, reason:null },
        dentalHistory:{ previousDentist:null, address:null, lastDentalVisit:null, reason:null},
        medicalHistory: {
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
            q9:{pregnant:null, nursing:null, birthcontrol:null},
            q10:{answ:[], c1:[], c1others:null, c2cancer:null, c3respiratory:null, c4blood:null, others:null},
            
        },
        vitals:{
            bloodtype:null,
            bleedingtime:null,
            bloodpressure:null,
            datetaken:null
        },
        preconsent:{
            treatment:null,
            drugs:null,
            treatmentPlan:null,
            radiograph:null,
            removal:null,
            periodontal:null,
            fillings:null
        },
        finalconsent:{
            patient:null,
            date:null,
            dentist:null
        }
    });
    const resetData = () => {
        data.value.details = { name: null, collegeOffice: null, reason: null };
        data.value.dentalHistory = { previousDentist: null, address: null, lastDentalVisit: null, reason: null };
        data.value.medicalHistory = {
            physician: null,
            specialty: null,
            clinicAddress: null,
            contactNumber: null,
            q1: { answ: null },
            q2: { answ: null, remarks: null },
            q3: { answ: null, remarks: null },
            q4: { answ: null, remarks: null },
            q5: { answ: null, remarks: null },
            q6: { answ: null },
            q7: { answ: null },
            q8: { answ: null, remarks: [], others: null },
            q9: { pregnant: null, nursing: null, birthcontrol: null },
            q10: { answ: [], c1: [], c1others: null, c2cancer: null, c3respiratory: null, c4blood: null, others: null },
        };
        data.value.vitals = { bloodtype: null, bleedingtime: null, bloodpressure: null, datetaken: null };
        data.value.preconsent = { treatment: null, drugs: null, treatmentPlan: null, radiograph: null, removal: null, periodontal: null, fillings: null };
        data.value.finalconsent = { patient: null, date: null, dentist: null };
    };
    return { data, resetData };
});