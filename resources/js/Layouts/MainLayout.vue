<template>
  <Head :title="title" />
  
  <Header />
  <slot></slot>
</template>

<script>
  // Core
  import { defineComponent } from 'vue'
  import { Head, Link } from '@inertiajs/inertia-vue3'

  // Components
  import Header from '../Components/Header.vue'

  export default defineComponent({
    props: {
      title: String,
    },

    components: {
      Head,
      Link,
      Header,
    },
  })
</script>
