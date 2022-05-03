<!-- 搜索选项卡 -->
<template>
  <view class="TabBox">
    <view class="Tab">
      <text
        v-for="(item, index) in tabtext"
        :key="item.index"
        @click="change(index)"
        :class="currentIndex === index ? 'active' : ''"
      >
        {{ item }}
      </text>
    </view>
    <!-- 第一个选项卡 -->
    <view v-if="currentIndex === 0">
      <ul class="monster-link-box">
        <li>热门搜索</li>
        <li v-for="item in monsterLink" :key="item.id">
          <text @click="jump(item.id)">{{ item.title }}</text>
        </li>
      </ul>
    </view>
    <view v-if="currentIndex === 1">
    </view>
  </view>
</template>
<script lang="ts">
import { Component, Prop, Vue, Emit } from "vue-property-decorator";
@Component({
  components: {},
})
export default class demonlist extends Vue {
  public tabtext: string[] = ["热门文章", "全部分类"];
  public currentIndex: number = 0;
  public monsterLink: any = [
    { title: "纪要使用手册", id: 1 },
    { title: "白泽特辑【一】的传说", id: 2 },
    { title: "红线盗盒", id: 3 },
    { title: "地羊鬼", id: 4 },
    { title: "罗浮蝴蝶", id: 4 },
  ];
  // 选项卡切换
  public change(index: number) {
    this.currentIndex = index;
    console.log(this.currentIndex);
  }  public jump(id:number){
    uni.navigateTo({
      url:"components/QueryResultDetails/index?id="+id,
      fail(e){
        console.log(e)
      }
    })
  }
}
</script>

<style lang="scss">
@import "./index.scss";
</style>