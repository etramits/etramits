<template>
  <div>
    <div class="px-4 text-white bg-gray-800">
      <div class="container flex items-center justify-center md:justify-between mx-auto py-4">
        <template>
          <Link :href="route('login')" class="text-sm text-gray-700 underline">
              Log in
          </Link>
          <Link :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
              Register
          </Link>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: 'nav',
    components: {
      Link,
      Head
    },
    props: {
      canLogin: Boolean,
      canRegister: Boolean,
    }
})

</script>