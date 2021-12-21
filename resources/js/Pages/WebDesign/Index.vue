<template>
    <dashboard-layout title="Dashboard">
        
        
        <div>
            <h2 class="mb-4 mt-8 ml-12 font-bold text-2xl">Colors</h2>

            <table class="mb-8 mt-4 ml-12">
                <tr>
                    <td :class="`px-6 py-6 bg-yellow-300`"></td>
                    <td :class="`px-6 py-6 bg-yellow-200`"></td>  
                    <td :class="`px-6 py-6 bg-yellow-100`"></td>  
                    <td :class="`px-6 py-6 bg-yellow-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 bg-red-300`"></td>
                    <td :class="`px-6 py-6 bg-red-200`"></td>  
                    <td :class="`px-6 py-6 bg-red-100`"></td>  
                    <td :class="`px-6 py-6 bg-red-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 bg-indigo-300`"></td>
                    <td :class="`px-6 py-6 bg-indigo-200`"></td>  
                    <td :class="`px-6 py-6 bg-indigo-100`"></td>  
                    <td :class="`px-6 py-6 bg-indigo-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 bg-green-300`"></td>
                    <td :class="`px-6 py-6 bg-green-200`"></td>  
                    <td :class="`px-6 py-6 bg-green-100`"></td>  
                    <td :class="`px-6 py-6 bg-green-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 bg-purple-300`"></td>
                    <td :class="`px-6 py-6 bg-purple-200`"></td>  
                    <td :class="`px-6 py-6 bg-purple-100`"></td>  
                    <td :class="`px-6 py-6 bg-purple-50`"></td>  
                </tr> 
            </table>

            <table class="mb-8 mt-4 ml-12">
                <tr>
                    <td :class="`px-6 py-6 text-yellow-300`"></td>
                    <td :class="`px-6 py-6 text-yellow-200`"></td>  
                    <td :class="`px-6 py-6 text-yellow-100`"></td>  
                    <td :class="`px-6 py-6 text-yellow-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 text-red-300`"></td>
                    <td :class="`px-6 py-6 text-red-200`"></td>  
                    <td :class="`px-6 py-6 text-red-100`"></td>  
                    <td :class="`px-6 py-6 text-red-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 text-indigo-300`"></td>
                    <td :class="`px-6 py-6 text-indigo-200`"></td>  
                    <td :class="`px-6 py-6 text-indigo-100`"></td>  
                    <td :class="`px-6 py-6 text-indigo-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 text-green-300`"></td>
                    <td :class="`px-6 py-6 text-green-200`"></td>  
                    <td :class="`px-6 py-6 text-green-100`"></td>  
                    <td :class="`px-6 py-6 text-green-50`"></td>  
                </tr> 
                <tr>
                    <td :class="`px-6 py-6 text-purple-300`"></td>
                    <td :class="`px-6 py-6 text-purple-200`"></td>  
                    <td :class="`px-6 py-6 text-purple-100`"></td>  
                    <td :class="`px-6 py-6 text-purple-50`"></td>  
                </tr> 
            </table>
        </div>

        <h2 class="mb-4 mt-8 ml-12 font-bold text-2xl">Tipus de font</h2>
        <div class="mb-8 mt-4 ml-12">
            <h1 class="font-serif">Títol 1</h1>
            <h2 class="font-mono">Títol 2</h2> 
            <h3 class="font-thin">Títol 3</h3>
            <p>Parágraf</p>            
        </div>

        <div class="mb-8 mt-4 ml-8">
            <Link class="mt-8 p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-800" :href="route('webdesign.edit', 1)"><font-awesome-icon icon="pencil-alt" class="text-white-300" /> Editar disseny</Link>
        </div>
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
            header_text: String,
            header_img: String,
            main_color: String,
            font_family: String,
            webdesign: Object,
        }, 
        
    })
</script>