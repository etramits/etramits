<template>
  <AppLayout title="Categoria">
    <section :class="`bg-${webdesign.main_color}-300 ${webdesign.font_family}`" >
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
        <div class="mt-3 flex items-center gap-8">
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
      <header :class="`container flex items-center mx-auto max-w-7xl px-10 py-6 gap-2 bg-${webdesign.main_color}-300 leading-none rounded-t-xl shadow`">
        <font-awesome-icon icon="comments" size="2x" />
        <span class="text-4xl font-bold">Comentaris</span>
      </header>

      <div class="container flex flex-col gap-10 mx-auto max-w-7xl p-10 bg-white rounded-b-xl shadow">
        <div>
          <div v-if="$page.props.user">
            <form @submit.prevent="submitComment" class="w-3/5 ml-8">
                <div>
                    <jet-label for="content" value="Comentari:" />
                    <textarea id="content" type="text" class="mt-1 block w-full" v-model="form.content" :maxlength="200" required />
                </div>
                <div class="flex items-center justify-start mt-4">
                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Enviar
                    </jet-button>
                </div>
            </form>
          </div>
          <div v-else>
              <p><Link :href="route('login')" class="underline">Connectat</Link> per poder deixar un comentari.</p>  
          </div>
        </div>
        <div v-for="comment in comments" :key="comment.id" class="flex flex-col gap-5">
          <!-- Comment -->
          <div :class="`flex flex-col p-4 gap-4 bg-${webdesign.main_color}-50 rounded-xl`">
            <div class="flex items-center gap-4">
              <div class="flex items-center gap-2">
                <span class="text-2xl font-bold">{{comment.user_name}}</span>
                <span v-if="comment.user_role" v-text="selectRole(comment.user_role)" :class="`p-1 text-md font-semibold bg-${webdesign.main_color}-300 rounded leading-none`" />
              </div>
            </div>

            <p v-html="comment.content" class="text-xl leading-7" />
          </div>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script>
  import { defineComponent } from 'vue'
  import { Link } from '@inertiajs/inertia-vue3'
  import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
  import { library } from '@fortawesome/fontawesome-svg-core'
  import JetInput from '@/Jetstream/Input.vue'
  import JetLabel from '@/Jetstream/Label.vue'
  import JetButton from '@/Jetstream/Button.vue'
  import JetTextarea from '@/Jetstream/Textarea.vue'
  import { fas } from '@fortawesome/free-solid-svg-icons'
  import AppLayout from '@/Layouts/AppLayout.vue'

  library.add(fas)

  export default defineComponent({
    components: {
      Link,
      FontAwesomeIcon,
      AppLayout,
      JetInput,
      JetLabel,
      JetButton,
      JetTextarea
    },

    props: {
      article: Object,
      comments: Object,
      favorite: Object,
      added: Number,
      webdesign: Object,
    },

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
    },
    mounted() {
      let tags = [
        { name: 'h2', class: 'text-4xl font-bold' },
        { name: 'h3', class: 'text-3xl font-bold' },
        { name: 'p', class: 'text-xl leading-7' },
        { name: 'img', class: 'mx-auto w-9/12 border-4 rounded-xl' },
      ];
      
      for (let tag of tags) {
        let contentElement = document.getElementById('content');
        let elements = contentElement.getElementsByTagName(tag.name);

        for (let element of elements) {
          element.className = tag.class;
        }
      }
    }
  })
</script>
