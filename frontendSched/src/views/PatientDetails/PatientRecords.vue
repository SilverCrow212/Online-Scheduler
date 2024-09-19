<script setup>
import { ref, onMounted } from 'vue';
import { ProductService } from '@/service/ProductService';

// onMounted(() => {
//     ProductService.getProductsMini().then((data) => (products.value = data));
// });

const products = ref();
const selectedProduct = ref();
const metaKey = ref(true);

</script>

<template>
    <div class="grid">
        <div class="col-12">
            <div class="card">
                <!-- :value="products" -->
                <DataTable v-model:selection="selectedProduct"  selectionMode="multiple" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem">
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
