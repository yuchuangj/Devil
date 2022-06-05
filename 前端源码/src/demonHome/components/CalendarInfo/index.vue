<!-- 日历信息内容 -->
<template>
  <view class="calendarInfoBox">
    <view class="calendar">
      <view v-for="(value, key) in refreshData" :key="key">
        <view class="datetimeBox">{{ key }}</view>
        <view
          v-for="item in value"
          :key="item.id"
          @click="jumpcalendarInfo(item.id)"
        >
          <view class="CalendarContent">
            <view class="CalendarText">
              <text class="CalendarTitle">{{ item.title }}</text
              ><br />
              <text>{{ item.Content }}</text>
            </view>
            <view class="CalendarImg">
              <img :src="item.Img" />
            </view>
          </view>
        </view>
      </view>
    </view>
  </view>
</template>
<script lang="ts">
import { Component, Vue, Prop } from "vue-property-decorator";
@Component({
  components: {},
})
export default class CalendarInfo extends Vue {

  // 接收父传过来的刷新数据
  @Prop() private refreshData: any;

  // 跳转到详情页
  public jumpcalendarInfo(id:number) {
    uni.navigateTo({
      url: "components/CalendarInfoDetails/index?id="+id
    });
  }
  mounted() {
    // 打印传过来的数据
    console.log(this.refreshData);
  }
}
</script>


<style lang="scss">
@import "./index";
</style>