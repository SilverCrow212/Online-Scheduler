<script setup>
import { ref } from 'vue';

import AppMenuItem from './AppMenuItem.vue';

const model = ref([
    {
        label: 'Dashboard',
        items: [{ label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/' },
        { label: 'Appointments', icon: 'pi pi-fw pi-home', to: '/' }],
        
    },
    {
        label: 'Appointments',
        items: [{ label: 'Appointments', icon: 'pi pi-fw pi-home', to: '/' }]
    },
    {
        label: 'Patient List',
        items: [{ label: 'Patient List', icon: 'pi pi-fw pi-home', to: '/' }]
    },
    {
        label: 'Reports',
        items: [{ label: 'Reports', icon: 'pi pi-fw pi-home', to: '/' }]
    },
    {
        label: 'Logs',
        items: [{ label: 'Logs', icon: 'pi pi-fw pi-home', to: '/' }]
    },
    {
        label: 'Account_creation',
        items: [{ label: 'Create Account', icon: 'pi pi-fw pi-home', to: '/create-account' }]
    },
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
