<script setup>
import PageOne from '@/views/PatientDetails/PageOne.vue';
import PageTwo from '@/views/PatientDetails/PageTwo.vue';
</script>   
<template>
   
        <Stepper>
            <StepperPanel header="Step I">
                <template #content="{ nextCallback }">
                    
                        <PageOne/>
                    
                    <div class="flex pt-4 justify-content-end">
                        <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="nextCallback" />
                    </div>
                </template>
            </StepperPanel>
            <StepperPanel header="Step II">
                <template #content="{ prevCallback, nextCallback }">
                    <PageTwo/>
                    <div class="flex pt-4 justify-content-between">
                        <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="prevCallback" />
                        <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="nextCallback" />
                    </div>
                </template>
            </StepperPanel>
            <StepperPanel header="Step III">
                <template #content="{ prevCallback }">
                    <div class="flex flex-column h-12rem">
                        <div class="border-2 border-dashed surface-border border-round surface-ground flex-auto flex justify-content-center align-items-center font-medium">Content III</div>
                    </div>
                    <div class="flex pt-4 justify-content-between">
                        <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="prevCallback" />
                        <Button label="Save" icon="pi pi-save" iconPos="right" @click="nextCallback" />
                    </div>
                </template>
            </StepperPanel>
        </Stepper>
</template>

<style scoped>
.p-stepper {
    flex-basis: 50rem;
}
</style>
