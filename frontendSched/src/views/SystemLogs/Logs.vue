<script setup>
import { ref, onMounted } from 'vue';
import { fetchLogs } from '@/api/ApiLogs';
import { FilterMatchMode } from 'primevue/api';
const selectedPatients = ref(null);
const metaKey = ref(true);
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    'id': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'action': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'user_id': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'created_at': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'updated_at': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
});
const toast = useToast();

onMounted(async () => {
    const data = await fetchLogs();
    records.value = data;

});

const records = ref([]);

</script>
<template>
    <Toast/>
<DataTable v-model:selection="selectedPatients" paginator :rows="10" :value="records" selectionMode="single" :metaKeySelection="metaKey" dataKey="id" tableStyle="min-width: 50rem"v-model:filters="filters"  :globalFilterFields="['id','action','user_id','created_at','updated_at']">
    <template #header>
                        <div class="flex justify-content-end">
                            <IconField iconPosition="left">
                                <InputIcon>
                                    <i class="pi pi-search" />
                                </InputIcon>
                                <InputText v-model="filters['global'].value" placeholder="Search" />
                            </IconField>
                        </div>
                    </template>
    <Column field="id" header="ID"></Column>
    <Column field="action" header="Action"></Column>
    <Column field="user_id" header="ID number"></Column>
    <Column field="created_at" header="Created At"></Column>
    <Column field="updated_at" header="Updated At"></Column>

</DataTable>
</template>
