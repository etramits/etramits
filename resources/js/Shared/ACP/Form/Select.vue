<template>
  <label
    v-text="label"
    :for="id"
    class="mb-2 block text-zinc-700 select-none"
  />

  <select
    v-bind="{ ...$attrs }"
    :id="id"
    :value="modelValue"
    class="p-2 w-full text-zinc-700 bg-white border rounded appearance-none focus:outline-none focus:ring"
    :class="!error ? 'focus:border-zinc-900 focus:ring-zinc-700/20' : 'border-red-500 focus:ring-red-200'"
    @input="$emit('update:modelValue', formatValue($event))"
  >
    <slot />
  </select>

  <div v-if="error" class="mt-2 text-sm text-red-700">
    El campo {{ label.toLowerCase() }} {{ error }}
  </div>
</template>

<script>
import { v4 as uuid } from "uuid";

export default {
  inheritAttrs: false,
  emits: ["update:modelValue"],
};
</script>

<script setup>
  const props = defineProps({
    id: {
      type: String,
      default() {
        return `input-${uuid()}`
      }
    },
    label: String,
    modelValue: String,
    error: String,
  });

  const formatValue = (event) => {
    let value;

    switch (event.target.value) {
      case "true":
        value = true;
        break;

      case "false":
        value = false;
        break;

      default:
        value = event.target.value;
    }

    return value;
  };
</script>