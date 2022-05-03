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
  </view>
</template>
<script lang="ts">
import { Vue, Component } from "vue-property-decorator";
@Component({
  components: {},
})
export default class RootDirectoryConent extends Vue {
  public datainfo: any = [];
  public fetchpage: number = 2;

  // 请求根目录内容页数据
  async datacallback(page: number = 1) {
    try {
      const res = await this.$myRequest({
        url: "/MonsterCarouselinfo/dateContent.php",
        method: "GET",
        data: {
          page: page,
        },
      });
      this.datainfo = res.data.resultArr;
      this.fetchpage = page;
    } catch (error) {
      console.log(error);
    }
  }
  created() {
    this.datacallback();
  }

  // 跳转到根目录内容详情页
  public jumpPage(id: number) {
    uni.navigateTo({
      url: "../RootDirectoryDetails/index?id=" + id,
    });
  }

  onLoad(e: any) {
    console.log(e);
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>
