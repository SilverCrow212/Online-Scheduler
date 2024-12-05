import { createRouter, createWebHistory } from 'vue-router';
import AppLayout from '@/layout/AppLayout.vue';
import BlankPage from '@/layout/BlankPage.vue';

const routes = [
    {
        path: '/login',
        name: 'login',
        component: () => import('@/views/LoginPage/Login.vue')
    },
    {
        path: '/',
        component: AppLayout,
        children: [
            {
                path: '',
                name: 'dashboard',
                component: () => import('@/views/Dashboard.vue')
            },
            {
                path: 'patient-list',
                name: 'patientlist',
                component: () => import('@/views/PatientDetails/PatientList.vue')
            },
            {
                path: 'patient-records',
                name: 'patientrecords',
                component: () => import('@/views/PatientDetails/PatientRecords.vue')
            },
            {
                path: 'appointment',
                name: 'appointmentlist',
                component: () => import('@/views/AppointmentList/AppointmentList.vue')
            },
            {
                path: 'editprofile/:id',
                name: 'editprofile',
                component: () => import('@/views/AccountCreation/EditProfile.vue')
            },
            {
                path: 'editprofilepatient/:id',
                name: 'editprofilepatient',
                component: () => import('@/views/AccountCreation/EditProfilePatient.vue')
            },
            {
                path: 'record/:id',
                name: 'record',
                component: () => import('@/views/PatientDetails/Record.vue')
            },
            {
                path: 'holiday',
                name: 'holiday',
                component: () => import('@/views/Holidays/Holiday.vue')
            },
            {
                path: 'reports',
                name: 'reports',
                component: () => import('@/views/ReportCreation/GenerateReport.vue')
            },
            {
                path: 'logs',
                name: 'logs',
                component: () => import('@/views/SystemLogs/Logs.vue')
            },
            {
                path: 'backuprestore',
                name: 'backuprestore',
                component: () => import('@/views/BackupRestore/BackupRestore.vue')
            },
            {
                path: 'patientaccounts',
                name: 'patientaccounts',
                component: () => import('@/views/AccountList/AccountList.vue')
            },
            {
                path: 'pendingaccounts',
                name: 'pendingaccounts',
                component: () => import('@/views/AccountList/AccountListPending.vue')
            },
        ]
    },
    {
        path: '/',
        component: BlankPage,
        children: [
            {
                path: 'create-account',
                name: 'createacc',
                component: () => import('@/views/AccountCreation/CreateAcc.vue')
            },
            {
                path: 'create-account-dependent',
                name: 'createaccdependent',
                component: () => import('@/views/AccountCreation/CreateAccDependent.vue')
            },
            {
                path: 'print/record',
                name: 'printrecord',
                component: () => import('@/views/printouts/PatientRecord.vue')
            },
            {
                path: 'informedconsent/:id',
                name: 'informedconsent',
                component: () => import('@/views/InformedConsent/InformedConsent.vue')
            },
        ]
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');

    if (to.name === 'createacc') {
        next();
    } else if (to.name === 'login' && token) {
        next({ name: 'dashboard' });
    } else if (to.name !== 'login' && !token) {
        next({ name: 'login' }); 
    } else {
        next(); 
    }
});

export default router;
