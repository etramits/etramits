<template>
    <dashboard-layout title="Dashboard">
        
        <div class="ml-4 mr-4">
            <h1 class="mb-8 mt-8 ml-8 font-bold text-3xl ">Afegir Categoria</h1>
            <form @submit.prevent="submit" class="w-3/5 ml-8">
                <div>
                    <jet-label for="name" value="Nom" />
                    <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <jet-label for="description" value="Descripció" />
                    <jet-textarea id="description" type="textarea" class="mt-1 block w-full" v-model="form.description" autocomplete="description" :maxlength="200"/>
                </div>

                <div class="mt-4">
                    <jet-label for="parent" value="Id Categoria Pare" />
                    <jet-input id="parent" type="number" class="mt-1 block w-full" v-model="form.parent"/>
                </div>

                <div class="mt-4">
                    <jet-label for="active" value="Estat" />
                    <select v-model="form.active" name='role' class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option :value="1">Activa</option>
                        <option :value="1">Inactiva</option>
                    </select>
                </div>


                <div class="flex items-center justify-end mt-4">

                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Desar
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
    import JetTextarea from '@/Jetstream/Textarea.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
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
            JetTextarea,
            Link,
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    parent: '',
                    active: '',
                })
            }
        },
        methods: {
            submit() {
                this.form.post(this.route('categories.store'))
            }
        }
    })
</script>
