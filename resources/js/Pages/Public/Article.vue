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
      </div>
    </section>
    
    <section class="py-20 bg-gray-50 text-gray-800">
      <div v-html="article.content" class="container flex flex-col gap-6 mx-auto max-w-7xl p-10 bg-white rounded-xl shadow" id="content" />

    </section>

    <section class="pb-20 bg-gray-50 text-gray-800">
      <header :style="`background-color: ${settings.main_color}`" :class="`container flex items-center mx-auto max-w-7xl px-10 py-6 gap-2 leading-none rounded-t-xl shadow`">
        <font-awesome-icon icon="comments" size="2x" />
        <span class="text-4xl font-bold">Comentaris</span>
      </header>

      <div class="container flex flex-col gap-10 mx-auto max-w-7xl p-10 bg-white rounded-b-xl shadow">
        <div>
          <div v-if="$page.props.user">
            <form @submit.prevent="submitComment" class="w-full">
                <div>
                  <jet-label for="content" value="Comentari:" />
                  <textarea id="content" placeholder="Deixa aquí el teu comentari." type="text" class="mt-4 block w-full bg-zinc-100 border border-zinc-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-2" v-model="form.content" :maxlength="200" required />
                </div>
                <vue-recaptcha ref="recaptcha" class="mt-4"
                  @verify="onVerify" sitekey="6Ldk04geAAAAAOY7dXZeKLPjfy9Y0buP9cTnpe2V">
                </vue-recaptcha>
                <div class="flex items-center justify-start mt-4">
                  <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Enviar
                  </jet-button>
                </div>
                <alert class="mt-4" v-if="errorRobot != false" value="Falta seleccionar el ReCaptcha"/>
            </form>
          </div>
          <div v-else>
              <p><Link :href="route('login')" class="underline">Connectat</Link> per poder deixar un comentari.</p>  
          </div>
        </div>
        <div v-for="comment in comments" :key="comment.id" class="flex flex-col gap-5">
          <!-- Comment -->
          <div :class="`flex flex-col p-4 gap-2 rounded-xl bg-zinc-100`">
            <div class="flex items-center">
              <div class="flex items-center gap-2">
                <span class="text-xl font-bold">{{comment.username}}</span>
                <span :style="`background-color: ${settings.main_color}`" :class="`p-1 text-md font-semibold rounded leading-none`">{{comment.user_role}}</span>
                <div v-if="$page.props.user.role_id == 3 || $page.props.user.role_id == 4"><a class="cursor-pointer"  v-on:click="destroy(comment.id)"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></a></div>
              </div>
            </div>

            <p v-html="comment.content" class="text-md leading-2" />
          </div>
        </div>
      </div>
    </section>
</template>

<script>
  import { defineComponent } from "vue"
  import { Link } from "@inertiajs/inertia-vue3"
  import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome"
  import { library } from "@fortawesome/fontawesome-svg-core"
  import JetInput from "@/Jetstream/Input.vue"
  import JetLabel from "@/Jetstream/Label.vue"
  import JetButton from "@/Jetstream/Button.vue"
  import { fas } from "@fortawesome/free-solid-svg-icons"
  import Layout from "../../Shared/Layouts/Public";
  import { VueRecaptcha } from "vue-recaptcha";
  import alert from "../../Shared/Public/Alert.vue"
  import { Inertia } from "@inertiajs/inertia";

  library.add(fas)

  export default defineComponent({
    components: {
      Link,
      FontAwesomeIcon,
      Input,
      Textarea
      JetInput,
      JetLabel,
      JetButton,
      VueRecaptcha,
      alert
    },
    layout: Layout,
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
            robot: false,
            user_id: '',
            content: ''
        }),
        fav: this.$inertia.form({
            user_id: '',
        }),
        errorRobot: false,
      }
    },
    methods: {
      submitComment() {
        if (this.form.robot) {
          this.form.user_id = this.$page.props.user.id;
          this.form.post(this.route('comment.store', this.article.id), {
            onFinish: () => {
              this.form.content = '';
            },
          });
        } else {
          this.errorRobot = true
        }
      },
      onVerify(response) {
        if (response) {
          this.form.robot = true
          this.errorRobot = false
        } else {
          this.errorRobot = true
        }
      },
      addFavorite() {
        this.fav.user_id = this.$page.props.user.id;
        this.fav.post(this.route('favorite.add', this.article.id));
      },
      removeFavorite() {
        this.fav.user_id = this.$page.props.user.id;
        this.fav.post(this.route('favorite.rem', this.article.id));
      },
      destroy(id) {
        Inertia.delete(`/deleteComment/${id}`);
      }
    },
    
  })
</script>

<script setup>

import Layout from "../../Shared/Layouts/Public"

</script>