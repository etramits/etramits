<template>

    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
            Dashboard
        </Link>

        <template v-else>
            <Link :href="route('login')" class="text-sm text-gray-700 underline">
                Log in
            </Link>

            <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                Register
            </Link>
        </template>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        JetApplicationMark,
        JetBanner,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        Link,
    },
    data() {
        return {
            title: "TicTac",
            showingNavigationDropdown: false,
        }
    },
    methods: {

            logout() {
                this.$inertia.post(route('logout'));
            },
    }
})
</script>