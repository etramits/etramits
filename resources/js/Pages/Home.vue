<template>
  <AppLayout title="Home">
    <!-- Slogan -->
    <section :class="`bg-${webdesign.main_color}-300 ${webdesign.font_family}`">
      <div class="container flex flex-col md:flex-row items-center justify-between mx-auto max-w-7xl px-4 gap-20 text-gray-800">
        <h2 class="text-4xl md:text-8xl font-bold">{{webdesign.header_text}}</h2>
        <img class="mt-10 h-64 md:h-80 md:w-auto" :src="'/img/' + header_img" draggable="false">
      </div>
    </section>

    <div class="py-12 md:py-24 bg-gray-50">
      <section class="container mx-auto max-w-7xl text-gray-800">
        <!-- <h3 class="text-3xl md:text-5xl font-semibold">Explorar tràmits</h3> -->

        <h3 class="text-4xl font-semibold">Categories</h3>

        <!-- Procedure -->
        <div class="grid md:grid-cols-5 gap-10 mt-8 md:mt-10">
          <Link as="div" v-for="category in categories" :key="category.id" :href="`/${category.slug}`" class="flex flex-col items-center p-5 w-50 bg-white rounded-xl shadow hover:opacity-60 cursor-pointer">
            <font-awesome-icon v-bind:icon="!category.icon ? 'file-alt' : category.icon" size="5x" :class="`text-${webdesign.main_color}-300`" />
            <h4 class="mt-6 max-w-full text-xl md:text-2xl font-medium overflow-hidden whitespace-nowrap	overflow-ellipsis">{{ category.name }}</h4>
          </Link>
        </div>
      </section>
    </div>

    <!-- Stats -->
    <section class="bg-gray-800 text-white">
      <div class="container flex flex-col items-center mx-auto py-20">
        <div class="grid md:grid-cols-3 gap-10">
          <div v-for="registry in stats" class="flex flex-col items-center p-4 bg-gray-700 rounded-md shadow">
            <div class="text-5xl font-semibold">{{ registry.value }}</div>
            <div class="mt-1 text-xl md:text-2xl">{{ registry.label }}</div>
          </div>
        </div>
      </div>
    </section>

    <div class="py-12 md:py-24 bg-gray-50 text-gray-800">
      <section class="container mx-auto max-w-7xl">
        <h3 class="text-4xl font-semibold">Tràmits populars</h3>

        <div class="mt-10 grid grid-cols-3 gap-10">
          <!-- Article -->
          <article class="bg-white rounded-xl shadow hover:opacity-75 cursor-pointer">
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

          <article class="bg-white rounded-xl shadow hover:opacity-75 cursor-pointer">
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

          <article class="bg-white rounded-xl shadow hover:opacity-75 cursor-pointer">
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

    props: {
      categories: Object,
      webdesign: Object,
      stats: Array
    },

    data() {
      return {
        header_img: this.webdesign.header_img,
      }
    }
  })
</script>
