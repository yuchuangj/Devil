<!-- 这是搜索界面 -->
<template>
  <view class="box">
    <view class="input-search">
      <input
        type="search"
        placeholder="妖怪故事以及更多"
        v-model="queryString"
        @input="fetchQueryResult"
      />
      <view class="search-img">
        <img src="../../images/search.png" />
      </view>
    </view>
    <!-- 显示和隐藏图片 -->
    <view class="showimg" v-if="queryResult.length === 0">
      <img src="../../images/nodata.png" /><br />
      <text>暂无搜索结果</text>
    </view>
    <view v-else class="queryResult">
      <view
        v-for="item in queryResult"
        :key="item.id"
        @click="queryResultJump(item.id)"
      >
        <view class="query-data">
          <view class="query-img">
            <img :src="item.Img" />
          </view>
          <view class="query-text">
            <text>{{ item.title }}</text
            ><br />
            <text>{{ item.Content }}</text>
          </view>
        </view>
      </view>
    </view>
  </view>
</template>

<script lang="ts">
import { Vue, Component, Ref } from "vue-property-decorator";
@Component({
  components: {},
})
export default class search extends Vue {
  public queryString: string = "";
  public queryResult: object[] = [];

  async fetchQueryResult() {
    if (this.queryString === "") {
      this.queryResult = [];
      return;
    }
    const res = await this.$myRequest({
      url: "/MonsterCarouselinfo/dateContent.php",
      method: "GET",
      data: {
        queryString: this.queryString,
      },
    });
    this.queryResult = res.data.resultArr;
  }
  public queryResultJump(id: number) {
    uni.navigateTo({
      url: "../QueryResultDetails/index?id=" + id,
      fail(e) {
        console.log(e);
      },
    });
  }
}
</script>

<style lang="scss">
@import "./index.scss";
</style>
