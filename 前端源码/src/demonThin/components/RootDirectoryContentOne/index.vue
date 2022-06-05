<!-- 根目录内容页 -->
<template>
  <view class="content-box">
    <view
      class="content"
      v-for="item in datainfo"
      :key="item.id"
      @click="jumpPage(item.id)"
    >
      <view class="textbox">
        <text>{{ item.title }}</text
        ><br />
        <text>{{ item.Content }}</text>
      </view>
      <view class="imgbox">
        <img :src="item.Img" />
      </view>
    </view>
    <view class="scroll-top" @click="Scrolltop" ref="ScrollTop">
      <img src="../../images/ScrollTop.png" />
    </view>
  </view>
</template>
<script lang="ts">
import { Vue, Component,Ref } from "vue-property-decorator";
@Component({
  components: {},
})
export default class RootDirectoryConent extends Vue {
  public datainfo: any = [];
  public fetchPage: number = -1;
  public fetchPagelimit: number = -1;

  // 请求根目录内容页数据
  async datacallback(page: number = 0) {
    try {
      const res = await this.$myRequest({
        url: "/MonsterCarouselinfo/dateContent.php",
        method: "GET",
        data: {
          page: page,
        },
      });
      this.datainfo.push(...res.data.resultArr);
      this.fetchPagelimit = res.data.maxPage;
      this.fetchPage = page;
    } catch (error) {
      console.log(error);
    }
  }
  created() {
    this.datacallback();
  }
  // 获取滚动节点
  @Ref() readonly ScrollTop!:HTMLDivElement

  mounted(){
  }

  Scrolltop() {
    uni.pageScrollTo({
      duration: 2000,
      scrollTop: 0,
    });
  }

  // 上拉加载
  onReachBottom() {
    if (this.fetchPage >= this.fetchPagelimit) {
      uni.showToast({
        title: "已经加载到底",
        icon: "none",
      });
    }
    this.datacallback(this.fetchPage + 1);
  }

  // 跳转到根目录内容详情页
  public jumpPage(id: number) {
    uni.navigateTo({
      url: "../RootDirectoryDetails/index?id=" + id,
    });
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>
