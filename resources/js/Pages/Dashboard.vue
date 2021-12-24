<template>
    <dashboard-layout title="Dashboard">
        <div class="my-20 mx-20 text-white">
            <div class="container flex flex-col items-center mx-auto">
                <div class="grid md:grid-cols-3">
                    <div v-for="registry in stats" :key="registry.id" class="flex flex-row items-center p-10 bg-gray-700 rounded-md shadow m-5">
                        <font-awesome-icon :icon="registry.icon" class="mr-4" color="white" size="4x" />
                        <div class="flex-col">
                            <div class="text-5xl font-semibold">{{ registry.value }}</div>
                            <div class="mt-1 text-xl md:text-2xl">{{ registry.label }}</div>
                        </div>  
                    </div>  
                </div>
            </div>
        </div>
        
    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import AsideLayout from '@/Layouts/AsideLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'

    library.add(fas)

    export default defineComponent({
        components: {
            AsideLayout,
            DashboardLayout,
            FontAwesomeIcon,
        },
        props: {
            stats: Array
        },
    })
</script>
