<template>
  <AppLayout title="Categoria">
    <section class="bg-yellow-300" >
      <div class="container flex flex-col items-center mx-auto py-16 text-gray-800">
        <h2 v-text="article.title" class="text-6xl font-bold" />

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
      
        <!-- <p class="text-xl leading-7">A continuació veurem quin és el procediment per sol·licitar el certificat COVID-19 a través de "La Meva Salut".</p>

        <h2 class="text-4xl font-bold">Accedir a "La Meva Salut"</h2>

        <p class="text-xl leading-7">No saps com accedir a "La Meva Salut"? Cap problema. En el següent tràmit pots veure tot el procediment:</p>

        <div class="flex items-center justify-between p-6 bg-yellow-50 rounded-xl">
          <div>
            <span class="text-2xl font-bold">Com accedir a "La Meva Salut"</span>
            
            <div class="mt-1 flex gap-4 opacity-75">
              <span class="text-md">
                <font-awesome-icon icon="book-open" />
                Lectura de 1 minut
              </span>
              <span class="text-md">
                <font-awesome-icon icon="comment" />
                2 comentaris
              </span>
              <span class="text-md">
                <font-awesome-icon icon="bookmark" />
                12 favorits
              </span>
            </div>
          </div>
          <button class="p-3 text-xl font-medium bg-yellow-300 rounded leading-none hover:opacity-75">Veure</button>
        </div>
        
        <p class="text-xl leading-7">Perfecte! En aquest punt hauries d'estar a l'inici de "La Meva Salut".</p>

        <img class="mx-auto w-9/12 border-4 rounded-xl" src="https://i.imgur.com/HYbf9Wq.png">

        <br>

        <h2 class="text-4xl font-bold">Obtenir el certificat "COVID-19"</h2>

        <p class="text-xl leading-7">Anirem a l'apartat de <b>"Vacunes i Certificat COVID EU"</b>.</p>

        <img class="mx-auto w-9/12 border-4 rounded-xl" src="https://i.imgur.com/9vwPMaV.png">


        <p class="text-xl leading-7">Allà farem clic al botó <b>"Sol·licita'l aquí"</b> en l'opció <b>"Certificat COVID Digital UE"</b>.</p>

        <img class="mx-auto w-9/12 border-4 rounded-xl" src="https://i.imgur.com/9CWgei1.png">

        <p class="text-xl leading-7">A continuació farem clic al botó <b>"Accedir"</b> en l'opció <b>"Certificat COVID Digital UE"</b>.</p>

        <img class="mx-auto w-9/12 border-4 rounded-xl" src="https://i.imgur.com/3D3iJQi.png">

        <p class="text-xl leading-7">Finalment, farem clic al botó <b>"Sol·licitar"</b> en l'opció <b>"Certificat de vacunació contra la COVID-19"</b>.</p>

        <img class="mx-auto w-9/12 border-4 rounded-xl" src="https://i.imgur.com/8qJfK3P.png">

        <p class="text-xl leading-7">Un cop realitzat tots els passos anteriors, se'ns descarregarà un PDF amb el nostre certificat de vacunació contra la COVID-19.</p> -->
      <!-- </div> -->
    </section>

    <section class="pb-20 bg-gray-50 text-gray-800">
      <header class="container flex items-center mx-auto max-w-7xl px-10 py-6 gap-2 bg-yellow-300 leading-none rounded-t-xl shadow">
        <font-awesome-icon icon="comments" size="2x" />
        <span class="text-4xl font-bold">Comentaris</span>
      </header>

      <div class="container flex flex-col gap-10 mx-auto max-w-7xl p-10 bg-white rounded-b-xl shadow">
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
        <div v-for="comment in comments" :key="comment.id" class="flex flex-col gap-5">
          <!-- Comment -->
          {{comment.user_name}}
          <div class="flex flex-col p-4 gap-4 bg-yellow-50 rounded-xl">
            <div class="flex items-center gap-4">
              <div class="flex items-center gap-2">
                <span v-text="comment.user_id" class="text-2xl font-bold" />
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
    },

    data() {
      return {
        form: this.$inertia.form({
            user_id: '',
            content: ''
        }),
      }
    },
    methods: {
        submitComment() {
          this.form.user_id = this.$page.props.user.id;
          this.form.post(this.route('comment.store', this.article.id), {
            onFinish: () => this.form.reset('content'),
          });
        }
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
