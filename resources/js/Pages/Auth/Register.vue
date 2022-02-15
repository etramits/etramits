<template>
    <Head title="Registrar-se" />
    <div class="flex items-center justify-center p-6 md:py-24 bg-gray-50">
        <div class="w-full max-w-md">
            <form @submit.prevent="submit" class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
                    <div class="p-10">
                        <h1 class="text-3xl font-bold text-zinc-700 text-center">Registrar-se</h1>
                        <jet-validation-errors class="pt-4" />
                        <div class="flex flex-col mt-6 mx-auto gap-y-6">
                
                        <div>
                            <FormInput
                                v-model="form.name"
                                type="text"
                                label="Nom d'usuari"
                                required 
                                autofocus 
                            />
                        </div>

                        <div class="mt-4">
                            <FormInput
                                v-model="form.email"
                                type="email"
                                label="Correu electrònic"
                                required
                                autofocus
                            />
                        </div>

                        <div>
                        <FormInput
                            v-model="form.password"
                            type="password"
                            label="Contrasenya"
                        />
                        </div>

                        <div>
                        <FormInput
                            v-model="form.password_confirmation"
                            type="password"
                            label="Torna a escriure la contrasenya"
                        />
                        </div>
                
                    </div>

                    <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                        <jet-label for="terms">
                            <div class="flex items-center">
                                <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

                                <div class="ml-2">
                                    I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                                </div>
                            </div>
                        </jet-label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Ja estàs registrat?
                        </Link>

                        <button class="ml-auto px-6 py-3 text-sm font-bold text-white leading-4 rounded shadow bg-zinc-700 whitespace-nowrap hover:bg-zinc-800 focus:outline-none focus:ring focus:ring-zinc-700/20" type="submit">Acceder</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import { Inertia } from "@inertiajs/inertia";
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { library } from '@fortawesome/fontawesome-svg-core'
    import { fas } from '@fortawesome/free-solid-svg-icons'
    import FormInput from "../../Shared/ACP/FormInput.vue"

    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

      library.add(fas)

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link, 
            FontAwesomeIcon, 
            FormInput
        },

        layout: Layout,

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    })
</script>


<script setup>

    import Layout from "../../Shared/Layouts/Public";
</script>