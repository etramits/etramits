<template>
  <FlashData />
  <FormError :errors="form.errors" />
  
  <h1 class="mb-8 text-3xl font-bold text-zinc-700">
    <Link as="span" href="/acp/rols" class="text-zinc-900 cursor-pointer">Rols</Link> / {{ role.label }}
  </h1>

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="update">
      <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-full">
          <FormInput
            v-model="form.label"
            :error="form.errors.label"
            type="text"
            label="Nom"
            maxlength="24"
            required
          />
        </div>

        <div class="pr-6 w-full">
          <FormInput
            v-model="form.acronym"
            :error="form.errors.acronym"
            type="text"
            label="Acrònim"
            maxlength="24"
            required
          />
        </div>

        <div class="pr-6 w-full">
          <FormSelect
            v-model="form.visible"
            :error="form.errors.visible"
            label="Visible"
          >
            <option :value="true">Si</option>
            <option :value="false">No</option>
          </FormSelect>
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
        <div />
        <!-- <button tabindex="-1" type="button" class="text-red-600 hover:underline" @click="destroy">Eliminar Rol</button> -->
        
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Actualitzar Rol
        </button>
      </div>
    </form>
  </div>

  <template v-if="role.users.data.length">
    <h2 class="mt-12 mb-6 text-2xl font-bold text-zinc-700">Usuaris</h2>

    <Table
      :header="getUsersHeaders"
      :rows="getUsersRows"
      :pagination="role.users.links"
    />
  </template>

</template>

<script>
// Core
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm } from "@inertiajs/inertia-vue3";

// Shared
import Layout from "../../../Shared/Layouts/Admin";
import FlashData from "../../../Shared/ACP/FlashData";
import FormError from "../../../Shared/ACP/FormError";
import FormInput from "../../../Shared/ACP/FormInput";
import FormSelect from "../../../Shared/ACP/Form/Select";
import Table from "../../../Shared/ACP/Table/Index.vue";

export default {
  components: {
    Link,
    FlashData,
    FormError,
    FormInput,
    FormSelect,
    Table,
  },

  layout: Layout,
};
</script>

<script setup>
  import { computed } from "vue";
  import { useForm } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";

  const props = defineProps({
    role: Object,
  });

  let form = useForm({
    label: props.role.label,
    acronym: props.role.acronym,
    visible: Boolean(props.role.visible),
  });

  const update = () => {
    form.put(`/acp/roles/${props.role.id}`);
  };

  const destroy = () => {
    if (confirm("¿Estas seguro que quieres eliminar este rol?")) {
      Inertia.delete(`/acp/roles/${props.role.id}`);
    }
  };

  const getUsersHeaders = computed(() => {
    return [
      { label: "Id" },
      { label: "Usuari" },
      { label: "Correu electrònic" },
      { label: "Verificat" },
      { label: "Visible", attrs: { colspan: 2 } },
    ];
  });

  const getUsersRows = computed(() => {
    return props.role.users.data.map(user => {
      return {
        href: `/acp/usuarios/${user.id}/editar`,
        values: [
          user.id,
          user.username,
          user.email,
          user.verified ? "Si" : "No",
          user.active
            ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />'
            : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><line x1="3" y1="3" x2="21" y2="21" /><path d="M10.584 10.587a2 2 0 0 0 2.828 2.83" /><path d="M9.363 5.365a9.466 9.466 0 0 1 2.637 -.365c4 0 7.333 2.333 10 7c-.778 1.361 -1.612 2.524 -2.503 3.488m-2.14 1.861c-1.631 1.1 -3.415 1.651 -5.357 1.651c-4 0 -7.333 -2.333 -10 -7c1.369 -2.395 2.913 -4.175 4.632 -5.341" />',
          '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="block w-6 h-6 fill-gray-400"><polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707" />',
        ]
      };
    });
  });
</script>