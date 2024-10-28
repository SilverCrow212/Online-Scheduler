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

    const q10Choices = ref([
        {
            id:1, 
            name: 'Cardiovascular Disease', 
            sub_choices:[
            {id:1, name:'High Blood Pressure'},
            {id:2, name:'Prosthetic Valves'},
            {id:3, name:'Stroke'},
            {id:4, name:'Infective Carditis'},
            {id:5, name:'Others'},
        ]
        },
        {id:2, name: 'Cancer (Please Specify)'},
        {id:3, name: 'Respiratory problem (Please Specify)'},
        {id:4, name: 'Blood disease (Please Specify)'},
        {id:5, name: 'Thyroid problem'},
        {id:6, name: 'Hepatitis'},
        {id:7, name: 'Epilepsy / Seizure'},
        {id:8, name: 'Tubercolosis'},
        {id:9, name: 'Hip / Joint Replacement'},
        {id:10, name: 'Arthritis / Rheumatism'},
        {id:11, name: 'Diabetes'},
        {id:12, name: 'Kidney disease'},
        {id:13, name: 'Liver disease'},
        {id:14, name: 'HIV / AIDS'},
        {id:15, name: 'Others'},

        
    ]);
    


    return { legend,q8Choices, q10Choices };
});


export const periodicalScreeningChoices = defineStore('periodicalScreeningChoices', () => {
    const legend = ref([
        {id:1, name: 'Bleeding '},
        {id:2, name: 'Calculus'},
        {id:3, name: 'Perio Pocket'},
    ]);
    return { legend };
});

export const occlusionChoices = defineStore('occlusionChoices', () => {
    const legend = ref([
        {name: "Crowding", id:1},
        {name: "Spacing", id:2},
        {name: "Overjet", id:3},
        {name: "Overbite", id:4},
        {name: "Open bite", id:5},
        {name: "Underbite", id:6},
        {name: "Crossbite", id:7},
        {name: "Midline Deviation", id:8},
        {name: "Abnormal eruption", id:9},
        {name: "Class (Molar)", id:10},
    ]);
    return { legend };
});

export const appliancesChoices = defineStore('appliancesChoices', () => {
    const legend = ref([
        {name: "Braces", id:1},
        {name: "Retainer", id:2},
        {name: "Other Ortho", id:3},
        {name: "Crown", id:4},
        {name: "Bridge", id:5},
        {name: "Implant", id:6},
        {name: "CD", id:7},
        {name: "RPD", id:8},
    ]);
    return { legend };
});

export const tmdChoices = defineStore('tmdChoices', () => {
    const legend = ref([
        {name: "Pain in the:", id:1},
        {name: "Jaw", id:2},
        {name: "Temple", id:3},
        {name: "Ear", id:4},
        {name: "Clicking", id:5},
        {name: "Locking", id:6},
        {name: "Others", id:7},
    ]);
    return { legend };
});

export const oralHygieneChoices = defineStore('oralHygieneChoices', () => {
    const legend = ref([
        {name: "E", id:1},
        {name: "G", id:2},
        {name: "F", id:3},
        {name: "P", id:4},
    ]);
    return { legend };
});

export const departmentChoices = defineStore('departmentChoices', () => {
    const department = ref([
        {name: "College of Agriculture", id:1},
        {name: "College of Arts and Humanities", id:2},
        {name: "College of Engineering", id:3},
        {name: "College of Forestry", id:4},
        {name: "College of Home Economics and Technology", id:5},
        {name: "College of Human Kinetics", id:6},
        {name: "College of Information Sciences", id:7},
        {name: "College of Natural Sciences", id:8},
        {name: "College of Numeracy and Applied Sciences", id:9},
        {name: "College of Nursing", id:10},
        {name: "College of Public Administration and Governance", id:11},
        {name: "College of Social Sciences", id:12},
        {name: "College of Teacher Education", id:13},
        {name: "College of Veterinary Medicine", id:14},
        {name: "Open University", id:15},
        {name: "Elementary", id:16},
        {name: "Highschool", id:17},
        {name: "Senior High School", id:18},
    ]);

    const type = ref([
        { name: 'Student', id:1 },
        { name: 'Faculty', id:2 },
    ]);
    return { department, type };
});


export const statusChoices = defineStore('statusChoices', () => {
    const legend = ref([
        {id:1, name: 'Complete'},
        {id:2, name: 'No show'},
        {id:3, name: 'Cancelled Appointment'},
    ]);
    return { legend };
});

export const sexChoices = defineStore('sexChoices', () => {
    const legend = ref([
        'Male',
        'Female',
    ]);
    return { legend };
});