<template>
  <FormError :errors="form.errors" />

  <h1 class="mb-8 font-bold text-3xl text-zinc-700">
    <Link as="span" href="/acp/usuaris" class="text-zinc-900 cursor-pointer">Usuaris</Link> / Crear
  </h1>

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="store">
      <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-1/2">
          <FormInput
            v-model="form.email"
            :error="form.errors.email"
            type="email"
            label="Correu electrònic"
            autofocus
          />
        </div>

        <div class="pr-6 w-1/2">
          <FormInput
            v-model="form.password"
            :error="form.errors.password"
            type="password"
            label="Contrasenya"
          />
        </div>
        
        <div class="pr-6 w-1/2">
          <FormInput
            v-model="form.username"
            :error="form.errors.username"
            type="text"
            label="Usuari"
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

        <div class="pr-6 w-1/2">
          <FormSelect
            v-model="form.verified"
            :error="form.errors.verified"
            label="Verificat"
          >
            <option :value="true">Si</option>
            <option :value="false">No</option>
          </FormSelect>
        </div>

        <div class="pr-6 w-1/2">
          <FormSelect
            v-model="form.active"
            :error="form.errors.active"
            label="Actiu"
          >
            <option :value="true">Si</option>
            <option :value="false">No</option>
          </FormSelect>
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end">
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Crear Usuari
        </button>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    layout: Layout,
    remember: "form",
  };
</script>

<script setup>
  // Core
  import { useForm, Link } from "@inertiajs/inertia-vue3";
  import { Inertia } from "@inertiajs/inertia";

  // Components
  import Layout from "../../../Shared/Layouts/Admin";
  import FormInput from "../../../Shared/ACP/FormInput";
  import FormSelect from "../../../Shared/ACP/Form/Select";
  import FormError from "../../../Shared/ACP/FormError";

  const props = defineProps({
    roles: Object,
  });

  let form = useForm({
    username: "",
    email: "",
    password: "",
    role_id: 1,
    verified: false,
    active: false,
  });

  const store = () => {
    form.post("/acp/usuaris");
  };
</script>
