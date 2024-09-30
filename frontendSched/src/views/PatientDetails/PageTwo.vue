<script setup>
import {ref} from 'vue'

const value = ref();
</script>
<template>
    <h5>Remarks</h5>
    <div class="p-fluid formgrid grid">
        <div class="field col-12 md:col-6">
            <label for="firstname2">Service Rendered</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div>
        <div class="field col-12 md:col-6">
            <label for="firstname2">Tooth Number</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div>
        <div class="field col-12 md:col-6">
            <label for="firstname2">Medicine Given / Prescribed</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div>
        <div class="field col-12 md:col-6">
            <label for="firstname2">Remarks</label>
            <Textarea v-model="value" rows="5" cols="30" />
        </div>
    </div>
</template>