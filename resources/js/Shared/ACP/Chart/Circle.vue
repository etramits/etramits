<template>
    <!-- Circle -->
    <div class="inline-flex items-center justify-center overflow-hidden rounded-full">
      <!-- Building a Progress Ring: https://css-tricks.com/building-progress-ring-quickly/ -->
      <svg class="w-20 h-20">
        <circle
          class="text-gray-300"
          stroke-width="5"
          :stroke="colorBackground"
          fill="transparent"
          r="30"
          cx="40"
          cy="40"
        />
        <circle
          :class="color"
          stroke-width="5"
          :stroke-dasharray="circumference"
          :stroke-dashoffset="circumference - percentage / 100 * circumference"
          stroke-linecap="round"
          :stroke="color"
          fill="transparent"
          r="30"
          cx="40"
          cy="40"
        />
      </svg>
      <span class="absolute text-xl font-medium" :style="`color: ${color}`">{{percentage}}%</span>
    </div>
</template>


<script setup>

const circumference = 30 * 2 * 3.14;

const props = defineProps({
  percent: Number,
  colorBackground: String,
  color: String,
});

</script>