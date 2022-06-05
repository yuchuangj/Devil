<!-- 知妖妖薄 -->
<template>
  <view>
      <demon-root-directory></demon-root-directory>
  </view>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import DemonRootDirectory from './components/DemonRootDirectory/index.vue';

@Component({
    components:{
         DemonRootDirectory,  // 知妖根目录
    }
})
export default class demonThin extends Vue{

}
</script>

<style lang="scss">
@import "./index.scss";
</style>