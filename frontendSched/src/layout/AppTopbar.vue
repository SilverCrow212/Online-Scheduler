<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';
import { useLayout } from '@/layout/composables/layout';
import { useRouter } from 'vue-router';

const { layoutConfig, onMenuToggle } = useLayout();

const outsideClickListener = ref(null);
const topbarMenuActive = ref(false);
const router = useRouter();

onMounted(() => {
    bindOutsideClickListener();
});

onBeforeUnmount(() => {
    unbindOutsideClickListener();
});

const logoUrl = computed(() => {
    return `/layout/images/${layoutConfig.darkTheme.value ? 'logo-white' : 'logo-dark'}.svg`;
});

const onTopBarMenuButton = () => {
    topbarMenuActive.value = !topbarMenuActive.value;
    
};
const onLogout = async () => {
    try {
        // Optionally send a logout request to the server
        await axios.post('logout', login.value);
        console.log('Logged out successfully');
    } catch (err) {
        console.error('Error during logout:', err);
    } finally {
        // Remove the token from local storage
        localStorage.removeItem('token');
        localStorage.removeItem('user_details');
        // Redirect to the login page
        router.push({ name: 'login' });
        
        // Optional: Reset any other state as needed
        topbarMenuActive.value = false;
    }
};

const topbarMenuClasses = computed(() => {
    return {
        'layout-topbar-menu-mobile-active': topbarMenuActive.value
    };
});

const bindOutsideClickListener = () => {
    if (!outsideClickListener.value) {
        outsideClickListener.value = (event) => {
            if (isOutsideClicked(event)) {
                topbarMenuActive.value = false;
            }
        };
        document.addEventListener('click', outsideClickListener.value);
    }
};
const unbindOutsideClickListener = () => {
    if (outsideClickListener.value) {
        document.removeEventListener('click', outsideClickListener);
        outsideClickListener.value = null;
    }
};
const isOutsideClicked = (event) => {
    if (!topbarMenuActive.value) return;

    const sidebarEl = document.querySelector('.layout-topbar-menu');
    const topbarEl = document.querySelector('.layout-topbar-menu-button');

    return !(sidebarEl.isSameNode(event.target) || sidebarEl.contains(event.target) || topbarEl.isSameNode(event.target) || topbarEl.contains(event.target));
};
const userManual = () => {
    const manualUrl = '/User-Manual.pdf';  // Adjust the path to your file
    window.open(manualUrl, '_blank')
};
const userProfile = () => {
    if (localStorage.getItem('user_details')) {
        const user_details = JSON.parse(localStorage.getItem('user_details'));
        router.push({ name: 'editprofile', params: { id: user_details.user_details.id } });
        topbarMenuActive.value = !topbarMenuActive.value;
    }
};

const logout = ref(false);
</script>

<template>
    <div class="layout-topbar">
        <router-link to="/" class="layout-topbar-logo">
            <!-- <img :src="logoUrl" alt="logo" /> -->
            <span>BSU DCIPS</span>
        </router-link>

        <button class="p-link layout-menu-button layout-topbar-button" @click="onMenuToggle()">
            <i class="pi pi-bars"></i>
        </button>

        <button class="p-link layout-topbar-menu-button layout-topbar-button" @click="onTopBarMenuButton()">
            <i class="pi pi-ellipsis-v"></i>
        </button>

        <div class="layout-topbar-menu" :class="topbarMenuClasses">
            <button @click="userManual()" class="p-link layout-topbar-button">
                <i class="pi pi-book"></i>
                <span>Manual</span>
            </button>
            <button @click="userProfile()" class="p-link layout-topbar-button">
                <i class="pi pi-user"></i>
                <span>Profile</span>
            </button>
            <button @click="logout =true" class="p-link layout-topbar-button">
                <i class="pi pi-sign-out"></i>
                <span>Sign Out</span>
            </button>
        </div>
    </div>
    
    <Dialog v-model:visible="logout" modal header="Confirmation" :style="{ width: '35rem' }" :dismissableMask="false" class="p-fluid formgrid grid">
      <div class="field col-12 md:col-12">
          <label>Are you sure you want to logout?</label>
      </div>
      <div class="flex justify-content-end gap-2">
          <Button type="button" label="Cancel" severity="secondary" @click="logout = false"></Button>
          <Button type="button" label="Confirm" @click="onLogout()"></Button>
      </div>
  </Dialog>

</template>

<style lang="scss" scoped></style>
