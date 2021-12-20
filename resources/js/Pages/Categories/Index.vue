<template>
    <dashboard-layout title="Dashboard">
        <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Categories</h1>

        <Link :href="route('categories.create')"><button class="ml-8 p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300" >+</button></Link>

        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Id</th>
                <th class="px-4 py-3">Nom</th>
                <th class="px-4 py-3">Icona</th>
                <th class="px-4 py-3">Pertany a</th>
                <th class="px-4 py-3">Estat</th>
                <th class="px-4 py-3">Slug</th>
                <th class="px-4 py-3">Data Creació</th>
            </tr>
            
            <tr v-for="category in categories" v-bind:key="category.id" class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3">{{ category.id }}</td>
                <td class="px-4 py-3">{{ category.name }}</td>
                <td class="px-4 py-3"><font-awesome-icon v-bind:icon="!category.icon ? 'file-alt' : category.icon" size="lg" class="black" small /></td>
                <td class="px-4 py-3">{{ category.parent}}</td>
                <td class="px-4 py-3">{{ selectActive(category.active)}}</td>
                <td class="px-4 py-3">{{ category.slug}}</td>
                <td class="px-4 py-3">{{ category.created_at}}</td>
                <td class="px-4 py-3"><Link :href="route('categories.edit', category.id)"><font-awesome-icon icon="pencil-alt" class="text-yellow-300" /></Link></td>
                <td class="px-4 py-3"><button type="button" @click="destroy(category)"><font-awesome-icon icon="trash-alt" class="text-red-500" /></button></td>    
            </tr> 
            <!-- each row -->
        </table>

    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import { Link } from '@inertiajs/inertia-vue3'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'

    library.add(fas)

    export default defineComponent({
        components: {
            DashboardLayout,
            Link,
            FontAwesomeIcon,
        },
        props: {
            categories: Object,
        },
        methods: {
            selectActive(activeInt) {
                switch(activeInt) {
                case 1:
                    return "Activa";
                    break;
                case 0:
                    return "Inactiva";
                    break;
                default:
                    return "Inactiva";
                }
            },
            destroy(category) {
                category._method = 'DELETE';
                this.$inertia.post('/dashboard/categories/' + category.id + '/delete', category);
            }
        }
    })
</script>
