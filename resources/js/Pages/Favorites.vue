<template>
    {{ favorites }}
    {{ webdesign }}
    <AppLayout title="Tràmits preferits">
        <section :class="`bg-${webdesign.main_color}-300 ${webdesign.font_family}`">
            <div class="container flex flex-col items-center justify-center mx-auto py-20 text-gray-800">
                <h2 class="text-7xl font-bold">Tràmits preferits</h2>
                <span class="mt-2 text-xl">
                    Els teus tràmits més importants en un sol clic.
                </span>
            </div>
        </section>

        <div class="py-12 md:py-24 bg-gray-50 text-gray-800">
            <section class="container mx-auto max-w-7xl">
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

export default defineComponent({
    components: {
        Link,
        FontAwesomeIcon,
        AppLayout,
        
        },

    props: {
        favorites: Object,
        webdesign: Object,
        },

})
</script>
