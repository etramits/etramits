<template>
     <section class="bg-gray-800 text-gray-200">
        <div class="flex justify-between container mx-auto max-w-7xl py-5">
            <Link href="/" :style="`color: ${settings.main_color}`" class="content-center py-2">
                 <font-awesome-icon icon="check" class="mr-3" /><strong >TicTac</strong>
            </Link>
            <template v-if="$page.props.user">
                <UserMenu />
            </template>
            <template v-else>   
                <div :style="`color: ${settings.main_color}`" class="flex justify-between">
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        
                        <Link href="/acceder" >Iniciar Sessio</Link>
                    
                        <Link class="ml-3" href="/registrarse" >Registrar-se</Link>

                    </div>
                </div>
            </template>
        </div>
    </section>
    
    <slot />

    <section class="bg-white container mx-auto max-w-7xl">
        <div class="container flex flex-row mx-auto py-12 justify-center">
             <img class="w-2/6" src="/images/logo.png" draggable="false">
        </div>   
    </section>

    <section class="bg-gray-800 text-gray-200">
        <div class="flex justify-between container mx-auto max-w-7xl py-2">
            <div v-if="year != 2022" class="inline-block align-middle">
                © 2022 - {{ year }} TicTac ® Tots els drets reservats.
            </div>
            <div v-else class="inline-block align-middle">
                © 2022 TicTac ® Tots els drets reservats.
            </div>
            <div>
                Aplicació Web creada pels alumnes de l'Institut Cendrassos.
            </div>
        </div>
    </section>

</template>

<script>
    import { Link } from "@inertiajs/inertia-vue3"
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'
    import { fab } from '@fortawesome/free-brands-svg-icons'
    import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'

  library.add(fas, fab)

    export default {
        components: { 
            Link, 
            FontAwesomeIcon, 
            Menu,
            MenuButton,
            MenuItem,
            MenuItems
            },

        data() {
            return {
                year: new Date().getFullYear(),
            }
        },

        methods:{
        logout() {
            this.$inertia.post(route('logout'));
        },
    }

    };
</script>


<script setup>
    import UserMenu from "../../Shared/Public/UserMenu"


    const props = defineProps({
    categories: Object,
    populars: Object,
    settings: Object,
    stats: Object
    });

</script>