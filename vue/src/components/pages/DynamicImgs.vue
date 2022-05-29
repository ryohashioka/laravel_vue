<script setup lang="ts">
import DynamicPng from '../atoms/DynamicPng.vue'
import DynamicJpg from '../atoms/DynamicJpg.vue'
import images from '../../assets/json/images.json'
</script>

<template>
  <div>
    <h1>Dynamic Image Demo</h1>
    <div class="mt-5 flex gap-10">
      <div v-for="image in images">
        <dynamic-png v-if="image.type==='png'" class="w-full" :filename="image.name" />
        <dynamic-jpg v-else-if="image.type==='jpg'" class="w-full" :filename="image.name" />
        <p>{{ image.description }}</p>
      </div>
    </div>
  </div>
</template>
