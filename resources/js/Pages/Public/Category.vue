<template>
    <section :style="`background-color: ${settings.main_color}`">
      <div class="container flex items-center justify-center mx-auto py-6 gap-20 text-gray-800">
        <div class="flex flex-col">
          <h2 class="text-7xl font-bold">{{ category.name }}</h2>
          <span class="mt-4 max-w-xl text-2xl">
            {{
              !category.description
                ? `En aquest apartat podrás consultar tots el tràmits relacionats amb la categoria ${category.name}`
                : category.description
            }}
          </span>
        </div>

        <img class="h-80" src="/img/salut.svg">
      </div>
    </section>

    <div class="py-20 bg-gray-50">
      <div class="container mx-auto">

        <!-- Subcategories -->


        <h3 v-if="articles.length" class="text-4xl font-semibold">Tràmits</h3>

        <section v-if="articles.length" class="mt-10 grid grid-cols-3 gap-10">
          <!-- Article -->
          <Link as="article" v-for="article in articles" :key="article.id" :href="`/${category.slug}/${article.slug}`" class="bg-white rounded-xl shadow hover:opacity-75 cursor-pointer">
            <div class="p-4">
              <h3 v-text="article.title" class="text-xl font-semibold text-gray-800" />
              <div class="mt-2 flex items-center gap-4">
                <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                  <font-awesome-icon icon="book-open" class="mr-1" />
                  <span>{{article.readingTime}}</span>
                </div>
                <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                  <font-awesome-icon icon="comments" class="mr-1" />
                  <span>{{article.ncomments}}</span>
                </div>
                <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                  <font-awesome-icon icon="bookmark" class="mr-1" />
                  <span>{{article.nfavorites}}</span>
                </div>
              </div>
            </div>
          </Link>
        </section>
      </div>
    </div>
</template>

<script>
  import { defineComponent } from 'vue'
  import { Link } from '@inertiajs/inertia-vue3'
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
  import { library } from '@fortawesome/fontawesome-svg-core'
  import { fas } from '@fortawesome/free-solid-svg-icons'
  library.add(fas)
  export default defineComponent({
    components: {
      Link,
      FontAwesomeIcon,
    },
    props: {
      articles: Object,
      category: Object,
      subcategories: Object,
      articles: Object,
      settings: Object
    },
    layout: Layout
  })
</script>
<script setup>
import Layout from "../../Shared/Layouts/Public";
</script>