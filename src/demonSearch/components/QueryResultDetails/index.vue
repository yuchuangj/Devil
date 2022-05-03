<!-- 查询内容详情页面  -->
<template>
  <view class="calendar-info-box">
    <view class="calendar-caption">
      <text>{{ datainfo[id].caption }}</text>
    </view>
    <view class="calendar-content">
      <text>{{ datainfo[id].content }}</text>
      <text>{{ datainfo[id].content2 }}</text>
    </view>
    <view class="related-literature">
      {{ relatedLiteratureName }}
    </view>
    <view class="calendar-subtitle">
      <text>{{ `《${datainfo[id].subtitle}》` }}</text>
    </view>
    <view class="calendar-content">
      <text>{{ datainfo[id].content3 }}</text>
    </view>
    <view class="calendar-subtitle">
      <text>{{ `《${datainfo[id].subtitle2}》` }}</text>
    </view>
    <view class="calendar-content">
      <text>{{ datainfo[id].content2 }}</text>
    </view>
    <view class="calendar-author">
      <text>{{ `${author}：${datainfo[id].author}` }}</text>
      <text>{{ datainfo[id].time }}</text>
    </view>
    <view class="related-sticky-notes">
      <text v-for="item in label" :key="item"> {{ `${item}` }}</text>
    </view>
    <!-- 分隔线 -->
    <view class="separation-line"></view>
    <view class="no-comment">
      <img src="../../images/nocomment.png" />
      <text>还没有人发表评论</text>
    </view>
    <view class="calendar-comment">
      <input class="input-comment" type="text" placeholder="说点什么吧">
      <input class="input-submit" type="submit" value="发送" disabled="disabled">
    </view>
  </view>
</template>
<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
@Component({
  components: {},
})
export default class CalendarInfoDetails extends Vue {
  public id: number = 0;
  public relatedLiteratureName: string = "相关文献";
  public author: string = "作者";
  public label: any = ["与人混居", "鬼", "才学", "三国", "中国"];
  public datainfo: any = [];

  // 请求查询内容详情页数据
  async contentData() {
    try {
      const res = await this.$myRequest({
        url: "/MonsterCarouselinfo/calendardetails.php",
        method: "GET",
      });
      this.datainfo = res.data;
    } catch (error) {
      console.log(error);
    }
  }
  onLoad(e: any) {
    this.id = e.id - 1;
    console.log(this.id);
  }
  mounted() {
    this.contentData();
  }
}
</script>
<style lang="scss">
@import "./index";
</style>
