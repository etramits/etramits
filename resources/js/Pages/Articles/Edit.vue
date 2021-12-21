<template>
  <dashboard-layout title="Dashboard">

    <div class="m-12">
      <h1 class="font-bold text-4xl">Editar article</h1>

      <!-- <div class="flex mt-6 p-4 bg-yellow-50 rounded-xl">
        <p class="text-lg leading-none">Emplena tots el camps especificats a continuació per inciar la creació d'un nou article.</p>
      </div> -->

      <form @submit.prevent="submit" class="flex flex-col gap-6 mt-6 w-full">
        <div>
          <jet-label for="title" value="Títol" />
          <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus autocomplete="Títol" />
        </div>

        <div class="flex gap-10">
          <div class="flex flex-col gap-6 w-8/12">
            <div>
              <jet-label for="content" value="Contingut" />
                      
              <editor v-model="form.content" api-key="no-api-key"
                :init="{
                  language: 'ca',
                  height: 500,
                  
                  plugins: [
                  'advlist autolink lists link image charmap print preview anchor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table paste code help wordcount'
                  ],

                  menubar: true,
                  toolbar: 'undo redo | formatselect | bold | image | fullscreen | tictac',

                  // Images
                  image_list: imagesEditor,

                  // Formats
                  /*
                  formats: {
                    h2: { block: 'h2', classes: 'text-4xl font-bold' },
                    h3: { block: 'h3', classes: 'text-3xl font-bold' },
                    p: { block: 'p', classes: 'text-xl leading-7' },
                    img: { block: 'img', classes: 'mx-auto w-9/12 border-4 rounded-xl' },
                  },
                  */

                  // Image options
                  image_description: false,
                  image_dimensions: false,

                  setup: function (editor) {
                    editor.ui.registry.addButton('tictac', {
                      text: 'TicTac',
                      onAction: function (_) {
                        editor.insertContent('{{ARTICLE_ID}}');
                      }
                    });
                  }
                }"
              />

              <jet-input id="content" type="hidden" class="mt-1 block w-full" v-model="form.content" required />
            </div>

            <div>
              <jet-button type="submit">
                Editar
              </jet-button>
            </div>
          </div>
          <div class="flex flex-col gap-6 w-4/12">
            <div class="w-full">
              <jet-label for="title" value="Enllaç" />
              <jet-input v-model="generateSlug" class="mt-1 block w-full" type="text" required disabled />
            </div>

            <div class="w-full">
              <jet-label for="category_id" value="Categoría" />

              <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                <option value="" selected hidden></option>
                <option v-for="category in categories" :key="category.id" v-text="category.name" :value="category.id" :selected="form.category == category.id" />
              </select>
            </div>

            <div class="w-full">
              <jet-label for="active" value="Estat" />

              <select v-model="form.active" name="active" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                <option :selected="form.active == 0" :value="0">Borrador</option>
                <option :selected="form.active == 1" :value="1">Publicat</option>
              </select>
            </div>

            <div>
              <jet-label for="content" value="Portada" />
              <jet-input @input="form.cover = $event.target.files[0]" type="file" />
              <img v-if="article.cover" class="mt-2 w-full rounded-b-xl" :src="`/articles/${article.id}/cover.jpg`">
              <img v-else class="mt-2 w-full rounded-b-xl" src="/img/default.jpg">
            </div>

            <div>
              <jet-label for="content" value="Imatges" />

              <form @submit.prevent="upload" class="flex justify-between">
                <jet-input @input="image.image = $event.target.files[0]" type="file" />
                <jet-button type="submit">Penjar</jet-button>
              </form>
            </div>

            <div>
              <div class="grid grid-cols-2 gap-3">
                <div v-for="image in images" :key='image'>
                  <img :src="`/articles/${article.id}/images/${image}`" class="rounded">
                  <div class="flex justify-between text-sm text-gray-500">
                    <span v-text="image" />
                    <button>Eliminar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
          article: Object,
          categories: Object,
          images: Object,
          success: String,
        },

        data() {
          return {
            image: this.$inertia.form({
              _method: 'PUT',
              image: null,
            }),

            form: this.$inertia.form({
              _method: 'PUT',
              title: this.article.title,
              slug: this.article.slug,
              category: this.article.category,
              content: this.article.content,
              active: this.article.active,
              cover: null,
            }),
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

            return this.form.slug;
          },

          imagesEditor: function () {
            let result = [];

            for (let image of this.images) {
              result.push({
                title: image,
                value: `/articles/${this.article.id}/images/${image}`,
              })
            }

            return result;
          }
        },

        methods: {
          active(int) {
              switch(int) {
              case 0:
                  return "Publicat";
                  break;
              case 1:
                  return "Borrador";
                  break;
              default:
                  return "Publicat";
              }
          },

          upload() {
            let route = this.route('articles.upload', this.article.id);
            this.image.post(route);
          },

          submit() {
            this.form.post(this.route('articles.update',this.article.id));
          },
        }
    })
</script>
