<template>
    <dashboard-layout title="Crear article">
        
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form @submit.prevent="store">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                     
                </div>
                    <div class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100">
                    <button :loading="form.processing" type="submit">Crear article</button>
                </div>
            </form>
        </div>
    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import { Link } from '@inertiajs/inertia-vue3'
    export default {
    components: {
        DashboardLayout,
        Link,
    },
    props: {
        articles: Object,
        modal: false,
    },
    remember: 'form',
    data() {
        return {
        form: this.$inertia.form({
            title: '',
            category_id: '',
            author_id: '',
            slug: '',
            content: '',
        }),
        }
    },
    methods: {
        store() {
        this.form.post('/dashboard/articles')
        },
    },
}
</script>