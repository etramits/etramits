<template>
    <jet-action-section>
        <template #title>
            Esborrar compte
        </template>

        <template #description>
            Suprimeix permanentment el teu compte.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Un cop suprimit el vostre compte, tots els seus recursos i dades se suprimiran permanentment. Abans d'esborrar el vostre compte, baixeu qualsevol dada o informació que vulgueu conservar.
            </div>

            <div class="mt-5">
                <jet-danger-button @click="confirmUserDeletion">
                    Esborrar compte
                </jet-danger-button>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Esborrar compte
                </template>

                <template #content>
                    Esteu segur que voleu suprimir el vostre compte? Un cop suprimit el vostre compte, tots els seus recursos i dades se suprimiran permanentment. Introduïu la vostra contrasenya per confirmar que voleu suprimir permanentment el vostre compte.

                    <div class="mt-4">
                        <jet-input type="password" class="mt-1 block w-3/4" placeholder="Contrasenya"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="deleteUser" />

                        <jet-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancel·lar
                    </jet-secondary-button>

                    <jet-danger-button class="ml-3" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Esborrar compte
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionSection from '@/Jetstream/ActionSection.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            JetActionSection,
            JetDangerButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            deleteUser() {
                this.form.delete(route('current-user.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingUserDeletion = false

                this.form.reset()
            },
        },
    })
</script>
