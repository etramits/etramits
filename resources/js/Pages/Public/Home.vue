<template>
<<<<<<< HEAD
    <section :style="`background-color: ${settings.main_color}`">
        <div class="container flex flex-col md:flex-row items-center justify-between mx-auto max-w-7xl px-4 gap-20 text-gray-800">
            <h2 class="text-4xl md:text-8xl font-bold">{{settings.header_text}}</h2>
            <img class="mt-10 h-64 md:h-80 md:w-auto" :src="'images/' + settings.header_img" draggable="false">
        </div>
    </section>
    <!-- Categories -->
     <div class="py-12 md:py-24 bg-gray-50">
      <section class="container mx-auto max-w-7xl text-gray-800">
        <!-- <h3 class="text-3xl md:text-5xl font-semibold">Explorar tràmits</h3> -->

        <h3 class="text-4xl font-semibold">Categories</h3>

        <!-- Procedure -->
        <div class="grid md:grid-cols-5 gap-10 mt-8 md:mt-10">
          <Link as="div" v-for="category in categories" :key="category.id" :href="`/${category.slug}`" class="flex flex-col items-center p-5 w-50 bg-white rounded-xl shadow hover:opacity-60 cursor-pointer">
            <font-awesome-icon v-bind:icon="!category.icon ? 'file-alt' : category.icon" size="5x" :color="changeColor(settings.main_color,-20)" />
            <h4 class="mt-6 max-w-full text-xl md:text-2xl font-medium overflow-hidden whitespace-nowrap	overflow-ellipsis">{{ category.name }}</h4>
          </Link>
        </div>
      </section>
    </div>
=======
  <section :class="`bg-yellow-300`">
      <div class="container flex flex-col md:flex-row items-center justify-between mx-auto max-w-7xl px-4 gap-20 text-gray-800">
          <h2 class="text-4xl md:text-8xl font-bold">Consulta els teus tràmits en dos clics</h2>
          <img class="mt-10 h-64 md:h-80 md:w-auto" src="images/slogan1.svg" draggable="false">
      </div>
  </section>
  
  <div class="py-12 md:py-24 bg-gray-50">
    <section class="container mx-auto max-w-7xl text-gray-800">
        <!-- <h3 class="text-3xl md:text-5xl font-semibold">Explorar tràmits</h3> -->
        <h3 class="text-4xl font-semibold">Categories</h3>

        <!-- Procedure -->
        <div class="grid md:grid-cols-5 gap-10 mt-8 md:mt-10">
          <Link as="div" v-for="category in categories" :key="category.id" :href="`/${category.slug}`" class="flex flex-col items-center p-5 w-50 bg-white rounded-xl shadow hover:opacity-60 cursor-pointer">
            <font-awesome-icon v-bind:icon="!category.icon ? 'file-alt' : category.icon" size="5x" :class="`text-black-300`" />
            <h4 class="mt-6 max-w-full text-xl md:text-2xl font-medium overflow-hidden whitespace-nowrap	overflow-ellipsis">{{ category.name }}</h4>
          </Link>
        </div>
    </section>
  </div>
>>>>>>> 547d7a6d3395a88e729738aa3db192b9a961e2c1

  <!-- Stats -->
  <section class="bg-gray-800 text-white">
    <div class="container flex flex-col items-center mx-auto py-20">
      <div class="grid md:grid-cols-3 gap-10">
        <div v-for="stat in stats" :key="stat.id" class="flex flex-col items-center p-4 bg-gray-700 rounded-md shadow">
          <div class="text-5xl font-semibold">{{ stat.value }}</div>
          <div class="mt-1 text-xl md:text-2xl">{{ stat.label }}</div>
        </div>
      </div>
    </div>
  </section>

  <div class="py-12 md:py-24 bg-gray-50 text-gray-800">
    <section class="container mx-auto max-w-7xl">
      <h3 class="text-4xl font-semibold">Tràmits populars</h3>

      <div class="mt-10 grid grid-cols-3 gap-10">
        <!-- Article -->
        <Link as="article" v-for="article in populars" :key="article.id" :href="`/${article.category_slug}/${article.slug}`" class="bg-white rounded-xl shadow hover:opacity-75 cursor-pointer">
            <div class="p-4">
              <h3 v-text="article.title" class="text-xl font-semibold text-gray-800" />
              <div class="mt-2 flex items-center gap-4">
                <div class="px-2 py-1 text-sm text-gray-500 bg-gray-100 rounded leading-none">
                  <font-awesome-icon icon="book-open" class="mr-1" />
                  <span>{{article.readingTime}} min</span>
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
      </div>
    </section>
  </div>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue3"
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'

  library.add(fas)

    export default {
        components: { Link, FontAwesomeIcon},

        layout: Layout,
    };
</script>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import Layout from "../../Shared/Layouts/Public"

const props = defineProps({
  categories: Object,
  populars: Object,
<<<<<<< HEAD
  settings: Object,
=======
  stats: Object
>>>>>>> 547d7a6d3395a88e729738aa3db192b9a961e2c1
});

function changeColor(color, v) {
    if (color.length >6) { color= color.substring(1,color.length)}
    var rgb = parseInt(color, 16); 
    var r = Math.abs(((rgb >> 16) & 0xFF)+v); if (r>255) r=r-(r-255);
    var g = Math.abs(((rgb >> 8) & 0xFF)+v); if (g>255) g=g-(g-255);
    var b = Math.abs((rgb & 0xFF)+v); if (b>255) b=b-(b-255);
    r = Number(r < 0 || isNaN(r)) ? 0 : ((r > 255) ? 255 : r).toString(16); 
    if (r.length == 1) r = '0' + r;
    g = Number(g < 0 || isNaN(g)) ? 0 : ((g > 255) ? 255 : g).toString(16); 
    if (g.length == 1) g = '0' + g;
    b = Number(b < 0 || isNaN(b)) ? 0 : ((b > 255) ? 255 : b).toString(16); 
    if (b.length == 1) b = '0' + b;
    return "#" + r + g + b;
} 
</script>