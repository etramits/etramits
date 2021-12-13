<template>
  <AppLayout title="Categoria">
    <!-- Slogan -->
    <!-- <section class="bg-yellow-300	font-sans">
      <div class="container flex flex-col md:flex-row items-center justify-between mx-auto px-4 py-10 text-gray-800">
        <h2 class="text-4xl md:text-8xl font-bold">Consulta tràmits<br>en dos clics</h2>
        <img class="mt-10 w-60 md:h-80 md:w-auto" src="/img/slogan.png">
      </div>
    </section> -->

      <!-- <h3 class="text-3xl md:text-5xl font-semibold">Explorar tràmits</h3> -->


    <div class="bg-gray-100">
      <section class="container grid grid-cols-3 gap-10 mx-auto py-20">
        <!-- Article -->
        <article class="bg-white rounded-xl hover:opacity-75 cursor-pointer">
          <div class="p-4">
            <h3 class="text-xl font-semibold text-gray-800">Sol·licitar el certificat COVID-19</h3>
            <div class="mt-2 flex items-center gap-4">
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="book-open" class="mr-1" />
                <span>3 min</span>
              </div>
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="comments" class="mr-1" />
                <span>10</span>
              </div>
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="bookmark" class="mr-1" />
                <span>2</span>
              </div>
            </div>
          </div>
          <img class="w-full rounded-b-xl" src="/img/article.jpg">
        </article>

        <article class="bg-white rounded-xl hover:opacity-75 cursor-pointer">
          <div class="p-4">
            <h3 class="text-xl font-semibold text-gray-800">Sol·licitar el certificat COVID-19</h3>
            <div class="mt-2 flex items-center gap-4">
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="book-open" class="mr-1" />
                <span>3 min</span>
              </div>
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="comments" class="mr-1" />
                <span>10</span>
              </div>
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="bookmark" class="mr-1" />
                <span>2</span>
              </div>
            </div>
          </div>
          <img class="w-full rounded-b-xl" src="/img/article.jpg">
        </article>

        <article class="bg-white rounded-xl hover:opacity-75 cursor-pointer">
          <div class="p-4">
            <h3 class="text-xl font-semibold text-gray-800">Sol·licitar el certificat COVID-19</h3>
            <div class="mt-2 flex items-center gap-4">
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="book-open" class="mr-1" />
                <span>3 min</span>
              </div>
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="comments" class="mr-1" />
                <span>10</span>
              </div>
              <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                <font-awesome-icon icon="bookmark" class="mr-1" />
                <span>2</span>
              </div>
            </div>
          </div>
          <img class="w-full rounded-b-xl" src="/img/article.jpg">
        </article>






        <!-- Procedure -->
        <div class="grid md:grid-cols-5 gap-10 mt-8 md:mt-14">
          <div v-for="category in categories" :key="category.id" class="flex flex-col items-center p-6 w-50 bg-gray-100 rounded-md shadow hover:opacity-60 cursor-pointer">
            <span class="mb-6 text-lg text-gray-400">12 tràmits</span>
            <font-awesome-icon v-bind:icon="!category.icon ? 'file-alt' : category.icon" size="5x" class="text-yellow-300" />
            <h4 class="mt-6 max-w-full text-xl md:text-2xl overflow-hidden whitespace-nowrap	overflow-ellipsis">{{ category.name }}</h4>
          </div>
        </div>
      </section>
    </div>
  </AppLayout>
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
  })
</script>
