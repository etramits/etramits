<template>
    <dashboard-layout title="Dashboard">
        <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Articles</h1>

        <Link :href="route('articles.create')"><button class="ml-8 p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300" >+</button></Link>

        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">Id</th>
                <th class="px-4 py-3">Autor</th>
                <th class="px-4 py-3">Categoria</th>
                <th class="px-4 py-3">Títol</th>
                <th class="px-4 py-3">Slug</th>
                <th class="px-4 py-3"></th>
                <th class="px-4 py-3"></th>
            </tr>
            
            <tr v-for="article in articles" v-bind:key="article.id" class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3">{{ article.id }}</td>
                <td class="px-4 py-3">{{ article.author_id }}</td>
                <td class="px-4 py-3">{{ article.category_id }}</td>
                <td class="px-4 py-3">{{ article.title }}</td>
                <td class="px-4 py-3">{{ article.slug }}</td>
                <td class="px-4 py-3"><Link :href="route('articles.edit', article.id)"><font-awesome-icon icon="pencil-alt" class="text-yellow-300" /></Link></td>
                <td class="px-4 py-3"><button type="button" @click="destroy(article)"><font-awesome-icon icon="trash-alt" class="text-red-500" /></button></td>   
            </tr> 
            <!-- each row -->
        </table>

    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import { Link } from '@inertiajs/inertia-vue3'
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'
    library.add(fas)
    export default defineComponent({
        components: {
            DashboardLayout,
            Link,
            FontAwesomeIcon,
        },
        props: {
            articles: Object,
            modal: false,
        },
        methods: {
             destroy(article) {
                article._method = 'DELETE';
                this.$inertia.post('/dashboard/articles/' + article.id + '/delete', article);
            }
        }
    })
</script>