<template>
  <div>
    <header class="px-4 text-white bg-gray-800">
      <div class="container flex items-center justify-center md:justify-between mx-auto py-4">
        <h1 class="text-3xl font-semibold">{{ title }}</h1>

        <div class="hidden md:flex">
          <a href="#" class="text-lg">Accedir</a>
          <a href="#" class="ml-4 text-lg">Registrar-se</a>
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
