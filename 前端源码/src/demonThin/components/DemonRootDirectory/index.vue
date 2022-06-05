<!-- 知妖根目录 -->
<template>
  <view>
    <view
      class="root-directory-box"
      v-for="item in rootdirectorydata"
      :key="item.id"
      @click="jumpevent(item.method)"
    >
      <view class="root-directory-text">
        <text>{{ item.title }}</text
        ><br />
        <text>{{ item.subtitle }}</text>
      </view>
      <view class="root-directory-img">
        <img :src="item.img" />
      </view>
    </view>
  </view>
</template>
<script lang="ts">
import { Vue, Component } from "vue-property-decorator";
@Component({
  components: {},
})
export default class DemonRootDirectory extends Vue {
  // 定义根目录数据
  public rootdirectorydata: any = [
    {
      id: 1,
      title: "百妖",
      subtitle: "妖怪百科全书",
      img: require("../../images/lovebirds.png"),
      method:"item1"
    },
    {
      id: 2,
      title: "杂谈",
      subtitle: "妖怪研究所",
      img: require("../../images/research.png"),
      method:"item2"
    },
    {
      id: 3,
      title: "夜谭",
      subtitle: "妖怪的同人创作",
      img: require("../../images/lights.png"),
      method:"item3"
    },
  ];

  // 定义v-for不同事件
  public jumpevent(methods:any){
    const that:any=this;
    that[methods]();
  }

  // 跳转到根目录内容不同详情页
  public item1(){
    uni.navigateTo({
      url:"components/RootDirectoryContentOne/index"
    })
  }
  public item2(){
    uni.navigateTo({
      url:"components/RootDirectoryContentTwo/index"
    })
  }
  public item3(){
    uni.navigateTo({
      url:"components/RootDirectoryContentThree/index"
    })
  }
}
</script>

<style lang="scss">
@import "./index.scss";
</style>