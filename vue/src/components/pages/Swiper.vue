<script setup lang="ts">
import { ref } from 'vue';
import { Autoplay, Navigation, Pagination } from 'swiper';
import { Swiper as SwiperCls } from 'swiper/types';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const onSwiper = (swiper: SwiperCls) => {
  console.log(swiper);
};
const onSlideChange = () => {
  console.log('slide change');
};

const modules = ref([Autoplay, Navigation, Pagination]);
</script>

<template>
  <div>
    <h1>Swiper Demo</h1>
    <div class="mt-5">
      <swiper
        :modules="modules"
        navigation
        :slidesPerView="3"
        :spaceBetween="30"
        :pagination="{ clickable: true }"
        :scrollbar="{ draggable: true }"
        :loop="true"
        :autoplay="{
          delay: 2500,
          disableOnInteraction: false,
        }"
        @swiper="onSwiper"
        @slideChange="onSlideChange"
      >
        <swiper-slide class="bg-sky-200"><img src="../../assets/images/flower_cattleya.png" /></swiper-slide>
        <swiper-slide class="bg-sky-200"><img src="../../assets/images/flower_hyacinth.png" /></swiper-slide>
        <swiper-slide class="bg-sky-200"><img src="../../assets/images/flower_kuchinashi.png" /></swiper-slide>
        <swiper-slide class="bg-sky-200"><img src="../../assets/images/flower_kuroyuri.png" /></swiper-slide>
        <swiper-slide class="bg-sky-200"><img src="../../assets/images/flower_marigold.png" /></swiper-slide>
        <swiper-slide class="bg-sky-200"><img src="../../assets/images/flower_ooinunofuguri.png" /></swiper-slide>
      </swiper>
    </div>
  </div>
</template>