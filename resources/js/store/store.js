import { createStore } from "vuex";
let cart = window.localStorage.getItem("cart");
export default createStore({
  state: {
    products:null,
    cart: cart ? JSON.parse(cart) : [],
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
      this.commit("saveDataToLocalStorage");
    }
  },

  REMOVE_ITEMS(state, payload) {
    let item = state.cart.indexOf(payload);
    state.cart.splice(item, 1);
    this.commit("saveDataToLocalStorage");
    console.log('deleted')
  },

  CLEAR_STATE(state) {
    state.cart = [];
    this.commit("saveDataToLocalStorage");
  },

  saveDataToLocalStorage(state) {
    window.localStorage.setItem("cart", JSON.stringify(state.cart));
  },
  }
});