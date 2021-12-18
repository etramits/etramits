<template>
    <dashboard-layout title="Dashboard">
        
        <div class="ml-4 mr-4">
            <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Editar article</h1>
            <form @submit.prevent="submit" class="w-3/5 ml-8">
                <div>
                    <jet-label for="title" value="Títol" />
                    <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus autocomplete="titol" />
                </div>

                <div class="mt-4">
                    <jet-label for="slug" value="Slug" />
                    <jet-input id="slug" type="text" class="mt-1 block w-full" v-model="form.slug" required />
                </div>
                
                <div class="mt-4">
                    <jet-label for="category_id" value="Categoría" />
                    <jet-input id="category_id" type="text" class="mt-1 block w-full" v-model="form.category_id" required />
                </div>

                <div class="mt-4">
                    <jet-label for="author_id" value="Autor" />
                    <jet-input id="author_id" type="text" class="mt-1 block w-full" v-model="form.author_id" required />
                </div>

                <div class="mt-4">
                    <jet-label for="content" value="Contingut" />
                    <jet-input id="content" type="text" class="mt-1 block w-full" v-model="form.content" required />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <jet-button type="submit" class="ml-4" :class="{ 'opacity-25': form.processing }" >
                        Guardar canvis
                    </jet-button>
                </div>
            </form>
        </div>

    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'

    export default defineComponent({
        components: {
            DashboardLayout,
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
        },
        props: {
            article: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    title: this.article.title,
                    slug: this.article.slug,
                    category_id: this.article.category_id,
                    author_id: this.article.author_id,
                    content: this.article.content,
                }),
            }
        },
        methods: {
            submit() {
                this.form.post(this.route('articles.update',this.article.id));
            },
        }
    })
</script>
