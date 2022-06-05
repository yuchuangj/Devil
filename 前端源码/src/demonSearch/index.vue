<!-- 搜索界面 -->
<template>
  <view class="search-box">
    <view class="search">
      <text>纪妖</text>
      <!-- 搜索上半部分 -->
      <view class="input-search" @click="jumpsearch">
        <input
          type="text"
          placeholder="点击搜索更多妖怪故事"
          disabled="disabled"
        />
        <view class="search-img">
          <img src="../demonSearch/images/search.png" />
        </view>
      </view>
    </view>
    <!-- 选项卡列表 -->
    <demon-list></demon-list>
  </view>
</template>
<script lang="ts">
import { Vue, Component } from "vue-property-decorator";
import demonList from "./components/demonList/index.vue";
@Component({
  components: {
    demonList, //选项卡列表
  },
})
export default class demonSeach extends Vue {
  // 跳转到搜索详细界面
  public jumpsearch() {
    uni.navigateTo({
      url: "components/search/index",
    });
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>