<template>
    <Head title="Forgot Password" />
    <div class="flex items-center justify-center p-6 md:py-24 bg-gray-50">

        <div class="w-full max-w-md">
        

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="p-10">
                <h1 class="text-3xl font-bold text-zinc-700 text-center">Recupera la teva contrasenya</h1>
                    <div class="pt-10">
                        Has oblidat la teva contrasenya? Cap problema. Només heu de fer-nos saber la vostra adreça de correu electrònic i us enviarem per correu electrònic un enllaç de restabliment de la contrasenya que us permetrà triar-ne una de nova.                    
                    </div>
                <div>
                    <jet-validation-errors class="mb-4" />
                    <div class="mt-4">
                        <FormInput
                                v-model="form.email"
                                type="email"
                                label="Correu electrònic"
                                required
                                autofocus
                            />
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button class="ml-auto px-6 py-3 text-sm font-bold text-white leading-4 rounded shadow bg-zinc-700 whitespace-nowrap hover:bg-zinc-800 focus:outline-none focus:ring focus:ring-zinc-700/20" type="submit">
                        Envía
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3';
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import FormInput from "../../Shared/ACP/FormInput.vue"

    export default defineComponent({
        components: {
            Head,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            FormInput
        },

        layout: Layout,

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    })
</script>

<script setup>

    import Layout from "../../Shared/Layouts/Public";
    import { useForm } from "@inertiajs/inertia-vue3";

</script>