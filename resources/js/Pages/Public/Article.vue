<template>
    <section :style="`background-color: ${settings.main_color}`">
      <div class="container flex flex-col items-center mx-auto py-16 text-gray-800">
        <h2 v-text="article.title" class="text-6xl font-bold" />
        <div v-if="$page.props.user" class="mt-10 text-gray-800 hover:text-gray-500">
          <div v-if="added == 0">
            <button id="fav" @click="addFavorite()">
              <font-awesome-icon icon="star-half-alt" class="mr-1" /> Afegir a favorits
            </button>
          </div>
          <div v-else>
            <button id="fav" @click="removeFavorite()">
              <font-awesome-icon icon="star" /> Treure de favorits
            </button>
          </div>
        </div>
        <div v-if="article.created_at != article.updated_at" class="mt-3 flex items-center">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
          <p>Aquest tràmit va ser actualitzat el {{UpdatedDate()}}.</p>
          <!-- <span v-for="entry in article.stats" :key="entry.id" class="text-xl">
            <font-awesome-icon :icon="entry.icon" />
            {{ entry.value }}
          </span> -->
        </div>
      </div>
    </section>
    
    <section class="py-20 bg-gray-50 text-gray-800">
      <div v-html="article.content" class="container flex flex-col gap-6 mx-auto max-w-7xl p-10 bg-white rounded-xl shadow" id="content" />

    </section>

    <section class="pb-20 bg-gray-50 text-gray-800">
      <header :class="`container flex items-center mx-auto max-w-7xl px-10 py-6 gap-2 bg-yellow-300 leading-none rounded-t-xl shadow`">
        <font-awesome-icon icon="comments" size="2x" />
        <span class="text-4xl font-bold">Comentaris</span>
      </header>

      <div class="container flex flex-col gap-10 mx-auto max-w-7xl p-10 bg-white rounded-b-xl shadow">
        <div>
          <div v-if="$page.props.user">
            <form @submit.prevent="submitComment" class="w-3/5 ml-8">
                <div>
                    <div for="content" value="Comentari:" />
                    <Textarea id="content" type="text" class="mt-1 block w-full" v-model="form.content" :maxlength="200" required />
                </div>
                <div class="flex items-center justify-start mt-4">
                    <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Enviar
                    </button>
                </div>
            </form>
          </div>
          <div v-else>
              <p><Link :href="route('login')" class="underline">Connectat</Link> per poder deixar un comentari.</p>  
          </div>
        </div>
        <div v-for="comment in comments" :key="comment.id" class="flex flex-col gap-5">
          <!-- Comment -->
          <div :class="`flex flex-col p-4 gap-4 bg-yellow-50 rounded-xl`">
            <div class="flex items-center gap-4">
              <div class="flex items-center gap-2">
                <span class="text-2xl font-bold">{{comment.username}}</span>
                <span v-if="comment.user_role" v-text="selectRole(comment.username)" :class="`p-1 text-md font-semibold bg-yellow-300 rounded leading-none`" />
              </div>
            </div>

            <p v-html="comment.content" class="text-xl leading-7" />
          </div>
        </div>
      </div>
    </section>
</template>

<script>
  import { defineComponent } from 'vue'
  import { Link } from '@inertiajs/inertia-vue3'
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
  import { library } from '@fortawesome/fontawesome-svg-core'
  import Input from '../../Shared/ACP/FormInput.vue'
  import Textarea from '../../Shared/ACP/Form/TextArea.vue'
  import { fas } from '@fortawesome/free-solid-svg-icons'
  library.add(fas)

  export default defineComponent({
    components: {
      Link,
      FontAwesomeIcon,
      Input,
      Textarea
    },
    props: {
      article: Object,
      comments: Object,
      favorite: Object,
      added: Number,
      settings: Object
    },
    layout: Layout,
    data() {
      return {
        form: this.$inertia.form({
            user_id: '',
            content: ''
        }),
        fav: this.$inertia.form({
            user_id: '',
        }),

        
      }
    },
    methods: {
      selectRole(roleInt) {
        switch(roleInt) {
        case 1:
            return "Usuari";
            break;
        case 2:
            return "Admin";
            break;
        case 3:
            return "Gestor";
            break;
        default:
            return "Usuari";
        }
      },
      submitComment() {
        this.form.user_id = this.$page.props.user.id;
        this.form.post(this.route('comment.store', this.article.id), {
          onFinish: () => this.form.reset('content'),
        });
      },
      addFavorite() {
        this.fav.user_id = this.$page.props.user.id;
        this.fav.post(this.route('favorite.add', this.article.id));
      },
      removeFavorite() {
        this.fav.user_id = this.$page.props.user.id;
        this.fav.post(this.route('favorite.rem', this.article.id));
      },

      UpdatedDate() {
        
        var fullDate = new Date(this.$page.props.article.updated_at);
        
        return fullDate.getDate() + '/' + (fullDate.getMonth() + 1) + '/' + fullDate.getFullYear()

      },

    }
  })
</script>

<script setup>

import Layout from "../../Shared/Layouts/Public"

</script>