<script setup>
import { useLayout } from '@/layout/composables/layout';
import { ref, computed, onMounted } from 'vue';
import AppConfig from '@/layout/AppConfig.vue';
import { useRouter } from 'vue-router';
import { Login } from '@/api/ApiLogin';
import { fetchUserData } from '@/api/ApiUser';
import { login, user } from '@/store/user';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
import { EditAcc, EditEmail, EditPassword, EditSecurity, SecurityQuestions, verifySecurity, ResetPassword  } from '@/api/ApiLogin';

const toast = useToast();
const security_questions = ref([]);
const loginStore = login();
const loginDetails = loginStore.loginDetails;
const userStore = user();
onMounted(async()=>{
    security_questions.value = await SecurityQuestions();
})
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

const visible = ref(false)
const visible2 = ref(false)
const forgot = ref({school_id_number:null, security_question:null, security_answer:null});
const password = ref(null);
const validationErrors = ref({});
async function clickSecurity() {
    validationErrors.value = {};

    if (!forgot.value.school_id_number) {
        validationErrors.value.school_id_number = 'ID number is required.';
    }
    if (!forgot.value.security_question) {
        validationErrors.value.security_question = 'Security question is required.';
    }
    if (!forgot.value.security_answer) {
        validationErrors.value.security_answer = 'Answer is required.';
    }

    // If there are no validation errors, proceed
    if (Object.keys(validationErrors.value).length === 0) {
        const response = await verifySecurity(forgot.value, toast);
        console.log('response here', response);
        if (response === 'verified') {
            visible2.value = true;
        }
    }
}

async function changePass(){
    if (!password.value) {
        toast.add({ severity: 'error', summary: 'Password is required.' });
        return;
    }
    const data = ref({
        school_id_number:forgot.value.school_id_number,
        password:password.value
    })
        await ResetPassword(data.value, toast);
        visible.value=false
        visible2.value=false

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
                        <Button label="Forgot Password" class="w-full p-3 text-xl mt-4" @click="visible=true"></Button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <AppConfig simple />

    <Dialog v-model:visible="visible" modal header="Verify Account" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <!-- <AppointmentPopup/> -->
        <div class="field col-12 md:col-12">
            <label>ID Number</label>
            <InputText v-model="forgot.school_id_number"  type="text" placeholder="ID number" class="w-full md:w-30rem"  />
            <small v-if="validationErrors.school_id_number" class="p-error">{{ validationErrors.school_id_number }}</small>
        </div>
        <div class="field col-12 md:col-12">
            <label>Select Question</label>
            <Dropdown v-model="forgot.security_question" 
            :options="security_questions"
            optionLabel="item"
            optionValue="id"
            placeholder="Select One"
            class="w-full md:w-30rem"
        />
        <small v-if="validationErrors.security_question" class="p-error">{{ validationErrors.security_question }}</small>
        </div>
        <div class="field col-12 md:col-12">
            <label>Answer <span style="color:red;">(!Case Sensitive!)</span></label>
            <InputText v-model="forgot.security_answer"  type="text" placeholder="Answer" class="w-full md:w-30rem " />
            <small v-if="validationErrors.security_answer" class="p-error">{{ validationErrors.security_answer }}</small>
        </div>
         <!-- ID Number
        <InputText v-model="forgot.school_id_number"  type="text" placeholder="ID number" class="w-full md:w-30rem mb-4" style="padding: 1rem" /> -->
        <!-- Select Question
        <Dropdown v-model="forgot.security_question" 
            :options="security_questions"
            optionLabel="item"
            optionValue="id"
            placeholder="Select One"
            class="w-full md:w-30rem mb-5"
        /> -->
        <!-- Answer
        <InputText v-model="forgot.security_answer"  type="text" placeholder="Answer" class="w-full md:w-30rem mb-5" style="padding: 1rem" /> -->
        <div class="flex justify-content-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
            <Button type="button" label="Verify" @click="clickSecurity()"></Button>
        </div>
    </Dialog>
    
    <Dialog v-model:visible="visible2" modal header="Change Password" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
        <div class="field col-12 md:col-12">
            <label>New Password</label>
            <InputText v-model="password" type="text" placeholder="Enter New Password"/>
        </div>
    <!-- New Password
    <InputText v-model="password"  type="text" placeholder="New Password" class="w-full md:w-30rem mb-5" style="padding: 1rem" /> -->
    <div class="flex justify-content-end gap-2">
        <Button type="button" label="Cancel" severity="secondary" @click="visible2 = false"></Button>
        <Button type="button" label="Change Password" @click="changePass()"></Button>
    </div>
</Dialog>
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
