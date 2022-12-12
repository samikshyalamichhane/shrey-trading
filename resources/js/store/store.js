import { createStore } from "vuex";
let cart = window.localStorage.getItem("cart");
let count = window.localStorage.getItem("count");

export default createStore({
  state: {
    products:null,
    cart: cart ? JSON.parse(cart) : [],
  cartItemCount: count ? JSON.parse(count) : 0,

  },
  actions:{
    addToCart: (context, payload) => {
      context.commit("ADDTOCART", payload);
    },
    removeFromCart: (context, items) => {
      context.commit("REMOVE_ITEMS", items);
    },
    clearCart: (context) => {
      console.log("clearing cart");
      context.commit("CLEAR_STATE");
    },
  },
  mutations: {
    //add product to cart ==================//
  ADDTOCART(state, payload) {
    let items = payload.items;
    let found = state.cart.find(
      (product) => product.id == items.id
    );
    if(found){
      if(found.qty !== items.qty){
        found.qty = items.qty;
      }
    }else{
      state.cart.push(items);
      state.cartItemCount++;
      this.commit("saveDataToLocalStorage");
    }
  },

  REMOVE_ITEMS(state, payload) {
    state.cart.splice(state.cart.indexOf(payload),1);
    state.cartItemCount--;
    this.commit("saveDataToLocalStorage");
  },

  CLEAR_STATE(state) {
    state.cart = [];
    state.cartItemCount = 0;
    this.commit("saveDataToLocalStorage");
  },

  saveDataToLocalStorage(state) {
    window.localStorage.setItem("cart", JSON.stringify(state.cart));
    window.localStorage.setItem("count", JSON.stringify(state.cartItemCount));
  },
  }
});