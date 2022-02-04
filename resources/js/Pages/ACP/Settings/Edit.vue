<template>
  <FlashData />
  <FormError :errors="form.errors" />
  
  <h1 class="mb-8 text-3xl font-bold text-zinc-700">
    <Link as="span" href="/acp/configuracio/1/editar" class="text-zinc-900 cursor-pointer">Configuració</Link>
  </h1>

  <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
    <form @submit.prevent="update">
      <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
        <div class="pr-6 w-full">
          <FormInput
            v-model="form.header_text"
            :error="form.errors.header_text"
            type="text"
            label="Capçalera de la pàgina inicial"
            maxlength="150"
            required
          />
        </div>

        <div class="pr-6 w-full">
          <FormInput
            v-model="form.header_img"
            :error="form.errors.header_text"
            type="text"
            label="Imatge de la pàgina inicial"
            maxlength="100"
            required
          />
        </div>

        <div class="d-flex pr-6 w-full">
          <FormColor
            v-model="form.main_color"
            :error="form.errors.main_color"
            type="color"
            label="Color de la pàgina web"
            maxlength="7"
            required
          />
        </div>

        <div class="pr-6 w-full">
          <FormInput
            v-model="form.footer"
            :error="form.errors.footer"
            type="text"
            label="Peu de pàgina"
            maxlength="100"
            required
          />
        </div>
      </div>

      <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
        <div />
        
        <button class="flex items-center px-6 py-3 rounded bg-zinc-700 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-zinc-800 focus:bg-zinc-900" type="submit">
          Actualitzar Configuració
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
  import { Inertia } from "@inertiajs/inertia";
  import { Link, useForm } from "@inertiajs/inertia-vue3";

  // Shared
  import Layout from "../../../Shared/Layouts/Admin";
  import FlashData from "../../../Shared/ACP/FlashData";
  import FormError from "../../../Shared/ACP/FormError";
  import FormInput from "../../../Shared/ACP/FormInput";
  import FormColor from "../../../Shared/ACP/Form/FormColor";
  import FormSelect from "../../../Shared/ACP/Form/Select";
  import Display from "./Display";


  const props = defineProps({
    setting: Object,
  });

  let form = useForm({
    header_text: props.setting.header_text,
    header_img: props.setting.header_img,
    main_color: props.setting.main_color,
    footer: props.setting.footer,


  });

  const update = () => {
    form.put("/acp/configuracio/1");
  };
</script>