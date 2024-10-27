<script setup>
import { ref } from 'vue';

import AppMenuItem from './AppMenuItem.vue';

const model = ref([
    {
        label: 'Menu',
        items: [{ label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/' },
        { label: 'Appointments', icon: 'pi pi-calendar-plus', to: '/appointment' },
        // { label: 'Create New Account', icon: 'pi pi-user-plus', to: '/create-account' },
        { label: 'Patient Records', icon: 'pi pi-folder-open', to: '/patient-records' },
        { label: 'Create Account', icon: 'pi pi-folder-open', to: '/create-account' }
        ],
        
    },
    // {
    //     label: 'Appointments',
    //     items: [{ label: 'Appointments', icon: 'pi pi-fw pi-home', to: '/appointment' }]
    // },
    // {
    //     label: 'Patient List',
    //     items: [{ label: 'Patient List', icon: 'pi pi-fw pi-home', to: '/' }]
    // },
    // {
    //     label: 'Reports',
    //     items: [{ label: 'Reports', icon: 'pi pi-fw pi-home', to: '/' }]
    // },
    // {
    //     label: 'Logs',
    //     items: [{ label: 'Logs', icon: 'pi pi-fw pi-home', to: '/' }]
    // },
    // {
    //     label: 'Account Creation',
    //     items: [{ label: 'Create Account', icon: 'pi pi-fw pi-home', to: '/create-account' }]
    // },
    // {
    //     label: 'Patient Records',
    //     items: [{ label: 'Patient Records', icon: 'pi pi-fw pi-home', to: '/patient-records' }]
    // },
]);
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
