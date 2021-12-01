<template>
  <div style="height: 93.5vh" class="bg-yellow-300 p-6 flex justify-center items-center">
    <div class="w-full max-w-md">
      <form class="bg-white shadow-md rounded px-8" @submit.prevent="login">
        <div class="px-10 py-12">
          <h1 class="text-center font-bold text-3xl">Benvingut de nou!</h1>
          <div class="mx-auto mt-8 w-24 border-b-2" />
          <div class="mb-8 mt-8">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Email</label>
            <input v-model="form.email" :error="form.errors.email" class="shadow appearance-none border max-w-full rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" autocapitalize="off" />
          </div>
          <div class="mb-8">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contrasenya</label>
            <input v-model="form.password" :error="form.errors.password" class="shadow appearance-none border max-w-full rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" />
          </div>
          <label class="mt-6 select-none flex items-center" for="remember">
            <input id="remember" v-model="form.remember" class="mr-1" type="checkbox" />
            <span class="text-sm">Remember Me</span>
          </label>
          <div class="flex items-center justify-between mt-6 mb-3">
            <loading-button class="bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Accedir
            </loading-button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
              Forgot Password?
            </a>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'
import MainLayout from '@/Shared/Layouts/MainLayout.vue'

export default {
  metaInfo: { title: 'Login' },
  components: {
    LoadingButton,
    TextInput,
  },
  layout: MainLayout,
  data() {
    return {
      form: this.$inertia.form({
        email: '',
        password: 'secret',
        remember: false,
      }),
    }
  },
  methods: {
    login() {
      this.form.post(this.route('login.store'))
    },
  },
}
</script>
