import { createStore } from "vuex";

export default createStore({
  state: {
    searchList: null
  },
  actions:{
    setSearchList:({commit}) =>{
        commit('setSearchList',null);
      }
  },
  mutations: {
    setSearchList(state, item) {
        state.searchList = item;
    }
  }
});