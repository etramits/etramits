<template>
    <dashboard-layout title="Dashboard">
        <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Usuaris</h1>
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Id</th>
                <th class="px-4 py-3">Nom</th>
                <th class="px-4 py-3">Correu</th>
                <th class="px-4 py-3">Rol</th>
            </tr>
            
            <tr v-for="user in users" class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3">{{ user.id }}</td>
                <td class="px-4 py-3">{{ user.name }}</td>
                <td class="px-4 py-3">{{ user.email }}</td>
                <td class="px-4 py-3">{{ selectRole(user.role) }}</td>
            </tr> 
            <!-- each row -->

        </table>
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
            users: Object,
        },
        methods: {
            selectRole(roleInt) {
                switch(roleInt) {
                case 1:
                    return "Usuari";
                    break;
                case 2:
                    return "Admin";
                    break;
                default:
                    return "Usuari";
                }
            },
        }
    })
</script>
