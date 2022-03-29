<template>
  <view class="Carousel-box">
    <!--Swiper轮播-->
    <swiper
      class="swiper"
      circular="true"
      autoplay="true"
      interval="5000"
      indicator-dots="true"
      indicator-active-color="rgba(143, 134, 86, 0.5)"
    >
      <swiper-item><img src="../Carousel/images/1.jpg" /></swiper-item>
      <swiper-item><img src="../Carousel/images/2.jpg" /></swiper-item>
    </swiper>
  </view>
</template>
<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
@Component({
  components: {},
})
export default class MonsterCaursel extends Vue {
  public CarouselImg() {
    uni.request({
      url: "http://localhost:81/MonsterCarouselinfo/Carousel.php",
      method: "GET",
      dataType: "json",
      success: (res) => {
        console.log(res);
      },
      fail: (res) => {
        console.error(res);
      },
    });
  }
  onLoad() {
    this.CarouselImg();
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>