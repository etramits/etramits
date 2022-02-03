<template>
  <label
    v-text="label"
    :for="id"
    class="mb-2 block text-zinc-700 select-none"
  />

  <input
    v-bind="{ ...$attrs }"
    :id="id"
    :type="type"
    :value="modelValue"
    class="w-50 h-10 text-zinc-700 border rounded appearance-none focus:outline-none focus:ring"
    :class="!error ? 'focus:border-zinc-900 focus:ring-zinc-700/20' : 'border-red-500 focus:ring-red-200'"
    @input="$emit('update:modelValue', $event.target.value)"
  />

  <div v-if="error" class="mt-2 text-sm text-red-700">
    El camp {{ label.toLowerCase() }} {{ error }}
  </div>
</template>

<script>
import { v4 as uuid } from 'uuid'

export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `input-${uuid()}`
      }
    },
    type: {
      type: String,
      default: 'text',
    },
    label: String,
    modelValue: String,
    error: String,
  },
  emits: ['update:modelValue'],
};

</script>