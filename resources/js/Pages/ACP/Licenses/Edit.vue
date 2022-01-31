<template>
  <h1 class="mb-8 font-bold text-3xl text-zinc-700"><Link as="span" href="/acp/licencias" class="text-zinc-900 cursor-pointer">Licencias</Link> / {{ license.label }}</h1>

  <!-- <div v-if="license.deleted_at" class="p-4 bg-yellow-300 rounded flex items-center justify-between max-w-3xl mb-6">
    <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="flex-shrink-0 w-4 h-4 fill-yellow-800 mr-2">
        <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"></path>
      </svg>
      
      <div class="text-sm font-medium text-yellow-800">
        Esta licencia ha sido eliminada.
      </div>
    </div>
  
    <button tabindex="-1" type="button" class="text-sm text-yellow-800 hover:underline">Restaurar</button>
  </div> -->

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="update">
      <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
        <div class="pr-6 pb-8 w-full">
          <FormInput
            v-model="form.label"
            :error="form.errors.label"
            type="text"
            label="Nombre"
          />
        </div>

        <div class="pr-6 pb-8 w-full lg:w-1/2">
          <FormInput
            v-model="form.slug"
            :error="form.errors.slug"
            type="text"
            label="Enlace"
          />
        </div>

        <div class="pr-6 pb-8 w-full lg:w-1/2">
          <label class="mb-2 block text-zinc-700 select-none">Visible</label>
          <select v-model="form.visible" class="p-2 leading-normal block w-full border text-zinc-700 rounded text-left appearance-none relative">
            <option :value="true">Si</option>
            <option :value="false">No</option>
          </select>
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
        <button tabindex="-1" type="button" class="text-red-600 hover:underline" @click="destroy">Eliminar Licencia</button>
        
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Actualizar Licencia
        </button>
      </div>
    </form>
  </div>
</template>

<script>
// Core
import { Inertia } from "@inertiajs/inertia"
import { Link, useForm } from "@inertiajs/inertia-vue3"

// Shared
import Layout from "../../../Shared/Layouts/Admin"
import FormInput from "../../../Shared/ACP/FormInput"

export default {
  components: {
    Link,
    FormInput,
  },

  layout: Layout,
};
</script>

<script setup>
  import { useForm } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";

  const props = defineProps({
    license: Object,
  });

  let form = useForm({
    label: props.license.label,
    slug: props.license.slug,
    visible: Boolean(props.license.visible),
  });

  const update = () => {
    Inertia.put(`/acp/licencias/${props.license.id}`, form);
  };

  const destroy = () => {
    if (confirm("¿Estas seguro que quieres eliminar esta licencia?")) {
      Inertia.delete(`/acp/licencias/${this.license.id}`);
    }
  };
</script>