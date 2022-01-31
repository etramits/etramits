<template>
  <FormError :errors="form.errors" />

  <h1 class="mb-8 font-bold text-3xl text-zinc-700">
    <Link as="span" href="/acp/licencias" class="text-zinc-900 cursor-pointer">Licencias</Link> / Crear
  </h1>

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="store">
      <div class="p-8 -mr-6 -mb-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-full">
          <FormInput
            v-model="form.label"
            :error="form.errors.label"
            type="text"
            label="Nombre"
            autofocus
          />
        </div>

        <div class="pr-6 w-full md:w-1/2">
          <FormInput
            v-model="form.slug"
            :error="form.errors.slug"
            type="text"
            label="Enlace"
          />
        </div>

        <div class="pr-6 w-full md:w-1/2">
          <label class="mb-2 block text-zinc-700 select-none">Visible</label>
          <select v-model="form.visible" class="p-2 leading-normal block w-full border text-zinc-700 rounded text-left appearance-none relative">
            <option :value="true">Si</option>
            <option :value="false">No</option>
          </select>
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end">
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Crear Licencia
        </button>
      </div>
    </form>
  </div>
</template>

<script>
// Core
import { Link } from '@inertiajs/inertia-vue3'

// Shared
import Layout from '../../../Shared/Layouts/Admin'
import FormInput from '../../../Shared/ACP/FormInput'
import FormError from '../../../Shared/ACP/FormError'

export default {
  components: { Link, FormInput, FormError },
  layout: Layout,
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        label: '',
        slug: '',
        visible: false,
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/acp/licencias')
    },
  },
};
</script>