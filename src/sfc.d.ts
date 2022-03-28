declare module "*.vue" {
    import Vue from 'vue'
    //是用来做一些第三方库没有支持ts的 
    declare module "vue/types/vue"{
        interface Vue{
            $store:any
        }
    }
    //导出export default Vue模块
    export default Vue
}