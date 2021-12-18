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
                <jet-label for="category_id" value="Estat de l'article" />
                <select v-model="form.role" name='role' class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option :selected="form.active == 0" :value="0">Publicat</option>
                        <option :selected="form.active == 1" :value="1">Borrador</option>
                    </select>
                </div>

                <div class="mt-4">
                    <jet-label for="content" value="Contingut" />
                    
                    <editor v-model="form.content" api-key="no-api-key"
                        :init="{
                            height: 500,
                            menubar: true,
                            plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help wordcount',
                            ],
                            toolbar:
                            'undo redo | formatselect | bold italic backcolor | \
                            alignleft aligncenter alignright alignjustify | \
                            bullist numlist outdent indent | removeformat | help'
                        }" 
                    />

                    
                    <jet-input id="content" type="hidden" class="mt-1 block w-full" v-model="form.content" required />
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
    import Editor from '@tinymce/tinymce-vue'

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
            Editor,
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
                    content: this.article.content,
                }),
            }
        },
        methods: {
            active(roleInt) {
                switch(roleInt) {
                case 0:
                    return "Publicat";
                    break;
                case 1:
                    return "Borrador";
                    break;
                default:
                    return "Publicat";
                }
            },
            submit() {
                this.form.post(this.route('articles.update',this.article.id));
            },
        }
    })
</script>
