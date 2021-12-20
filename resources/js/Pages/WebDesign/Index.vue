<template>
    <dashboard-layout title="Dashboard">
        
        
        <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Disseny web</h1>

        <div class="mb-8 mt-8 ml-12">
            <h2 class="font-bold text-2xl">Text de la capçalera</h2>
            <p class="mt-4">{{header_text}}</p>
        </div>

        <div class="mb-8 mt-8 ml-12">
            <h2 class="mb-8 font-bold text-2xl">Imatge de la capçalera</h2>
            <img class="h-64" :src="'/img/' + header_img" alt="">
        </div>
        
        <div>
            <h2 class="mb-4 mt-8 ml-12 font-bold text-2xl">Colors principals actuals</h2>

            <table class="mb-8 mt-4 ml-12">
                <tr>
                    <td :class="`px-6 py-6 bg-${main_color}-300`"></td>
                    <td :class="`px-6 py-6 bg-${main_color}-200`"></td>  
                    <td :class="`px-6 py-6 bg-${main_color}-100`"></td>  
                    <td :class="`px-6 py-6 bg-${main_color}-50`"></td>  
                </tr> 
            </table>
        </div>

        <h2 class="mb-4 mt-8 ml-12 font-bold text-2xl">Tipus de font</h2>
        <div class="`mb-8 mt-4 ml-12 ${font_family}`">
            <h1>Títol 1</h1>
            <h2>Títol 2</h2> 
            <h3>Títol 3</h3>
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