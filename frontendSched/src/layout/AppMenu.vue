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
                { label: 'Add a Leave', icon: 'pi pi-bookmark', to: '/holiday' },
                { label: 'Export Report', icon: 'pi pi-download', to: '/reports' },
                { label: 'Logs', icon: 'pi pi-align-justify', to: '/logs' },
                { label: 'Backup and Restore', icon: 'pi pi-database', to: '/backuprestore' },
                { label: 'Accounts Status', icon: 'pi pi-users', to: '/patientaccounts' },
                { label: 'Pending Accounts', icon: 'pi pi-users', to: '/pendingaccounts' },
                ],
                
            },
        ];
    }
    else if(user_details.user_details.type==2){
        model.value = [
            {
                label: 'Menu',
                items: [{ label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/' },
                // { label: 'Appointments/Records', icon: 'pi pi-calendar-plus', to: '/appointment' },
                { label: 'Dependent', icon: 'pi pi-user-plus', to: '/dependents' },
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
