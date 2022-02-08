<template>
    
     <section class="bg-gray-800 text-gray-200">
        <div class="flex justify-between container mx-auto max-w-7xl py-5">
            <div :style="`color: ${settings.main_color}`">
                 <font-awesome-icon icon="check" class="mr-3" /><strong >TicTac</strong>
            </div>
            <template v-if="$page.props.user">
            <button class="flex items-center gap-1 cursor-pointer select-none group" type="button">
                <div class=" whitespace-nowrap">
                    <strong>{{$page.props.user.username}}</strong>
                    <font-awesome-icon icon="chevron-down" class="ml-1 group-hover:text-white"/>
                </div>
            </button>
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

  library.add(fas, fab)

    export default {
        components: { Link, FontAwesomeIcon},

        data() {
            return {

                year: new Date().getFullYear(),
            }
        }
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