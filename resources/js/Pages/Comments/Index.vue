<template>
    <dashboard-layout title="Dashboard">
        <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Validació Comentaris</h1>

        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Usuari ID</th>
                <th class="px-4 py-3">Article ID</th>
                <th class="px-4 py-3">Contingut</th>
                <th class="px-4 py-3">Data</th>
                <th class="px-4 py-3">Validar</th>
            </tr>
            
            <tr v-for="comment in comments" v-bind:key="comment.id" class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3">{{ comment.id }}</td>
                <td class="px-4 py-3">{{ comment.user_id }}</td>
                <td class="px-4 py-3">{{ comment.article_id}}</td>
                <td class="px-4 py-3">{{ comment.content}}</td>
                <td class="px-4 py-3">{{ comment.created_at}}</td>
                <td class="px-4 py-3"><Link :href="route('comment.update', comment.id)"><jet-button><font-awesome-icon icon="check-circle" class="blue" size="lg" /></jet-button></Link></td>
                <td class="px-4 py-3"><button type="button" @click="destroy(comment)"><font-awesome-icon icon="trash-alt" class="text-red-500" /></button></td>
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
    import JetButton from '@/Jetstream/Button.vue'

    library.add(fas)

    export default defineComponent({
        components: {
            DashboardLayout,
            Link,
            FontAwesomeIcon,
            JetButton,
        },
        props: {
            comments: Object,
        },
        methods: {
            destroy(comment) {
                comment._method = 'DELETE';
                this.$inertia.post('/dashboard/comments/' + comment.id + '/delete', comment);
            }
        }
    })
</script>
