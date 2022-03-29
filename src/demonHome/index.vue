<template>
    <view class="indexBox">
        <monster-caursel></monster-caursel>
        <recommended-today></recommended-today>
    </view>
</template>
<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import MonsterCaursel from './components/Carousel/index.vue';
import RecommendedToday from './components/RecommendedToday/index.vue'

@Component({
    components:{
        MonsterCaursel, //轮播组件
        RecommendedToday, //今日推荐
    }
})
export default class demonHome extends Vue{
    public title="完美"
}
</script>
<style lang="scss">
@import "./index.scss"
</style>
