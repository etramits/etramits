<template>
    <Menu as="div" class="relative inline-block text-left">
        <div>
            <MenuButton class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                {{$page.props.user.name}}
                <font-awesome-icon icon="chevron-down" class="-mr-1 ml-2 h-5 w-5" aria-hidden="true"/>
            </MenuButton>
        </div>

        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <MenuItems class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div class="py-1">
                <MenuItem v-if="$page.props.user.role_id != 1 && $page.url != '/acp'">
                    <Link href="/acp" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        <font-awesome-icon icon="cog" class="mr-2"/>
                        Panell d'Administració
                    </Link>
                </MenuItem>
                <MenuItem v-if="$page.url != '/'" v-slot="{ active }">
                    <Link href="/" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        <font-awesome-icon icon="home" class="mr-2"/>
                        Pàgina inicial
                    </Link>
                </MenuItem>
                <MenuItem v-if="$page.url != '/perfil'" v-slot="{ active }">
                    <Link href="/perfil" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        <font-awesome-icon icon="user" class="mr-2"/>
                        Panell d'Usuari
                    </Link>
                </MenuItem>
                <MenuItem  v-if="$page.url != 'favorites/index'" v-slot="{ active }">
                    <Link href="favorites/index" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        <font-awesome-icon icon="star" class="mr-2"/>
                        Tràmits preferits
                    </Link>
                </MenuItem>
                <MenuItem v-slot="{ active }">
                    <Link  href="/logout" method="post" as="button" type="button" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        <font-awesome-icon icon="sign-out-alt" class="mr-2"/>
                        Desconectar-se
                    </Link>
                </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
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

        methods:{
            logout() {
                this.$inertia.post(route('logout'));
            },
        }

    };
</script>


<script setup>

    const props = defineProps({
    user: Object,
    categories: Object,
    populars: Object,
    settings: Object,
    stats: Object
    });

</script>