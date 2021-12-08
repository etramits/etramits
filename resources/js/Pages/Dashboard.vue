<template>
    <dashboard-layout title="Dashboard">

    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import AsideLayout from '@/Layouts/AsideLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'

    export default defineComponent({
        components: {
            AsideLayout,
            DashboardLayout
        },
    })
</script>
