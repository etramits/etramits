<template>
  <div>
    <header class="px-4 text-white bg-gray-800">
      <div class="container flex items-center justify-center md:justify-between mx-auto py-4">
        <h1 class="text-3xl font-semibold">{{ title }}</h1>

        <div class="hidden md:flex">
          <inertia-link class="block px-6 py-2 hover:bg-indigo-500 hover:text-white rounded" :href="route('login')">Accedir</inertia-link>
          <inertia-link class="block px-6 py-2 hover:bg-indigo-500 hover:text-white rounded" :href="route('login')">Registrar-se</inertia-link>
        </div>
      </div>
    </header>

    <slot />
  </div>
</template>

<script>
// Core

export default {
  data() {
    return {
      title: "TicTac",
    }
  }
}
</script>
