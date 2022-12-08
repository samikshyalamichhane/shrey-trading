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

  REMOVE_ITEMS(state, items) {
    console.log("clearing item");
    let item = state.cart.indexOf(items);
    state.cart.splice(item, 1);
    state.cartItemCount--;
    if (state.cartItemCount == 0) {
      state.vendorId = null;
    }
    this.commit("saveDataToLocalStorage");
  },

  saveDataToLocalStorage(state) {
    window.localStorage.setItem("cart", JSON.stringify(state.cart));
  },
  }
});