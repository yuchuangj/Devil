<!-- 成功登录界面 -->
<template>
  <view class="login-box">
    <view>{{ logged ? "" : "未登录" }}</view>
    <view class="avatar">
      <img :src="avatar" />
    </view>
    <view class="username">
      <text>{{ username }}</text>
    </view>
    <text class="logout" @click="logout">退出登录</text><br>
    <text class="title">纪妖V1.0.0</text>
    <view class="protocol">
      <text>用户使用协议</text>
      <text>隐私协议</text>
    </view>
  </view>
</template>

<script lang="ts">
import { Vue, Component } from "vue-property-decorator";
@Component({
  components: {},
})
export default class loginSuccess extends Vue {
  public username: string = "";
  public avatar: string = "";
  public logged: boolean = false;

  public mounted() {
    this.logged = this.$store.getters.getLoginPermission;
    if (this.$store.getters.getUserName) {
      this.username = this.$store.getters.getUserName;
      this.avatar = this.$store.getters.getUserAvatar;
    } else {
      this.username = "需要完成登录";
    }
  }

  public logout() {
    this.$store.commit("logoutCurrentAccount");
    if (getCurrentPages().length === 1) {
      uni.switchTab({
        url: "/demonHome/index",
      });
    } else {
      uni.navigateBack({});
    }
  }
}
</script>

<style lang="scss">
@import "./index.scss";
</style>