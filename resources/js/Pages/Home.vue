<template>
  <app-layout>
  <!-- Slogan -->
  <section class="bg-yellow-300	">
    <div class="container flex flex-col md:flex-row items-center justify-between mx-auto px-4 py-10 text-gray-800">
      <h2 class="text-4xl md:text-8xl font-bold">Consulta tràmits<br>en dos clics</h2>
      <img class="mt-10 w-60 md:h-80 md:w-auto" src="/img/slogan.png">
    </div>
  </section>

  <!-- Explore procedures -->
  <section class="container flex flex-col items-center mx-auto my-12 md:my-24 text-gray-800">
    <h3 class="text-3xl md:text-5xl font-medium">Explorar tràmits</h3>

    <!-- Procedure -->
    <div class="grid md:grid-cols-5 gap-10 mt-8 md:mt-14">
      <div v-for="category in categories" :key="category.id" class="flex flex-col items-center p-6 w-50 bg-gray-100 rounded-md shadow hover:opacity-60 cursor-pointer">
        <span class="mb-6 text-lg text-gray-400">12 tràmits</span>
        <font-awesome-icon v-bind:icon="!category.icon ? 'file-alt' : category.icon" size="5x" class="text-yellow-300" />
        <h4 class="mt-6 max-w-full text-xl md:text-2xl overflow-hidden whitespace-nowrap	overflow-ellipsis">{{ category.name }}</h4>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="bg-gray-800 text-white">
    <div class="container flex flex-col items-center mx-auto py-20">
      <div class="grid md:grid-cols-3 gap-10">
        <div v-for="registry in stats" :key="registry.id" class="flex flex-col items-center p-4 bg-gray-700 rounded-md shadow">
          <div class="text-5xl font-semibold">{{ registry.value }}</div>
          <div class="mt-1 text-xl md:text-2xl">{{ registry.label }}</div>
        </div>
      </div>
    </div>
  </section>
  </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'
    import AppLayout from '@/Layouts/AppLayout.vue'

    library.add(fas)

    export default defineComponent({
        components: {
            Link,
            FontAwesomeIcon,
            AppLayout
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            categories: Object,
        },

        data() {
            return {
                stats: [
                    {
                        id: 0,
                        label: 'Tràmits',
                        value: 320,
                    },
                    {
                        id: 0,
                        label: 'Comentaris',
                        value: 12,
                    },
                    {
                        id: 0,
                        label: 'Usuaris',
                        value: 8,
                    }
                ]
            }
        }
    })
</script>
