<script setup lang="ts">
import { EffectFade, Autoplay, Navigation, Pagination } from 'swiper';
import { Swiper as SwiperCls } from 'swiper/types';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import "swiper/css/effect-fade";
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const onSwiper = (swiper: SwiperCls) => {
  console.log(swiper);
};
const onSlideChange = () => {
  console.log('slide change');
};

const modules = [EffectFade, Autoplay, Navigation, Pagination];
</script>

<template>
  <div>
    <h1>Swiper Demo</h1>
    <div class="mt-5">
      <swiper
        class="my-swiper"
        :modules="modules"
        :effect="'fade'"
        navigation
        :spaceBetween="30"
        :pagination="{ clickable: true }"
        loop
        :autoplay="{
          delay: 2500,
          disableOnInteraction: false,
        }"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
      >
        <swiper-slide class="my-slide"><img style="max-height: 100px" src="../../assets/images/flower_cattleya.png" /></swiper-slide>
        <swiper-slide class="my-slide"><img style="max-height: 100px" src="../../assets/images/flower_hyacinth.png" /></swiper-slide>
        <swiper-slide class="my-slide"><img style="max-height: 100px" src="../../assets/images/flower_kuchinashi.png" /></swiper-slide>
        <swiper-slide class="my-slide"><img style="max-height: 100px" src="../../assets/images/flower_kuroyuri.png" /></swiper-slide>
        <swiper-slide class="my-slide"><img style="max-height: 100px" src="../../assets/images/flower_marigold.png" /></swiper-slide>
        <swiper-slide class="my-slide"><img style="max-height: 100px" src="../../assets/images/flower_ooinunofuguri.png" /></swiper-slide>
      </swiper>
    </div>
  </div>
</template>

<style scoped>
.my-slide {
  @apply bg-sky-200 w-full flex justify-center;
}

.my-swiper::v-deep(.my-slide) {
  @apply bg-sky-200 w-full flex justify-center;
}
</style>