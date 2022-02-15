<template>
    <Head title="Iniciar sessió" />

    <div class="flex items-center justify-center p-6 md:py-24 bg-gray-50">
        <div class="w-full max-w-md">      
            <form @submit.prevent="submit" class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
                <div class="p-10">
                    <h1 class="text-3xl font-bold text-zinc-700 text-center">Iniciar sessió</h1>
                    <div class="mt-4">
                        <FormInput
                            v-model="form.email"
                            :error="form.errors.email"
                            type="email"
                            label="Correu electrònic"
                            required
                            autofocus
                        />
                    </div>

                    <div class="mt-4">
                        <FormInput
                            v-model="form.password"
                            :error="form.errors.password"
                            type="password"
                            label="Contrasenya"
                            required autocomplete="current-password"
                        />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <jet-checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ml-2 text-sm text-gray-600">Recordar</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Has oblidat la teva contrasenya?
                        </Link>
                    <button class="ml-auto px-6 py-3 text-sm font-bold text-white leading-4 rounded shadow bg-zinc-700 whitespace-nowrap hover:bg-zinc-800 focus:outline-none focus:ring focus:ring-zinc-700/20" type="submit">Acceder</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
  import { Inertia } from "@inertiajs/inertia"
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
  import { library } from '@fortawesome/fontawesome-svg-core'
  import { fas } from '@fortawesome/free-solid-svg-icons'
  import FormInput from "../../Shared/ACP/FormInput.vue"

  import { defineComponent } from 'vue'
  import JetCheckbox from '@/Jetstream/Checkbox.vue'
  import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
  import { Head, Link } from '@inertiajs/inertia-vue3'
  
  library.add(fas)

  export default {
    components: { 
        Head,
        JetCheckbox,
        JetValidationErrors,
        Link,
        FontAwesomeIcon, 
        FormInput
    },
    layout: Layout,
    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ... data,
                    remember: this.form.remember ? 'on' : ''
                }))
                .post(this.route('login'), {
                    onFinish: () => this.form.reset('password'),
                })
        }
    },
  };
  
</script>

<script setup>

    import Layout from "../../Shared/Layouts/Public";
    import { useForm } from "@inertiajs/inertia-vue3";

</script>