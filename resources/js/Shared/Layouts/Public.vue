<template>
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

    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'
    import { fab } from '@fortawesome/free-brands-svg-icons'

  library.add(fas, fab)

    export default {
        components: { FontAwesomeIcon},

        data() {
            return {

                year: new Date().getFullYear(),
            }
        }
    };

</script>