<script setup>
import { ref } from 'vue';

import AppMenuItem from './AppMenuItem.vue';
const model = ref(null);
if (localStorage.getItem('user_details')) {
    const user_details = JSON.parse(localStorage.getItem('user_details'));
    if (user_details.user_type === 'admin') {
        model.value = [
            {
                label: 'Menu',
                items: [{ label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/' },
                { label: 'Create Account', icon: 'pi pi-user-plus', to: '/create-account' },
                { label: 'Patient Records', icon: 'pi pi-folder-open', to: '/patient-records' },
                { label: 'Appointments', icon: 'pi pi-calendar-plus', to: '/appointment' },
                // { label: 'Create New Account', icon: 'pi pi-user-plus', to: '/create-account' },
                { label: 'Set Holiday', icon: 'pi pi-bookmark', to: '/holiday' },
                { label: 'Export Report', icon: 'pi pi-download', to: '/reports' }
                ],
                
            },
        ];
    }
    else{
        model.value = [
            {
                label: 'Menu',
                items: [{ label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/' },
                // { label: 'Appointments/Records', icon: 'pi pi-calendar-plus', to: '/appointment' },
                // { label: 'Create New Account', icon: 'pi pi-user-plus', to: '/create-account' },
                ],  
            },
        ];
    }
}

</script>

<template>
    <ul class="layout-menu">
        <template v-for="(item, i) in model" :key="item">
            <app-menu-item v-if="!item.separator" :item="item" :index="i"></app-menu-item>
            <li v-if="item.separator" class="menu-separator"></li>
        </template>

    </ul>
</template>

<style lang="scss" scoped></style>
