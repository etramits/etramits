<template>
    <dashboard-layout title="Dashboard">
        <div class="ml-4 mr-4">
            <h1 class="mb-4 mt-8 ml-8 font-bold text-3xl ">Editar disseny web</h1>
            
            <table class="rounded m-5 mx-auto w-5/6 bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3">Previsualització</th>
                </tr>
                
                <tr >
                    <td :class="`container flex flex-col md:flex-row items-center justify-between mx-auto w-full px-4 gap-20 text-gray-800 bg-${form.main_color}-300 ${form.family_font}`">
                        <div :class="`${form.font_family} text-4xl md:text-8xl font-bold`">{{form.header_text}}</div>
                        <div><img class="mt-10 h-64 md:h-80 md:w-auto" :src="'/img/' + form.header_img" alt=""></div>
                    </td>
                </tr> 
            </table>



            <form @submit.prevent="submit" class="w-3/5 ml-8">

                <div class="mt-4">
                    <jet-label for="header_text" value="Text de la capçalera" />
                    <jet-input id="header_text" type="text" class="mt-1 block w-full" maxlength="30" v-model="form.header_text"/>
                </div>

                <div class="mt-4">
                    <jet-label for="header_img" value="Imatge de la capçalera" />
                    <select v-model="form.header_img" name='header_img' class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                        <option value="slogan1.svg">Persona amb informe</option>
                        <option value="slogan2.svg">Persona amb aplicacions</option>
                        <option value="slogan3.svg">Persona amb carpetes</option>
                        <option value="slogan4.svg">Persona amb ordinador</option>
                        <option value="slogan5.svg">Dues persones en una entrevista</option>
                        <option value="slogan6.svg">Persona enviant un missatge</option>
                        <option value="slogan7.svg">Persona afegint un informe</option>
                        <option value="slogan8.svg">Persona amb un ordinador</option>
                    </select>
                </div>

                <div class="mt-4">
                    <jet-label for="main_color" value="Colors principals" />
                    <select v-model="form.main_color" name='main_color' class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                        <option value="yellow">Groc</option>
                        <option value="red">Rosa</option>
                        <option value="indigo">Blau</option>
                        <option value="green">Verd</option>
                        <option value="purple">Púrpura</option>
                    </select>
                </div>

                <div class="mt-4">
                    <jet-label for="font_family" value="Tipus de fonts" />
                    <select v-model="form.font_family" name='font_family' class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                        <option value="font-sans">Lletra de pal sec</option>
                        <option value="font-serif">Lletra amb sèrifes</option>
                        <option value="font-mono">Lletra monoespaiada</option>
                    </select>
                </div>
                
                <div class="mt-4">
                    <jet-button type="submit" :class="{ 'opacity-25': form.processing }" >
                        Guardar canvis
                    </jet-button>
                </div>

            </form>

            
        </div>
    </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
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
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
        },
        props: {
            webdesign: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    header_text: this.webdesign.header_text,
                    header_img: this.webdesign.header_img,
                    like_button: this.webdesign.like_button,
                    main_color: this.webdesign.main_color,
                    font_family: this.webdesign.font_family,
                    
                }),
            }
        },
        methods: { 
            submit() {
                    this.form.post(this.route('webdesign.update', this.webdesign.id));
                },

        }
    })
</script>