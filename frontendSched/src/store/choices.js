import { defineStore } from 'pinia';
import { Fragment, ref } from 'vue';

export const toothChoices = defineStore('toothChoices', () => {
    const legend = ref([
        {id:1, name: 'Decayed (indicated for filling)', key: 'D' },
        {id:2, name: 'Recurrent Caries', key: 'RC' },
        {id:3, name: 'Indicated for extraction', key: 'EX' },
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
        {id:26, name: 'Present', key: '✓' },
        {id:27, name: 'Missing', key: 'X' },
        
    ]);
    return { legend };
});
























