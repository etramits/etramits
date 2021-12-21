<template>
  <dashboard-layout title="Dashboard">  
    <div class="m-12">
      <h1 class="font-bold text-4xl">Crear article</h1>

      <div class="mt-6 p-4 bg-yellow-50 rounded-xl">
        <span class="text-lg leading-none">Emplena tots el camps especificats a continuació per inciar la creació d'un nou article.</span>
      </div>

      <form @submit.prevent="submit" class="flex justify-start gap-10 mt-6 w-full">
        <div class="flex flex-col gap-6 w-8/12">
          <div>
            <jet-label for="title" value="Títol" />
            <jet-input v-model="form.title" class="mt-1 block w-full" type="text" required autofocus />
          </div>

          <div>
            <jet-label for="title" value="Enllaç" />
            <jet-input v-model="generateSlug" class="mt-1 block w-full" type="text" required disabled />
          </div>

          <div>
            <jet-label for="category_id" value="Categoría" />

            <select v-model="form.category" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" required>
              <option :value="null" selected hidden />
              <option v-for="category in categories" :key="category.id" v-text="category.name" :value="category.id" />
            </select>
          </div>

          <div>
            <jet-button>Crear</jet-button>
          </div>
        </div>
        <div class="w-4/12" />
      </form>
    </div>
  </dashboard-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import DashboardLayout from '@/Layouts/DashboardLayout.vue'
    import Editor from '@tinymce/tinymce-vue'

  export default defineComponent({
    components: {
      DashboardLayout,
      Head,
      JetAuthenticationCard,
      JetAuthenticationCardLogo,
      JetButton,
      JetInput,
      JetCheckbox,
      JetLabel,
      JetValidationErrors,
      Link,
      Editor,
    },

    props: {
      categories: Object,    
        
      articles: Object,
        // categories: Object,
      user: Object,
      modal: false,
    },
        
    data() {
      return {
        form: this.$inertia.form({
          title: '',
          slug: '',
          category : null,
        })
      }
    },

    computed: {
      generateSlug: function () {
        let str = this.form.title;

        str = str.replace(/^\s+|\s+$/g, '');
        str = str.toLowerCase();
      
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
        var to   = "aaaaeeeeiiiioooouuuunc------";
        
        for (let i = 0, l = from.length; i < l; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '')
          .replace(/\s+/g, '-')
          .replace(/-+/g, '-');

        this.form.slug = str;
        return str;
      }
    },

    methods: {
      submit() {
        this.form.post(this.route('articles.store'))
      }
    }
    })
</script>
