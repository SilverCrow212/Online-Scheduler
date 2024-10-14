<script setup>
import {ref} from 'vue'
import Teeth from '@/views/Teeth/Teeth.vue';
const imageurl = '/asd.png'; // Use the path directly
import {periodicalScreeningChoices, occlusionChoices, appliancesChoices, tmdChoices} from '@/store/choices';


const categories = ref([
    {name: "Bleeding", key: "B", id:1},
    {name: "Calculus", key: "C", id:2},
    {name: "Perio Pocket", key: "PP", id:3},
    {name: "Code 0", key: "C0", id:4},
    {name: "Code 1", key: "C1", id:5},
    {name: "Code 2", key: "C2", id:6},
    {name: "Code 3", key: "C3", id:7},
    {name: "Code 4", key: "C4", id:8},
    {name: "Code *", key: "C*", id:9},
    {name: "Code X", key: "CX", id:10},
]);
const categories2 = ref([
    {name: "Crowding", key: "B", id:1},
    {name: "Spacing", key: "B", id:2},
    {name: "Overjet", key: "B", id:3},
    {name: "Overbite", key: "B", id:4},
    {name: "Open bite", key: "B", id:5},
    {name: "Underbite", key: "B", id:6},
    {name: "Crossbite", key: "B", id:7},
    {name: "Midline Deviation", key: "B", id:8},
    {name: "Abnormal eruption", key: "B", id:9},
    {name: "Class (Molar)", key: "B", id:10},

]);
const categories3 = ref([
    {name: "Braces", key: "B", id:1},
    {name: "Retainer", key: "B", id:2},
    {name: "Other Ortho", key: "B", id:3},
    {name: "Crown", key: "B", id:4},
    {name: "Bridge", key: "B", id:5},
    {name: "Implant", key: "B", id:6},
    {name: "CD", key: "B", id:7},
    {name: "RPD", key: "B" , remarks:null, id:8},
]);

const categories4 = ref([
    {name: "Pain in the:", key: "B", id:1},
    {name: "Jaw", key: "B", id:2},
    {name: "Temple", key: "B", id:3},
    {name: "Ear", key: "B", id:4},
    {name: "Clicking", key: "B", id:5},
    {name: "Locking", key: "B", id:6},
    {name: "Others", key: "B", id:7},
    
]);
const selectedCategories = ref(['Bleeding']);
</script>

<template>
<div class="grid formgrid col-12 m-0 p-0" style="display: flex;">
    <div class="col-12"> 
        <Teeth/>
        <!-- <img :src="imageurl" alt="Description of image" style="width: 100%; height: auto;"/> -->
    </div>
    <!-- <Divider layout="vertical" class="p-0 m-0"/> -->
    
</div>
<div class="p-fluid formgrid grid mt-3">
        <div class="field col-12 md:col-6">
            <h5>Periodical Screening</h5>
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category of categories" :key="category.key" class="col-4 mb-1" >
                    <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.name" />
                    <label :for="category.key">{{ category.name }}</label>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-6">
            <h5>Occlusion</h5>
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category of categories2" :key="category.key" class="col-6" >
                    <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.name" />
                    <label :for="category.key">{{ category.name }}</label>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-6">
            <h5>Appliances</h5>
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category of categories3" :key="category.key" class="col-6" >
                    <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.name" />
                    <label :for="category.key">{{ category.name }}</label>
                    <div v-if="category.id ===8">
                        <InputText type="text" class="w-full"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-6">
            <h5>TMD</h5>
            <div class="grid formgrid col-12 p-0 m-0">
                <div v-for="category of categories4" :key="category.key" class="col-6" >
                    <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.name" />
                    <label :for="category.key">{{ category.name }}</label>
                </div>
            </div>
        </div>
        <div class="field col-12 md:col-12">
            <h5>Others</h5>
            <div class="col-12 p-0 m-0">
                <div class="field col-12 md:col-12">
                    <InputText type="text" class="w-full"/>
                </div>
            </div>
        </div>
    </div>

</template>
