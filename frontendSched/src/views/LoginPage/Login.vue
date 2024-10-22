<script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import { Login } from '@/api/ApiLogin'; 
import { login } from '@/store/user';
const loginStore = login();

const loginDetails = loginStore.loginDetails;

const { layoutConfig } = useLayout();
const idnum = ref('');
const password = ref('');
const checked = ref(false);

const logoUrl = computed(() => {
    return `/layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});

const router = useRouter();
function createAccount(){
    router.push({ name: 'createacc' });
}

async function handleLogin() {
    console.log('asd',loginDetails)
    await Login(loginDetails);
}
</script>

<template>
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
                        <InputText v-model="loginDetails.school_id_number"  type="text" placeholder="ID number" class="w-full md:w-30rem mb-5" style="padding: 1rem"/>

                        <label class="block text-900 font-medium text-xl mb-2">Password</label>
                        <Password v-model="loginDetails.password" placeholder="Password" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }" :feedback="false" toggleMask/>

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
