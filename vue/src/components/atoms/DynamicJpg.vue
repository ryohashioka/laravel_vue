<script setup lang="ts">
import { ref, watch } from 'vue';

/**
 * ./assets/images/ 配下にある画像ファイル名を指定（拡張子は PNG のみ）
 */
interface Props {
  filename: string,
}
const { filename } = defineProps<Props>()

const img = ref("");
import(`../../assets/images/${filename}.jpg`).then(res => {
  img.value = res.default;
})
</script>

<template>
  <img :src="img" />
</template>
