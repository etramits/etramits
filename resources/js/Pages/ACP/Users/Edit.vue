<template>
  <FlashData />
  <h1 class="mb-8 font-bold text-3xl text-zinc-700">
    <Link as="span" href="/acp/usuaris" class="text-zinc-900 cursor-pointer">Usuaris</Link> / {{ user.username }}
  </h1>
  
  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="update">
      <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-full">
          <FormInput
            v-model="form.email"
            :error="form.errors.email"
            type="email"
            label="Correu electrònic"
          />
        </div>
        
        <div class="pr-6 w-1/2">
          <FormInput
            v-model="form.name"
            :error="form.errors.name"
            type="text"
            label="Nom"
          />
        </div>

        <div class="pr-6 w-1/2">
          <FormSelect
            v-model="form.role_id"
            :error="form.errors.role_id"
            label="Rol"
          >
            <option
              v-for="role in roles"
              :key="role.id"
              :value="role.id"
              v-text="role.label"
            />
          </FormSelect>
        </div>

        <div v-if="props.user.email_verified_at" class="pr-6">
         <strong>Aquest Usuari està verificat.</strong>
        </div>
        <div v-else class="pr-6">
           <strong class="text-red-600">Aquest Usuari no està verificat.</strong>
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
        <button tabindex="-1" type="button" class="text-red-600 hover:underline" @click="destroy">Eliminar Usuari</button>
        
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Actualitzar Usuari
        </button>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    layout: Layout,
  };
</script>

<script setup>
  // Core
  import { Link, useForm } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";

  // Components
  import Layout from "../../../Shared/Layouts/Admin";
  import FlashData from "../../../Shared/ACP/FlashData";
  import FormInput from "../../../Shared/ACP/FormInput";
  import FormSelect from "../../../Shared/ACP/Form/Select";

  const props = defineProps({
    user: Object,
    roles: Array,
  });

  let form = useForm({
    name: props.user.name,
    email: props.user.email,
    role_id: props.user.role_id,
    email_verified_at: props.user.email_verified_at,
  });

  const update = () => {
    form.put(`/acp/usuaris/${props.user.id}`, {
      preserveScroll: true,
    });
  };

  const destroy = () => {
    if (confirm("Estàs segur que vols eliminar aquest usuari?")) {
      Inertia.delete(`/acp/usuaris/${props.user.id}`);
    }
  };

</script>