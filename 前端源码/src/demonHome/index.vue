<template>
  <view class="indexBox">
    <monster-caursel />
    <recommended-today :avatar="avatar" />
    <calendar-info :refreshData="calendarInfoData" />
  </view>
</template>
<script lang="ts">
import { Component, Provide, Vue } from "vue-property-decorator";
import MonsterCaursel from "./components/Carousel/index.vue";
import RecommendedToday from "./components/RecommendedToday/index.vue";
import CalendarInfo from "./components/CalendarInfo/index.vue";

@Component({
  components: {
    MonsterCaursel, // 首页轮播
    RecommendedToday, // 今日推荐
    CalendarInfo, // 日历内容
  },
})
export default class demonHome extends Vue {
  public calendarInfoData: any = {};
  public fetchPage: number = -1;
  public fetchPageLimit: number = -1;
  public avatar: string = '';

  public onShow() {
    this.avatar = this.$store.getters.getUserAvatar;
  }

  // 请求日历内容数据
  async fetchCalendarInfo(page: number = 0) {
    const res = await this.$myRequest({
      url: "/MonsterCarouselinfo/dateContent.php",
      method: "GET",
      data: {
        page: page,
      },
    });
    this.fetchPageLimit = res.data.maxPage;
    this.fetchPage = page;
    res.data.resultArr.forEach((item: any) => {
      const date = new Date(item.time);
      const hex = `${date.getMonth() + 1}月${date.getDate()}日`;
      if (!this.calendarInfoData.hasOwnProperty(hex)) {
        this.calendarInfoData[hex] = [];
      }
      this.calendarInfoData[hex].push(item);
    });
  }

  // 下拉刷新
  onPullDownRefresh() {
    try {
      uni.showLoading({
        title: "加载中",
      });
      setTimeout(() => {
        this.fetchCalendarInfo();
        uni.hideLoading();
        uni.showToast({
          title: "加载成功",
        });
        uni.stopPullDownRefresh();
      }, 1000);
    } catch {
      uni.showModal({
        title: "数据加载失败",
      });
    }
  }
  // 上拉加载
  onReachBottom() {
    if (this.fetchPage >= this.fetchPageLimit) {
      uni.showToast({
        title: "已经加载到底",
        icon: "none",
      });
    }
    this.fetchCalendarInfo(this.fetchPage + 1);
  }
  mounted() {
    this.fetchCalendarInfo();
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>
