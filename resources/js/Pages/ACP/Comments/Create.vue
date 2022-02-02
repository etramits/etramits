<template>
  <FormError :errors="form.errors" />

  <h1 class="mb-8 font-bold text-3xl text-zinc-700">
    <Link as="span" href="/acp/comentaris" class="text-zinc-900 cursor-pointer">Comentaris</Link> / Crear
  </h1>

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="store">
      <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-1/2">
          <FormInput
            v-model="form.content"
            :error="form.errors.content"
            type="text"
            label="Comentari"
            autofocus
          />
        </div>

        <div class="pr-6 w-1/2">
          <FormSelect
            v-model="form.active"
            :error="form.errors.active"
            label="Validació"
          >
            <option
              :value="1"
              v-text="Validat"
            />
            <option
              :value="0"
              v-text="No_validat"
            />
          </FormSelect>
        </div>    
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end">
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Crear Comentari
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
    
  });

  let form = useForm({
    content: "",
    active: "",
  });

  const store = () => {
    form.post("/acp/comentaris");
  };
</script>
