<template>
  <div class="flex items-center justify-center p-6 min-h-screen bg-zinc-900">
    <div class="w-full max-w-md">
      <img class="mx-auto w-full max-w-xs" src="/images/logo-white.png" draggable="false">
      
      <form @submit.prevent="submit" class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="p-10">
          <h1 class="text-3xl font-bold text-zinc-700 text-center">Iniciar sesion</h1>

          <div class="flex flex-col mt-6 mx-auto gap-y-6">
            <div>
              <FormInput
                v-model="form.email"
                :error="form.errors.email"
                type="text"
                label="Correo electrónico"
                autofocus
              />
            </div>

            <div>
              <FormInput
                v-model="form.password"
                :error="form.errors.password"
                type="password"
                label="Contraseña"
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
import FormInput from "../../Shared/ACP/FormInput.vue";

export default {
  components: {
    FormInput
  },
};
</script>

<script setup>
  import { useForm } from "@inertiajs/inertia-vue3";

  let form = useForm({
    email: "",
    password: "",
  });

  let submit = () => {
    form.post("/acceder");
  }
</script>