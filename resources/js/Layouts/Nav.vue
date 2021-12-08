<template>
  <div>
    <div class="px-4 text-white bg-gray-800">
      <div class="container flex items-center justify-center md:justify-between mx-auto py-4">
        <Link :href="route('login')" as="button" type="button">Iniciar Sessio</Link>
        <Link :href="route('register')" as="button" type="button">Registrar-se</Link>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
    name: 'nav',
    components: {
      Link
    }
})

</script>