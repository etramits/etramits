<template>
  <label
    v-text="label"
    :for="id"
    class="mb-2 block text-zinc-700 select-none"
  />

  <textarea
    v-bind="{ ...$attrs }"
    :id="id"
    :value="modelValue"
    class="p-2 w-full text-zinc-700 border rounded appearance-none focus:outline-none focus:ring"
    :class="!error ? 'focus:border-zinc-900 focus:ring-zinc-700/20' : 'border-red-500 focus:ring-red-200'"
    @input="$emit('update:modelValue', $event.target.value)"
  />

  <div v-if="error" class="mt-2 text-sm text-red-700">
    El camp {{ label.toLowerCase() }} {{ error }}
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  emits: ["update:modelValue"],
}
</script>

<script setup>
import { v4 as uuid } from "uuid";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  id: {
    type: String,
    default() { return `input-${uuid()}` },
  },
  type: {
    type: String,
    default: "text",
  },
  label: String,
  modelVale: String,
  error: String,
});

</script>