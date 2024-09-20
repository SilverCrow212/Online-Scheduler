<script setup>
import { ref, onMounted } from 'vue';
import { ProductService } from '@/service/ProductService';

// onMounted(() => {
//     ProductService.getProductsMini().then((data) => (products.value = data));
// });

const products = ref();
const selectedProduct = ref();
const metaKey = ref(true);

const patients = ref(
    [{id:'1', name:'Doe, John Jr.', type:'Student', department:'College of Agriculture'},
    {id:'2', name:'Curtis, Anne', type:'Faculty', department:'College of Information Sciences'},
    {id:'3', name:'Reyes, Raul', type:'Staff', department:'Office of Student Affairs'}

    ]
);
</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                
                <DataTable v-model:selection="selectedProduct" :value="patients" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem">
                    <Column field="name" header="Patient Name"></Column>
                    <Column field="type" header="Type"></Column>
                    <Column field="department" header="Department"></Column>
                </DataTable>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
:deep(.p-datatable-frozen-tbody) {
    font-weight: bold;
}

:deep(.p-datatable-scrollable .p-frozen-column) {
    font-weight: bold;
}
</style>
