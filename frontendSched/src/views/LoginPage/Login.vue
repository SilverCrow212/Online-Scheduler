<script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const { layoutConfig } = useLayout();
const login = ref({
    school_id_number : null,
    password: null
})
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

async function openDashboard(){
    try{
        const receive = await axios.post('http://192.168.7.69:8001/api/login', login.value)
        console.log(receive,'logged in');
        router.push({ name: 'dashboard' });
    }
    catch(err){
        console.error('error',err)
    }
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
                        <label for="idnumber" class="block text-900 text-xl font-medium mb-2">ID number</label>
                        <InputText id="idnumber"  v-model="login.school_id_number"  type="text" placeholder="ID number" class="w-full md:w-30rem mb-5" style="padding: 1rem"/>

                        <label for="password1" class="block text-900 font-medium text-xl mb-2">Password</label>
                        <Password id="password1" v-model="login.password" placeholder="Password" :toggleMask="true" class="w-full mb-3" inputClass="w-full" :inputStyle="{ padding: '1rem' }"></Password>

                        <div class="flex align-items-center justify-content-between mb-5 gap-5">
                            <div class="flex align-items-center">
                            </div>
                            <a class="font-medium no-underline ml-2 text-right cursor-pointer" style="color: var(--primary-color)" @click="createAccount">Create New Account</a>
                        </div>
                        <Button label="Sign In" class="w-full p-3 text-xl" @click="openDashboard"></Button>
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
