<template>
  <div class="md:h-screen md:flex md:flex-col">
    <header class="md:flex md:flex-shrink-0">
      <div class="flex md:flex-shrink-0 items-center justify-between md:justify-center px-6 py-4 md:w-56 bg-zinc-900">
        <img class="w-1/2 md:w-full" src="/images/logo-white.png" draggable="false">
        <button type="button" class="md:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-white w-6 h-6">
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
          </svg>
        </button>
      </div>
      <div class="flex justify-between items-center    w-full p-4 md:py-0 md:px-12  bg-white border-b">
        <div class="bg-zinc-800 font-semibold text-white px-2 py-1 rounded-md leading-none" v-text="version" />
        <template v-if="$page.props.user">
          <UserMenu />
      </template>
      </div>
    </header>

    <div class="md:flex md:flex-grow md:overflow-hidden">
      <div class="hidden md:flex md:flex-col bg-zinc-800 text-white flex-shrink-0 w-56 p-10 md:gap-10 overflow-y-auto">  
        <Link href="/acp" class="flex items-center gap-2 group" :class="$page.component === 'ACP/Index' ? 'text-white' : 'text-zinc-300'">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="13" r="2"></circle>
            <line x1="13.45" y1="11.55" x2="15.5" y2="9.5"/>
            <path d="M6.4 20a9 9 0 1 1 11.2 0z"/>
          </svg>

          Inici
        </Link>

        <div class="md:flex md:flex-col md:gap-4">
          <div class="text-zinc-500 text-sm font-semibold uppercase mb-2 leading-none">Web</div>

          <Link href="/acp/tramits" class="flex items-center gap-2 group" :class="$page.component === 'ACP/Apps' ? 'text-white' : 'text-zinc-300'">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
              <line x1="8" y1="8" x2="12" y2="8"/>
              <line x1="8" y1="12" x2="12" y2="12"/>
              <line x1="8" y1="16" x2="12" y2="16"/>
            </svg>

            Tràmits
          </Link>

          <Link href="/acp/categories" class="flex items-center gap-2 group" :class="$page.component === 'ACP/Platforms' ? 'text-white' : 'text-zinc-300'">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tags" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z"/>
              <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"/>
              <path d="M6 9h-.01"/>
            </svg>

            Categories
          </Link>

          <Link v-if="$page.props.user.role_id != 2" href="/acp/comentaris" class="flex items-center gap-2 group" :class="$page.component === 'ACP/Licenses/Index' ? 'text-white' : 'text-zinc-300'">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"/>
              <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"/>
            </svg>

            Comentaris
          </Link>
        </div>

        <div v-if="$page.props.user.role_id != 2" class="md:flex md:flex-col md:gap-4">
          <div class="text-zinc-500 text-sm font-semibold uppercase mb-2 leading-none">Administració</div>

          <Link v-if="$page.props.user.role_id != 2" href="/acp/usuaris" class="flex items-center gap-2 group" :class="$page.component === 'ACP/Users/Index' ? 'text-white' : 'text-zinc-300'">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
            </svg>

            Usuaris
          </Link>

          <Link v-if="$page.props.user.role_id == 4" href="/acp/rols" class="flex items-center gap-2 group" :class="$page.component === 'ACP/Roles/Index' ? 'text-white' : 'text-zinc-300'">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
            </svg>

            Rols
          </Link>

          <Link v-if="$page.props.user.role_id == 4" href="/acp/configuracio/" class="flex items-center gap-2 group" :class="$page.component === 'ACP/Settings/1/Edit' ? 'text-white' : 'text-zinc-300'">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
              <circle cx="12" cy="12" r="3" />
            </svg>

            Configuració
          </Link>
        </div>
      </div>
      
      <div scroll-region="" class="md:flex-1 px-4 py-8 md:p-12 bg-zinc-100 md:overflow-y-auto">
        <slot />
      </div>
    </div>
  </div>
</template>

  <script>
    import { Link } from "@inertiajs/inertia-vue3"
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'
    import { fab } from '@fortawesome/free-brands-svg-icons'
    import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
    import UserMenu from "../Public/UserMenu"

    library.add(fas, fab)



export default {
  components: { 
    Link, 
    FontAwesomeIcon, 
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    UserMenu
  },
  data() {
    return {
      version: "Panell d'administració",
    }
  }
};
</script>