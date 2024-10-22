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
                path: 'record/:id',
                name: 'record',
                component: () => import('@/views/PatientDetails/Record.vue')
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
    
    if (to.name === 'login' && token) {
        next({ name: 'dashboard' });
    } else if (to.name !== 'login' && !token) {
        next({ name: 'login' });
    } else {
        next();
    }
});

export default router;
