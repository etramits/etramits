<template>
    <dashboard-layout title="Dashboard">
        <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Articles</h1>
        
    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    export default defineComponent({
        components: {
            DashboardLayout
        },
        props: {
            articles: Object,
        },
        methods: {
            
        }
    })
</script>