import { defineStore } from 'pinia';
import { ref } from 'vue';

export const teeth = defineStore('teeth', () => {
    const teethData = ref({

        // appointment_id: null, // KABILAM TO TI APPOINTMENT ID 

        tbaby_rightteeth:[
            { id: 55, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 54, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 53, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 52, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 51, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ],
        tadult_rightteeth:[
            { id: 18, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 17, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 16, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 15, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 14, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 13, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 12, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 11, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ],
        badult_rightteeth:[
            { id: 48, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 47, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 46, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 45, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 44, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 43, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 42, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 41, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ],
        bbaby_rightteeth:[
            { id: 85, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 84, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 83, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 82, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 81, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ],
        tbaby_leftteeth:[
            { id: 61, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 62, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 63, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 64, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 65, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ],
        tadult_leftteeth:[
            { id: 21, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 22, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 23, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 24, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 25, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 26, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 27, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 28, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ],
        badult_leftteeth:[
            { id: 31, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 32, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 33, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 34, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 35, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 36, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 37, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 38, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ],
        bbaby_leftteeth:[
            { id: 71, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 72, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 73, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 74, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
            { id: 75, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
        ]
    });

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
        services:[],
        toothnumber:null,
        medicineprescribed:null,
        remarks:null
    });

    const resetTeethData = () => {
        Object.keys(teethData.value).forEach(key => {
            if (Array.isArray(teethData.value[key])) {
                // Resetting arrays to their initial state
                teethData.value[key] = teethData.value[key].map(item => ({
                    ...item,
                    topBox: null,
                    botBox: null,
                    class: ["top:white", "left:white", "right:white", "center:white", "bottom:white"]
                }));
            } else {
                // Resetting other properties to null
                teethData.value[key] = null; // Or '' if you prefer empty strings
            }
        });
    };
    const resetFirstPage = () => {
        Object.keys(firstPage).forEach(key => {
            firstPage[key] = null;
        });
    };

    const resetServicesRendered = () => {
        Object.keys(servicesRendered).forEach(key => {
            servicesRendered[key] = null;
        });
    };
    return { teethData, firstPage, servicesRendered, resetTeethData, resetFirstPage, resetServicesRendered };
});


// export const top_TopRightTeeth = defineStore('top_TopRightTeeth', () => {
//     const teeth = ref([
//         { id: 55, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 54, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 53, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 52, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 51, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });

// export const top_BotRightTeeth = defineStore('top_BotRightTeeth', () => {
//     const teeth = ref([
//         { id: 18, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 17, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 16, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 15, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 14, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 13, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 12, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 11, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });

// export const bot_TopRightTeeth = defineStore('bot_TopRightTeeth', () => {
//     const teeth = ref([
//         { id: 48, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 47, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 46, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 45, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 44, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 43, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 42, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 41, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });

// export const bot_BotRightTeeth = defineStore('bot_BotRightTeeth', () => {
//     const teeth = ref([
//         { id: 85, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 84, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 83, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 82, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 81, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });


//Left Teeth


// export const top_TopLeftTeeth = defineStore('top_TopLeftTeeth', () => {
//     const teeth = ref([
//         { id: 61, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 62, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 63, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 64, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 65, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });

// export const top_BotLeftTeeth = defineStore('top_BotLeftTeeth', () => {
//     const teeth = ref([
//         { id: 21, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 22, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 23, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 24, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 25, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 26, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 27, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 28, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });

// export const bot_TopLeftTeeth = defineStore('bot_TopLeftTeeth', () => {
//     const teeth = ref([
//         { id: 31, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 32, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 33, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 34, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 35, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 36, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 37, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 38, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });

// export const bot_BotLeftTeeth = defineStore('bot_BotLeftTeeth', () => {
//     const teeth = ref([
//         { id: 71, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 72, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 73, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 74, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//         { id: 75, topBox: null, botBox: null, class: ["top:white", "left:white", "right:white", "center:white", "bottom:white" ] },
//     ]);
//     return { teeth };
// });