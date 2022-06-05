<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  mpType: "app",
  onLaunch() {
    let account = uni.getStorageSync("account");
    if (account !== null && account !== undefined) {
      this.$store.commit("updateAccountState", {
        username: account.username,
        token: account.token,
        avatar: account.avatar,
      });
    }
  },
  onShow() {
    console.log("App Show");
  },
  onHide() {
    console.log("App Hide");
  },
});
</script>

<style>
/*每个页面公共css */
</style>
