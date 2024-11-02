import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const otherInputs = defineStore('otherInputs', () => {
    const firstPage= ref({
        periodicalScreening:[],
        occlusion:[],
        appliances:[],
        rpd:null,
        tmd:[],
        tmdOthers:null,
        others:null,
        dateOfExamination1:null,
        dateOfExamination2:null,
        dateOfExamination3:null,
        dateOfExamination4:null,
        oralHygieneStatus1:null,
        oralHygieneStatus2:null,
        oralHygieneStatus3:null,
        oralHygieneStatus4:null,
    });

    const servicesRendered = ref({
        services_rendered:[],
        tooth_number:null,
        medicine_prescribed:null,
        remarks:null
    });
    return { firstPage, servicesRendered };
});