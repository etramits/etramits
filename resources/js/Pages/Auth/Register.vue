<template>
    <div class="flex items-center justify-center p-6 md:py-24 bg-gray-50">
      <div class="w-full max-w-md">      
      <form @submit.prevent="submit" class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="p-10">
          <h1 class="text-3xl font-bold text-zinc-700 text-center">Registrar-se</h1>

          <div class="flex flex-col mt-6 mx-auto gap-y-6">
            
            <div>
              <FormInput
                v-model="form.username"
                :error="form.errors.username"
                type="text"
                label="Nom d'usuari"
                autofocus
              />
            </div>

            <div>
              <FormInput
                v-model="form.email"
                :error="form.errors.email"
                type="text"
                label="Correu electrónico"
                autofocus
              />
            </div>

            <div>
              <FormInput
                v-model="form.password"
                :error="form.errors.password"
                type="password"
                label="Contrasenya"
              />
            </div>

             <div>
              <FormInput
                v-model="form.password_confirmation"
                :error="form.errors.password_confirmation"
                type="password"
                label="Torna a escriure la contrasenya"
              />
            </div>
          
            <!-- <label class="flex items-center mt-6 select-none" for="remember">
              <input id="remember" class="mr-1" type="checkbox" />
              <span class="text-sm">Remember Me</span>
            </label> -->
          </div>
        </div>
        
        <div class="flex px-10 py-4 bg-zinc-100 border-t border-zinc-100">
          <!-- <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Login</loading-button> -->
          <!-- <button class="ml-auto px-6 py-3 text-sm font-bold leading-4 text-white bg-zinc-700 rounded" type="submit">Acceder</button> -->
          <button class="ml-auto px-6 py-3 text-sm font-bold text-white leading-4 rounded shadow bg-zinc-700 whitespace-nowrap hover:bg-zinc-800 focus:outline-none focus:ring focus:ring-zinc-700/20" type="submit">Acceder</button>
          <!-- px-6 py-3 rounded bg-indigo-600 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-orange-400 focus:bg-orange-400; -->
        </div>
      </form>
    </div>
    </div>
</template>

<script>
  import { Inertia } from "@inertiajs/inertia";
  import { Link } from "@inertiajs/inertia-vue3"
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
  import { library } from '@fortawesome/fontawesome-svg-core'
  import { fas } from '@fortawesome/free-solid-svg-icons'
  import FormInput from "../../Shared/ACP/FormInput.vue"

  library.add(fas)

  export default {
      components: { Link, FontAwesomeIcon, FormInput},
      layout: Layout,
  };
</script>

<script setup>

    import Layout from "../../Shared/Layouts/Public";
    import { useForm } from "@inertiajs/inertia-vue3";

    let form = useForm({
        username: "",
        email: "",
        password: "",
        password_confirmation: ""
    });

    let submit = () => {
        form.post("/registrarse");
    };


    const props = defineProps({
    settings: Object,
    });
</script>