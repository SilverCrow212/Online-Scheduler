import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const toothCondition = defineStore('toothCondition', () => {
    const legend = ref([
        {id:1, name: 'Decayed (indicated for filling)', key: 'D' },
        {id:2, name: 'Recurrent Caries', key: 'RC' },
        {id:3, name: 'Indicated for extraction', key: 'X' },
        {id:4, name: 'Root Fragment', key: 'RF' },
        {id:5, name: 'Impacted Tooth', key: 'IM' },
        {id:6, name: 'Partially Erupted', key: 'PE' },
        {id:7, name: 'Unerupted Tooth', key: 'Un' },
        {id:8, name: 'Rotated Tooth', key: 'Ro' },
        {id:9, name: 'Peg-shaped Tooth', key: 'Peg' },
        {id:10, name: 'Supernumerary Tooth', key: 'SP' },
        {id:11, name: 'Missing Due to Caries', key: 'M' },
        {id:12, name: 'Missing Due to Other Causes', key: 'Mo' },
        {id:13, name: 'Filled With Resin Cement', key: 'Co' },
        {id:14, name: 'Filled With Amalgam', key: 'Am' },
        {id:15, name: 'Filled With Glass Ionomer', key: 'Gc' },
        {id:16, name: 'Sealant', key: 'S' },
        {id:17, name: 'Temporary Filling', key: 'TF' },
        {id:18, name: 'Chipped', key: 'Ch' },
        {id:19, name: 'Fractured', key: 'Fr' },
        {id:20, name: 'Jacket Crown', key: 'JC' },
        {id:21, name: 'Fixed Bridged', key: 'FB' },
        {id:22, name: 'Abutment', key: 'Ab' },
        {id:23, name: 'Pontic', key: 'P' },
        {id:24, name: 'Mobile Tooth', key: 'MT' },
        {id:25, name: 'Root Canal Treated / -diastema', key: 'RCT' },
        
        
    ]);
    return { legend };
});

export const toothTreatment = defineStore('toothTreatment', () => {
    const legend = ref([
        {id:1, name: 'Amaigam Filling', key: 'Am' },
        {id:2, name: 'Composite Filling', key: 'Co' },
        {id:3, name: 'Jacket Crown', key: 'JC' },
        {id:4, name: 'Abutment', key: 'Ab' },
        {id:5, name: 'Attachment', key: 'Att' },
        {id:6, name: 'Pontic', key: 'P' },
        {id:7, name: 'Inlay', key: 'In' },
        {id:8, name: 'Implant', key: 'Imp' },
        {id:9, name: 'Sealants', key: 'S' },
        {id:10, name: 'Removable Denture', key: 'Rm' },
        {id:11, name: 'Extraction Due to Caries', key: 'X' },
        {id:12, name: 'Extraction due to Other Causes', key: 'XO' },
        {id:13, name: 'Present Teeth', key: '✓' },
        // {id:27, name: 'Missing', key: 'X' },
    ]);
    return { legend };
});

// export const serviceRendered = defineStore('serviceRendered', () => {
//     const legend = ref([
//         {id:1, name: 'Oral Examination', key: 'OE' },
//         {id:2, name: 'Oral Prophylaxis', key: 'OP' },
//         {id:3, name: 'Extraction', key:'Exo' },
//         {id:4, name: 'Light Cure Filling', key: 'LC' },
//         {id:5, name: 'Prescribed', key: 'Rx' },
//         {id:6, name: 'Dispensed', key: 'Dx' },
//         {id:7, name: 'Amoxicillin', key: 'AMX' },
//         {id:8, name: 'Paracetamol', key: 'PCM' },
//         {id:9, name: 'Mefenamic Acid', key: 'MA' },
//         {id:10, name: 'Tranexamic Acid', key: 'TXA' },
//         {id:11, name: 'Referred', key: 'Ref' },
//         {id:12, name: 'Removable Partial Denture', key: 'RPD' },
//         {id:13, name: 'Jacket Crown', key: 'JC' },
//         {id:14, name: 'Fixed Bridge', key: 'FB' },
//         {id:15, name: 'Root Canal Treatment', key: 'RCT' },
//     ]);
//     return { legend };
// });
export const serviceRendered = defineStore('serviceRendered', () => {
    const legend = ref([
        {id:1, name: 'Examination'},
        {id:2, name: 'Treatment'},
        {id:3, name: 'Oral Prophylaxis/Scaling'},
        {id:4, name: 'Extraction'},
        {id:5, name: 'Permanent Tooth'},
        {id:6, name: 'Temporary Tooth'},
        {id:7, name: 'Filling/Restoration'},
        {id:8, name: 'Tooth filled w/ Comp.'},
        {id:9, name: 'Tooth filled w/ GIC'},
        {id:10, name: 'Sealant'},
        {id:11, name: 'Tooth Applied w/ sealant'},
        {id:12, name: 'Other Treatment'},
        {id:13, name: 'Oral Health Instruction'},
        {id:14, name: 'Referral'},
        {id:15, name: 'Issuance of Med Cert'},
    ]);
    return { legend };
});

export const medicalHistoryChoices = defineStore('medicalHistoryChoices', () => {
    const legend = ref([
        {id:1, question: 'Are you in good health?'},
        {id:2, question: 'Are you under medical treatment now?', followUp:'If so, what is the condition being treated?'},
        {id:3, question: 'Have you ever had serious illness or surgical operation?', followUp:'If so, illness or operation?'},
        {id:4, question: 'Have you ever been hospitalized?', followUp:'If so when and why?'},
        {id:5, question: 'Are you taking prescription / non-prescription medicine?', followUp:'If so, please specify'},
        {id:6, question: 'Do you use tobacco products?'},
        {id:7, question: 'Do you use alcohol, cocaine or other dangerous drugs?'},
        {id:8, question: 'Are you allergic to any of the following'},
        // Local Anaesthetic (e.g. Iidocane)
        // Antibiotics (e.g. Penicillin, Sulfa drugs)
        // Others (please specify)
        {id:9, question: 'For women only:',followUp1:'Are you pregnant?', followUp2:'Are you nursing?', followUp3:'Are you taking birth control pills?',},
        // Are you pregnant?
        // Are you nursing?
        // Are you taking birth control pills?
        {id:10, question: 'Please check if you have or had any of the following:'},
    ]);

    const q8Choices = ref([
        {id:1, name: 'Local Anaesthetic (e.g. lidocaine)'},
        {id:2, name: 'Antibiotics (e.g. Penicilin, Sulfa drugs)'},
        {id:3, name: 'Others (Please Specify)'},
        
    ]);


    return { legend,q8Choices };
});