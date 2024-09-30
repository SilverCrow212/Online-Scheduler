<script setup>
import {ref} from 'vue'
const imageurl = '/asd.png'; // Use the path directly

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
    {name: "Spacing", key: "B", id:1},
    {name: "Overjet", key: "B", id:1},
    {name: "Overbite", key: "B", id:1},
    {name: "Open bite", key: "B", id:1},
    {name: "Underbite", key: "B", id:1},
    {name: "Crossbite", key: "B", id:1},
    {name: "Midline Deviation", key: "B", id:1},
    {name: "Abnormal eruption", key: "B", id:1},
    {name: "Class (Molar)", key: "B", id:1},

]);
const selectedCategories = ref(['Bleeding']);
</script>

<template>
<div class="grid formgrid col-12 m-0 p-0" style="display: flex;">
    <div class="col-7"> 
        <img :src="imageurl" alt="Description of image" style="width: 100%; height: auto;"/>
    </div>
    <Divider layout="vertical" class="p-0 m-0"/>
    <div class="col-5 p-0 m-0" style=" flex-shrink: 0;">
        <h5>Periodical Screening</h5>
        <div class="grid formgrid col-12 p-0 m-0">
            <div v-for="category of categories" :key="category.key" class="col-4 mb-1" >
                <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.name" />
                <label :for="category.key">{{ category.name }}</label>
            </div>
        </div>
        <h5>Occlusion</h5>
        <div class="grid formgrid col-12 p-0 m-0">
            <div v-for="category of categories2" :key="category.key" class="col-6" >
                <Checkbox v-model="selectedCategories" :inputId="category.key" name="category" :value="category.name" />
                <label :for="category.key">{{ category.name }}</label>
            </div>
        </div>
    </div>
</div>

</template>
