<template>
  <FlashData />
  <FormError :errors="form.errors" />
  
  <h1 class="mb-8 text-3xl font-bold text-zinc-700">
    <Link as="span" href="/acp/configuracio/1/editar" class="text-zinc-900 cursor-pointer">Configuració</Link>
  </h1>
  
  <div class="grid grid-cols-2 gap-12 content-center justify-center">
    <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
      <form @submit.prevent="update">
        <div class="p-8 -mr-6 flex flex-wrap gap-y-6">
          
          <h2 class="-mr-6 text-2xl font-bold text-zinc-900">
            Global
          </h2>

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

          <h2 class="-mr-6 text-2xl font-bold text-zinc-900">
            Capçalera
          </h2>

          <div class="pr-6 w-full">
            <FormInput
              v-model="form.header_text"
              :error="form.errors.header_text"
              type="text"
              label="Capçalera de la pàgina inicial"
              maxlength="40"
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

          <h2 class="-mr-6 text-2xl font-bold text-zinc-900">
            Peu de pàgina
          </h2>

          <div class="pr-6 w-full">
            <FormInput
              v-model="form.logo_consellcomarcal"
              :error="form.errors.logo_consellcomarcal"
              type="text"
              label="Logo del Consell Comarcal"
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
    <div class="bg-white rounded-md shadow overflow-hidden max-w-3xl">
      <div class="p-8 gap-y-6">
        
        <h2 class=" mb-2 text-2xl font-bold text-zinc-900">
          Previsualització
        </h2>
        
        <div class="grid grid-cols-2 text-sm py-2 bg-gray-800 px-6 rounded-t-xl" :style="`color: ${form.main_color}`">
          <div>TicTac</div>
          <div class="grid justify-items-end">Iniciar sessió | Registrar-se</div>
        </div>
        <div class="grid grid-cols-3 content-center justify-items-center drop-shadow-md rounded-b-lg" :style="`background-color: ${form.main_color}`"> 
          <div class="grid col-span-2 content-center px-10 text-gray-800">
            <h2 class="text-3xl font-bold">{{form.header_text}}</h2>
          </div>
          <div class="justify-items-end">
            <img class="mt-2 h-48" :src="'../../../images/' + form.header_img" draggable="false">
          </div>
        </div>

        <div class="grid md:grid-cols-3 gap-10 mt-4">
          <div class="flex flex-col items-center p-5 w-50 bg-white rounded-xl shadow hover:opacity-60 cursor-pointer">
              <svg class="svg-inline--fa fa-stethoscope fa-5x" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="stethoscope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" :color="form.main_color">
                <path class="" fill="currentColor" d="M447.1 112c-34.2.5-62.3 28.4-63 62.6-.5 24.3 12.5 45.6 32 56.8V344c0 57.3-50.2 104-112 104-60 0-109.2-44.1-111.9-99.2C265 333.8 320 269.2 320 192V36.6c0-11.4-8.1-21.3-19.3-23.5L237.8.5c-13-2.6-25.6 5.8-28.2 18.8L206.4 35c-2.6 13 5.8 25.6 18.8 28.2l30.7 6.1v121.4c0 52.9-42.2 96.7-95.1 97.2-53.4.5-96.9-42.7-96.9-96V69.4l30.7-6.1c13-2.6 21.4-15.2 18.8-28.2l-3.1-15.7C107.7 6.4 95.1-2 82.1.6L19.3 13C8.1 15.3 0 25.1 0 36.6V192c0 77.3 55.1 142 128.1 156.8C130.7 439.2 208.6 512 304 512c97 0 176-75.4 176-168V231.4c19.1-11.1 32-31.7 32-55.4 0-35.7-29.2-64.5-64.9-64zm.9 80c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16-7.2 16-16 16z"></path>
              </svg>
              <h4 class="mt-6 max-w-full text-xl md:text-2xl font-medium overflow-hidden whitespace-nowrap overflow-ellipsis">Salud</h4>
          </div>
          <div class="flex flex-col items-center p-5 w-50 bg-white rounded-xl shadow hover:opacity-60 cursor-pointer">
              <svg class="svg-inline--fa fa-briefcase fa-5x" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" :color="form.main_color">
                <path class="" fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
              </svg>
              <h4 class="mt-6 max-w-full text-xl md:text-2xl font-medium overflow-hidden whitespace-nowrap overflow-ellipsis">Ocupacio</h4>
          </div>
          <div class="flex flex-col items-center p-5 w-50 bg-white rounded-xl shadow hover:opacity-60 cursor-pointer">
              <svg class="svg-inline--fa fa-receipt fa-5x" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="receipt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" :color="form.main_color">
                <path class="" fill="currentColor" d="M358.4 3.2L320 48 265.6 3.2a15.9 15.9 0 0 0-19.2 0L192 48 137.6 3.2a15.9 15.9 0 0 0-19.2 0L64 48 25.6 3.2C15-4.7 0 2.8 0 16v480c0 13.2 15 20.7 25.6 12.8L64 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L192 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L320 464l38.4 44.8c10.5 7.9 25.6.4 25.6-12.8V16c0-13.2-15-20.7-25.6-12.8zM320 360c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16z"></path>
              </svg>
              <h4 class="mt-6 max-w-full text-xl md:text-2xl font-medium overflow-hidden whitespace-nowrap overflow-ellipsis">Cites Prèvies</h4>
          </div>
        </div>

        <div class="flex flex-col gap-5 mt-4 drop-shadow-md" >
          <div class="flex flex-col p-4 gap-4 rounded-xl" :style="'background-color:' + changeColor(form.main_color,80)">
            <div class="flex items-center gap-4">
              <div class="flex items-center gap-2">
                <span class="text-2xl font-bold">
                  Usuari
                </span>
                <span class="p-1 text-md font-semibold rounded leading-none" :style="'background-color:' + changeColor(form.main_color,0)">  
                  Editor 
                </span>
              </div>
            </div>
            <p class="text-xl leading-7"> 
              Això és un comentari.
            </p>
          </div>
        </div>
      </div>           
    </div> 
  </div>  

</template>

<script>

export default {
  components: { DangerButton },
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
import DangerButton from '../../../Jetstream/DangerButton.vue';

  const props = defineProps({
    setting: Object,

  });

  let form = useForm({
    header_text: props.setting.header_text,
    header_img: props.setting.header_img,
    main_color: props.setting.main_color,
    social_media: props.setting.social_media,
    logo_consellcomarcal: props.setting.logo_consellcomarcal,
  });

  const update = () => {
    form.put("/acp/configuracio/1");
  };

  function changeColor(color, v) {
    if (color.length >6) { color= color.substring(1,color.length)}
    var rgb = parseInt(color, 16); 
    var r = Math.abs(((rgb >> 16) & 0xFF)+v); if (r>255) r=r-(r-255);
    var g = Math.abs(((rgb >> 8) & 0xFF)+v); if (g>255) g=g-(g-255);
    var b = Math.abs((rgb & 0xFF)+v); if (b>255) b=b-(b-255);
    r = Number(r < 0 || isNaN(r)) ? 0 : ((r > 255) ? 255 : r).toString(16); 
    if (r.length == 1) r = '0' + r;
    g = Number(g < 0 || isNaN(g)) ? 0 : ((g > 255) ? 255 : g).toString(16); 
    if (g.length == 1) g = '0' + g;
    b = Number(b < 0 || isNaN(b)) ? 0 : ((b > 255) ? 255 : b).toString(16); 
    if (b.length == 1) b = '0' + b;
    return "#" + r + g + b;
} 
</script>