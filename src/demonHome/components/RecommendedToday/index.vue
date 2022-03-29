<template>
  <view class="todayBox">
      <text>{{title}}</text>
  </view>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
@Component({
  components: {},
})
export default class RecommendedToday extends Vue {
    public title="今日推荐"
}
</script>
<style lang="scss">
@import "./index.scss";
</style>


