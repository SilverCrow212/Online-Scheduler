<script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
import { useRouter } from 'vue-router';
import { Login } from '@/api/ApiLogin';
import { fetchUserData } from '@/api/ApiUser';
import { login, user } from '@/store/user';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';

const toast = useToast();

const loginStore = login();
const loginDetails = loginStore.loginDetails;
const userStore = user();

const router = useRouter();

function createAccount() {
    router.push({ name: 'createacc' });
}

async function handleLogin() {
    console.log('Login details:', loginDetails);
    try {
        const result = await Login(loginDetails,toast);

        if (result) {
            localStorage.setItem('token', result);
            console.log('Token stored:', result);

            // Fetch user data after successful login
            const userData = await fetchUserData();
            console.log('Fetched user data:', userData);
            
            // Ensure userData is defined before accessing properties
            if (userData && userData[0]) {
                userStore.user_details.value = userData[0].user_details; // Store user details in your state/store
                localStorage.setItem('user_details', JSON.stringify(userData[0]));
                console.log('User details:', userStore.user_details.value);
                await router.push({ name: 'dashboard' });
            } else {
                console.error('User data not found');
                localStorage.removeItem('token');
            }
        } else {
            console.error('Login failed: No token returned');
            localStorage.removeItem('token');
        }
    } catch (error) {
        console.error('Login error:', error);
        localStorage.removeItem('token');
    }
}
</script>



<template>
     <Toast />
    <div class="surface-ground flex align-items-center justify-content-center min-h-screen min-w-screen overflow-hidden">
        <div class="flex flex-column align-items-center justify-content-center">
            <div style="border-radius: 56px; padding: 0.3rem; background: linear-gradient(180deg, var(--primary-color) 10%, rgba(33, 150, 243, 0) 30%)">
                <div class="w-full surface-card py-8 px-5 sm:px-8" style="border-radius: 53px">
                    <div class="text-center mb-5">
                        <div class="text-900 text-3xl font-medium mb-3">LOG IN</div>
                        <span class="text-600 font-medium">Please sign in to access the system</span>
                    </div>

                    <div>
                        <label class="block text-900 text-xl font-medium mb-2">ID number</label>
                        <InputText v-model="loginDetails.school_id_number"  type="text" placeholder="ID number" class="w-full md:w-30rem mb-5" style="padding: 1rem"  @keyup.enter="handleLogin"/>

                        <label class="block text-900 font-medium text-xl mb-2">Password</label>
                        <Password v-model="loginDetails.password" placeholder="Password" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }" :feedback="false" toggleMask  @keyup.enter="handleLogin"/>

                        <div class="flex align-items-center justify-content-between mb-5 gap-5">
                            <div class="flex align-items-center">
                            </div>
                            <a class="font-medium no-underline ml-2 text-right cursor-pointer" style="color: var(--primary-color)" @click="createAccount">Create New Account</a>
                        </div>
                        <Button label="Sign In" class="w-full p-3 text-xl" @click="handleLogin"></Button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <AppConfig simple />
</template>

<style scoped>
.pi-eye {
    transform: scale(1.6);
    margin-right: 1rem;
}

.pi-eye-slash {
    transform: scale(1.6);
    margin-right: 1rem;
}
</style>
