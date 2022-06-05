<!-- 登录界面 -->
<template>
  <view class="login">
    <view class="loginBox" v-if="!logged">
      <!-- 登录头像 -->
      <view class="avatar">
        <img :src="avatar" />
      </view>
      <view class="login-info">
        <text>注册登录</text>
        <input
          type="text"
          placeholder="请输入账号"
          class="account"
          v-model="username"
        />
        <view class="underscore"></view>
        <input
          type="password"
          placeholder="请输入密码"
          class="password"
          v-model="password"
        />
        <view class="underscore"></view>
        <button
          class="submit"
          :class="{ active: !disabledButton }"
          :disabled="disabledButton"
          @click="login"
        >
          登录/注册
        </button>
        <!-- 单选按钮 -->
        <view class="checkbox">
          <checkbox
            @click="eventDisabledButton"
            value="!disabledButton"
            :checked="!disabledButton"
          >
          </checkbox>
          已阅读并同意<text>《用户协议》</text>
        </view>
        <view class="wxuser">
          <text>第三方账号登录</text><br />
          <view class="imageBox">
            <img src="../demonLogins/images/wx.png" />
          </view>
        </view>
      </view>
    </view>
    <login-success v-else />
  </view>
</template>
<script lang="ts">
import { Vue, Component } from "vue-property-decorator";
import { UserAccountPayload } from "@/store/authorize";
import loginSuccess from "@/demonLogins/components/loginSuccess/index.vue";

@Component({
  components: {
    loginSuccess,
  },
})
export default class demonLogins extends Vue {
  public disabledButton: boolean = true;
  public logged: boolean = false;
  public username: string = "";
  public password: string = "";
  public token: string = "";
  public avatar: string = require("../demonLogins/images/avatar.png");

  // 单选按钮禁用
  public eventDisabledButton() {
    this.disabledButton = !this.disabledButton;
  }
  onShow() {
    this.logged = this.$store.getters.getLoginPermission;
  }
  // 登录按钮
  public login() {
    if (this.username == "" || this.password == "") {
      uni.showToast({
        title: "账号密码不能为空",
        icon: "none",
      });
    } else if (this.username == "admin" && this.password == "123") {
      uni.showToast({
        title: "登录成功",
        icon: "none",
      });
      this.$store.commit("updateAccountState", {
        username: this.username,
        token: this.token,
        avatar: this.avatar,
      });
      uni.switchTab({
        url: "/demonLogins/index"
      });
      this.username = "";
      this.password = "";
      this.logged = true;
      this.disabledButton = true;
    } else {
      uni.showToast({
        title: "账号密码错误",
        icon: "none",
      });
    }
  }
}
</script>
<style lang="scss">
@import "./index.scss";
</style>