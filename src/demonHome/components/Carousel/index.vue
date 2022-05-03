<!--首页轮播图 -->
<template>
  <view class="Carousel-box">
    <!-- Swiper轮播 -->
    <swiper
      class="swiper"
      circular="true"
      autoplay="true"
      interval="5000"
      indicator-dots="true"
      indicator-active-color="rgba(143, 134, 86, 0.5)"
    >
      <swiper-item v-for="item in SwiperInfo" :key="item.id">
        <img :src="item.image" @click="jumpCarouselText(item.id)" />
      </swiper-item>
    </swiper>
  </view>
</template>
<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
@Component({
  components: {},
})
export default class MonsterCaursel extends Vue {
  public SwiperInfo = [];
  // 请求图片数据
  async getSwiper() {
    const res:any = await this.$myRequest({
      url: "/MonsterCarouselinfo/Carousel.php",
      method:"GET"
    });
    this.SwiperInfo = res.data;
    console.log(this.SwiperInfo);
  }

  // 跳转页面
  public jumpCarouselText(id: number) {
    uni.navigateTo({
      url: "components/CarouselDetails/index?id=" + id,
    });
  }

  mounted() {
    this.getSwiper();
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>