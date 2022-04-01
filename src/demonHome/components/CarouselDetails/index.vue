<template>
  <view class="carousel-details-info">
    <view class="Carousel-title">
      <text>{{ datainfo[id].CarouselTitle }}</text>
    </view>
    <view class="Carousel-img">
      <img :src="datainfo[id].CarouselImage" />
    </view>
    <view class="Carousel-subtitle">
      <text>{{ datainfo[id].subTitle }}</text>
    </view>
    <view class="Carousel-Content-box">
      <text>{{ datainfo[id].BoldParagraph }}</text>
      <text>{{ datainfo[id].CarouselContent }}</text>
    </view>
    <view class="Carousel-Content-box2">
      <text>{{ datainfo[id].BoldParagraph2 }}</text>
      <text>{{ datainfo[id].CarouselContent2 }}</text>
    </view>
    <view class="Carousel-Content-box3">
      <text>{{ datainfo[id].BoldParagraph3 }}</text>
      <text>{{ datainfo[id].CarouselContent3 }}</text>
    </view>
    <view class="Carousel-Content-box4">
      <text>{{ datainfo[id].BoldParagraph4 }}</text>
      <text>{{ datainfo[id].CarouselContent4 }}</text>
    </view>
    <view class="Carouseltime">
      <text>{{ getNowDay(this.formateDate) }}</text>
    </view>
  </view>
</template>
<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
@Component({
  components: {},
})
export default class CarouselDetails extends Vue {
  //存储数据
  public datainfo: any = [];
  public id = 0;
  public formateDate=""

  //获取当前时间
  getNowDay(val:any) {
    const date = new Date(val);
    const year = date.getFullYear();
    const month = date.getMonth() + 1;
    const day = date.getDate();
    return `${year}-${month}-${day}`;
  }

  //请求数据
  async Myrequest() {
    const res = await this.$myRequest({
      url: "/MonsterCarouselinfo/CarouselDetails.php",
    });
    this.datainfo = res.data;
    const time=this.datainfo[this.id].CarouselTime;
    return this.formateDate=time;
  }

  mounted() {
    this.Myrequest();
  }

  onLoad(e: any) {
    this.id=e.id-1
  }
}
</script>

<style lang="scss">
@import "./index.scss";
</style>