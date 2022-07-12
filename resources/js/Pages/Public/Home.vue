<template>
  <!-- Slogan -->
  <section
    class="px-8 lg:px-0 text-white"
    :style="`background-color: ${settings.main_color}`"
  >
    <div class="lg:mx-auto lg:container flex flex-row justify-center items-end md:items-center gap-6 md:gap-12 lg:gap-24">
      <h2
        class="py-8 text-4xl md:text-6xl lg:text-7xl font-bold leading-none"
        v-html="settings.header_text"
      />

      <img
        class="md:mt-8 w-1/3 md:w-1/4 lg:w-1/6"
        :src="`images/${settings.header_img}`"
        draggable="false"
      />
    </div>
  </section>

  <!-- Categories -->
  <section class="px-8 lg:px-0 py-10 lg:py-14 text-slate-800 bg-gray-200">
    <div class="lg:mx-auto lg:container flex flex-col gap-8">
      <h3 class="mx-auto lg:mx-0 text-4xl lg:text-4xl font-semibold lg:leading-none">
        Categories
      </h3>

      <div class="grid grid-cols-2 lg:grid-cols-6 gap-8">
        <Link
          v-for="category in categories"
          :key="category.id"
          class="flex flex-col items-center p-4 gap-4 bg-white rounded-xl shadow hover:opacity-75 cursor-pointer"
          :href="`/${category.slug}`"
          as="div"
        >
          <font-awesome-icon
            class="text-5xl lg:text-6xl"
            v-bind:icon="!category.icon ? 'file-alt' : category.icon"
            :color="settings.main_color"
          />

          <h4
            class="max-w-full text-lg lg:text-xl font-medium overflow-hidden whitespace-nowrap overflow-ellipsis"
            v-text="category.name"
          />
        </Link>
      </div>
    </div>
  </section>

  <!-- Stats -->
  <section class="px-8 py-10 bg-slate-800 text-white">
    <div class="lg:mx-auto lg:container flex flex-col gap-8">
      <h3 class="mx-auto lg:mx-0 text-3xl font-semibold leading-none">
        Estadístiques
      </h3>

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        <div
          v-for="v in stats"
          :key="v.id"
          class="flex flex-col items-center p-3 bg-slate-700 rounded-md shadow"
        >
          <div
            class="text-3xl lg:text-4xl font-semibold"
            v-text="v.value"
          />

          <div
            class="mt-1 max-w-full text-lg lg:text-xl overflow-hidden whitespace-nowrap overflow-ellipsis"
            v-text="v.label"
          />
        </div>
      </div>
    </div>
  </section>

  <!-- Popular -->
  <section class="px-8 py-10 bg-gray-200 text-gray-800">
    <div class="lg:mx-auto lg:container flex flex-col gap-8">
      <h3 class="text-3xl font-semibold leading-none">
        Tràmits populars
      </h3>

      <div class="grid grid-cols-1 lg:grid-cols-3">
        <!-- Article -->
        <Link
          v-for="a in populars"
          :key="a.id"
          :href="`/${a.category_slug}/${a.slug}`"
          class="p-4 flex flex-col gap-2 bg-white rounded-xl shadow hover:opacity-75 cursor-pointer"
          as="article"
        >
          <h3
            class="text-lg font-semibold text-gray-800"
            v-text="a.title"
          />

          <div class="flex items-center gap-4 leading-none">
            <!-- Reading time -->
            <div class="px-1 flex items-center gap-1 text-sm text-gray-500 bg-gray-200 rounded">
              <font-awesome-icon icon="book-open" />
              <span v-text="`${a.reading} min`" />
            </div>

            <!-- Comments -->
            <div class="px-1 flex items-center gap-1 text-sm text-gray-500 bg-gray-200 rounded">
              <font-awesome-icon icon="comments" />
              <span v-text="a.comments" />
            </div>

            <!-- Bookmarks -->
            <div class="px-1 flex items-center gap-1 text-sm text-gray-500 bg-gray-200 rounded">
              <font-awesome-icon icon="bookmark" />
              <span v-text="a.favorites" />
            </div>
          </div>

          <img
            class="w-full mt-2 rounded-xl"
            src="/images/default.jpg"
          >
        </Link>
      </div>
    </div>
  </section>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";

import Layout from "../../Shared/Layouts/Public";

const props = defineProps({
  settings: Object,
  categories: Object,
  populars: Object,
  stats: Object
});

library.add(fas);
</script>

<script>
export default { layout: Layout };
</script>
