import Vue from 'vue';
import Vuex from 'vuex';
import { UserAccountPayload } from '@/store/authorize'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        account: {
            username: "",
            token: "",
            avatar: "",
        }
    },
    getters: {
        getUserName(state): string {
            return state.account.username
        },
        getUserAvatar(state): string {
            return state.account.avatar
        },
        getUserToken(state): string {
            return state.account.token
        },
        // 登录权限
        getLoginPermission(state): boolean {
            return state.account.username !== undefined && state.account.username !== null && state.account.username !== ''
        }
    },
    mutations: {
        // 更新账号状态
        updateAccountState(state, payload: UserAccountPayload) {
            state.account.username = payload.username
            state.account.token = payload.token
            state.account.avatar = payload.avatar
            uni.setStorageSync("account", state.account)
            console.log(payload)
        },
        // 退出账号
        logoutCurrentAccount(state) {
            state.account.username = '';
            state.account.token = '';
            state.account.avatar = '';
            uni.setStorageSync("account", null);
        }
    }

})
export default store
