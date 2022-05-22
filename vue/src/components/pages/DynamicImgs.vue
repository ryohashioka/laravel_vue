<script setup lang="ts">
import DynamicPng from '../atoms/DynamicPng.vue'
import images from '../../assets/json/images.json'
</script>

<template>
  <div>
    <h1>Dynamic Image Demo</h1>
    <div class="mt-5 flex gap-10">
      <div v-for="image in images">
        <dynamic-png class="w-full" :filename="image" />
      </div>
    </div>
  </div>
</template>
