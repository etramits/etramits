<template>
  <AppLayout title="Categoria">
    <section :class="`bg-${webdesign.main_color}-300 ${webdesign.font_family}`">
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
        <h3 v-if="subcategories.length" class="text-4xl font-semibold">Subcategories</h3>

        <!-- Subcategories -->
        <section v-if="subcategories.length" class="mt-10 mb-20 grid md:grid-cols-5 gap-10">
          <div v-for="subcategory in subcategories" :key="subcategory.id" class="flex flex-col items-center p-6 w-50 bg-white rounded-xl shadow hover:opacity-75 cursor-pointer">
            <font-awesome-icon :icon="!subcategory.icon ? 'file-alt' : subcategory.icon" size="5x" :class="`text-${webdesign.main_color}-300`" />
            <h4 class="mt-6 max-w-full text-xl md:text-2xl font-medium overflow-hidden whitespace-nowrap	overflow-ellipsis">{{ subcategory.name }}</h4>
          </div>
        </section>

        <h3 v-if="articles.length" class="text-4xl font-semibold">Tràmits</h3>

        <section v-if="articles.length" class="mt-10 grid grid-cols-3 gap-10">
          <!-- Article -->
          <Link as="article" v-for="article in articles" :key="article.id" :href="`/${category.slug}/${article.slug}`" class="bg-white rounded-xl shadow hover:opacity-75 cursor-pointer">
            <div class="p-4">
              <h3 v-text="article.title" class="text-xl font-semibold text-gray-800" />
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

            <img v-if="article.cover" class="w-full rounded-b-xl" :src="`/articles/${article.id}/cover.jpg`">
            <img v-else class="w-full rounded-b-xl" src="/img/default.jpg">
          </Link>
        </section>
      </div>
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
      articles: Object,
      category: Object,
      subcategories: Object,
      articles: Object,
      webdesign: Object,
    },
  })
</script>