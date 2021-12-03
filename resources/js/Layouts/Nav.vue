<template>
  <div>
    <header class="px-4 text-white bg-gray-800">
      <div class="container flex items-center justify-center md:justify-between mx-auto py-4">
        <h1 class="text-3xl font-semibold">{{ title }}</h1>

        <div class="hidden md:flex">
          <Link href="#" class="text-lg">Accedir</Link>
          <Link href="#" class="ml-4 text-lg">Registrar-se</Link>
        </div>
      </div>
    </header>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
            Link,
    }
})

</script>