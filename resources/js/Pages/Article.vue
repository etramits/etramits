<template>
  <AppLayout title="Categoria">
    <section class="bg-yellow-300">
      <div class="container flex flex-col items-center mx-auto py-16 text-gray-800">
        <h2 class="text-6xl font-bold">Sol·licitar el certificat COVID-19</h2>

        <div class="mt-3 flex items-center gap-8">
          <span class="text-xl">
            <font-awesome-icon icon="book-open" />
            Lectura de 3 minuts
          </span>
          <span class="text-xl">
            <font-awesome-icon icon="comment" />
            12 comentaris
          </span>
          <span class="text-xl">
            <font-awesome-icon icon="bookmark" />
            3 favorits
          </span>
        </div>
      </div>
    </section>

    <section class="py-20 bg-gray-50 text-gray-800">
      <div class="container flex flex-col gap-6 mx-auto max-w-7xl p-10 bg-white rounded-xl shadow">
        <p class="text-xl leading-7">A continuació veurem quin és el procediment per sol·licitar el certificat COVID-19 a través de "La Meva Salut".</p>

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

        <p class="text-xl leading-7">Un cop realitzat tots els passos anteriors, se'ns descarregarà un PDF amb el nostre certificat de vacunació contra la COVID-19.</p>
      </div>
    </section>

    <section class="pb-20 bg-gray-50 text-gray-800">
      <header class="container flex items-center mx-auto max-w-7xl px-10 py-6 gap-2 bg-yellow-300 leading-none rounded-t-xl shadow">
        <font-awesome-icon icon="comments" size="2x" />
        <span class="text-4xl font-bold">Comentaris</span>
      </header>

      <div class="container flex flex-col gap-8 mx-auto max-w-7xl p-10 bg-white rounded-b-xl shadow">
        <div class="flex flex-col p-4 gap-4 bg-yellow-50 rounded-xl">
          <div class="flex items-center gap-4">
            <img class="h-14 rounded-full" src="https://i.imgur.com/8cDKcKg.jpeg">
            <div class="flex items-center gap-2">
              <span class="text-2xl font-bold">Marc Bech</span>
            </div>
          </div>

          <p class="text-xl leading-7">
            Bones!<br>
            Com podría sol·licitar el certificat d'un altre familiar un cop ja he consultat el meu certificat?<br>
            Moltes gràcies
          </p>
        </div>

        <div class="ml-16 flex flex-col p-4 gap-4 bg-yellow-50 rounded-xl">
          <div class="flex items-center gap-4">
            <img class="h-14 rounded-full" src="https://i.imgur.com/5rdp61p.jpeg">
            <div class="flex items-center gap-2">
              <span class="text-2xl font-bold">Maria Perez</span>
              <span class="p-1 text-md font-semibold bg-yellow-300 rounded leading-none">ADMIN</span>
            </div>
          </div>

          <p class="text-xl leading-7">
            Bones Marc!<br>
            Per sol·licitar el certificat d'un familiar hauries de 
            Com podría sol·licitar el certificat d'un altre familiar un cop ja he consultat el meu certificat?<br>
            Moltes gràcies
          </p>
        </div>

        <div class="flex flex-col p-4 gap-4 bg-yellow-50 rounded-xl">
          <div class="flex items-center gap-4">
            <img class="h-14 rounded-full" src="https://i.imgur.com/A0aN9OL.jpeg">
            <div class="flex items-center gap-2">
              <span class="text-2xl font-bold">Sara Pons</span>
            </div>
          </div>

          <p class="text-xl leading-7">
            Bon dia!<br>
            Com podría sol·licitar el certificat d'un altre familiar un cop ja he consultat el meu certificat?<br>
            Moltes gràcies
          </p>
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
  })
</script>
