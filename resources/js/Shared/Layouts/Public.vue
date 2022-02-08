<template>
    
     <section class="bg-gray-800 text-gray-200">
        <div class="flex justify-between container mx-auto max-w-7xl py-5">
            <div :style="`color: ${settings.main_color}`">
                 <font-awesome-icon icon="check" class="mr-3" /><strong >TicTac</strong>
            </div>
            <template v-if="$page.props.user">
                <Menu as="div" class="relative inline-block text-left">
                    <div>
                    <MenuButton class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                        {{$page.props.user.username}}
                        <font-awesome-icon icon="chevron-down" class="-mr-1 ml-2 h-5 w-5" aria-hidden="true"/>
                    </MenuButton>
                    </div>

                    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                        <MenuItem v-if="$page.props.user.role_id != 1">
                            <Link href="/acp" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                <font-awesome-icon icon="cog" class="mr-2"/>
                                Panell d'Administració
                            </Link>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <Link href="/acp" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                <font-awesome-icon icon="user" class="mr-2"/>
                                Panell d'Usuari
                            </Link>
                        </MenuItem>
                        <MenuItem v-slot="{ active }">
                            <Link href="/acp" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                                <font-awesome-icon icon="star" class="mr-2"/>
                                Tràmits preferits
                            </Link>
                        </MenuItem>
                        <form method="POST" action="#">
                            <MenuItem v-slot="{ active }">
                                <button type="submit" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block w-full text-left px-4 py-2 text-sm']">
                                    <font-awesome-icon icon="sign-out-alt" class="mr-2"/>
                                    Desconectar-se
                                </button>
                            </MenuItem>
                        </form>
                        </div>
                    </MenuItems>
                    </transition>
                </Menu>
            </template>
            <template v-else>   
                <div class="flex justify-between">
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        
                        <Link href="/acceder" >Iniciar Sessio</Link>
                    
                        <Link class="ml-3" href="/" >Registrar-se</Link>

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
            MenuItems,
            },

        data() {
            return {

                year: new Date().getFullYear(),
            }
        },

    };

</script>


<script setup>

import Layout from "../../Shared/Layouts/Public";


const props = defineProps({
  categories: Object,
  populars: Object,
  settings: Object,
  stats: Object
});
</script>