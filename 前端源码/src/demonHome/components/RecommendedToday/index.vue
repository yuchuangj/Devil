<!-- 今日推荐 -->
<template>
  <view class="box">
    <view class="today">
      <text>{{ title }}</text>
      <view class="loginimg">
        <img mode="aspectFill" class="avatarImage" :src="avatar" @click="jumplogin" />
      </view>
    </view>
    <view class="todayContentBox" @click="jumpcalendarInfo(dateinfo[0].id)">
      <img :src="dateinfo[0].Img" />
      <view class="todayContentText">
        <text>{{ dateinfo[0].title }}</text
        ><br /><br />
        <text>{{ dateinfo[0].Content }}</text>
      </view>
    </view>
  </view>
</template>

<script lang="ts">
import { Component, Inject, Vue, Watch, Prop } from "vue-property-decorator";
@Component({
  components: {},
})
export default class RecommendedToday extends Vue {
  public title = "今日推荐";

  @Prop() public avatar!: string;
  public dateinfo = [];

  async RecommendedToday() {
    const res: any = await this.$myRequest({
      url: "/MonsterCarouselinfo/dateContent.php",
      method: "GET",
    });
    this.dateinfo = res.data.resultArr;
    console.log(this.dateinfo);
  }
  // 跳转到详情页
  public jumpcalendarInfo(id: number) {
    uni.navigateTo({
      url: "components/CalendarInfoDetails/index?id=" + id,
    });
  }

  mounted() {
    this.RecommendedToday();
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>


