<template>
  <AppLayout title="Categoria">
    <section class="bg-yellow-300" >
      <div class="container flex flex-col items-center mx-auto py-16 text-gray-800">
        <h2 v-text="article.title" class="text-6xl font-bold" />

        <div class="mt-3 flex items-center gap-8">
          <span v-for="entry in article.stats" :key="entry.id" class="text-xl">
            <font-awesome-icon :icon="entry.icon" />
            {{ entry.value }}
          </span>
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
        <div v-for="comment in comments" :key="comment.id" class="flex flex-col gap-5">
          <!-- Comment -->
          <div class="flex flex-col p-4 gap-4 bg-yellow-50 rounded-xl">
            <div class="flex items-center gap-4">
              <img class="h-14 rounded-full" :src="comment.user.picture" draggable="false">
              <div class="flex items-center gap-2">
                <span v-text="comment.user.name" class="text-2xl font-bold" />
              </div>
            </div>

            <p v-html="comment.message" class="text-xl leading-7" />
          </div>

          <!-- Replies -->
          <div v-for="reply in comment.replies" :key="reply.id" class="ml-16 flex flex-col p-4 gap-4 bg-yellow-50 rounded-xl">
            <div class="flex items-center gap-4">
              <img class="h-14 rounded-full" :src="reply.user.picture" draggable="false">
              <div class="flex items-center gap-2">
                <span v-text="reply.user.name" class="text-2xl font-bold" />
                <span v-if="reply.user.role" v-text="reply.user.role" class="p-1 text-md font-semibold bg-yellow-300 rounded leading-none" />
              </div>
            </div>

            <p class="text-xl leading-7">
              Bones Marc<br>
              Per sol·licitar el certificat d'un familiar hauries de sortir del compte actual i accedir amb la del familiar.<br>
              Salut
            </p>
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
  import { fas } from '@fortawesome/free-solid-svg-icons'
  import AppLayout from '@/Layouts/AppLayout.vue'

  library.add(fas)

  export default defineComponent({
    components: {
      Link,
      FontAwesomeIcon,
      AppLayout
    },

    props: {
      article: Object,
    },

    data() {
      return {
        // article: {
        //   title: 'Sol·licitar el certificat COVID-19',
        //   stats: [
        //     {
        //       id: 0,
        //       icon: 'book-open',
        //       value: 'Lectura de 3 minuts'
        //     },

        //     {
        //       id: 1,
        //       icon: 'comment',
        //       value: '12 comentaris'
        //     },

        //     {
        //       id: 2,
        //       icon: 'bookmark',
        //       value: '3 favorits'
        //     },
        //   ]
        // },

        comments: [
          {
            id: 0,
            message: `Bones!<br>Com podría sol·licitar el certificat d'un altre familiar un cop ja he consultat el meu certificat?<br>Moltes gràcies`,
            user: {
              name: 'Marc Bech',
              picture: 'https://i.imgur.com/8cDKcKg.jpeg',
              role: null
            },
            replies: [
              {
                id: 0,
                message: `Bones Marc<br>Per sol·licitar el certificat d'un familiar hauries de sortir del compte actual i accedir amb la del familiar.<br>Salut`,
                user: {
                  name: 'Maria Perez',
                  picture: 'https://i.imgur.com/5rdp61p.jpeg',
                  role: 'ADMIN'
                }
              }
            ]
          },

          {
            id: 1,
            message: `Hola!<br>Com puc sol·licitar el certificat de prova COVID-19 negativa?<br>Gràcies`,
            user: {
              name: 'Joan Puig',
              picture: 'https://i.imgur.com/VOW3bzY.jpeg',
              role: null
            },
            replies: []
          },
        ]
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
