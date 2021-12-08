<template>
    <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <slot name="header"></slot>
        </div>
    </header>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: 'header',
    props: ['pageName'],
})

</script>