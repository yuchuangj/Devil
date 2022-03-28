<template>
    <view class="indexBox">
        <monster-caursel></monster-caursel>
    </view>
</template>
<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import MonsterCaursel from './components/Caursel/index.vue';
@Component({
    components:{
        MonsterCaursel, //轮播组件
    }
})
export default class demonHome extends Vue{
    public title="完美"
}
</script>
<style lang="scss" scoped>
@import "./index.scss"
</style>
