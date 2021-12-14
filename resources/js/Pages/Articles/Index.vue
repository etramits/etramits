<template>
    <dashboard-layout title="Dashboard">
        
    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import Modal from '@/Jetstream/Modal.vue'

    export default defineComponent({
        components: {
            DashboardLayout,
            Modal
        },
        props: {
            articles: Object,
            modal: false,
        },
    })
</script>