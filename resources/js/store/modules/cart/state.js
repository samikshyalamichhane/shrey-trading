let cart = window.localStorage.getItem("cart");

let count = window.localStorage.getItem("count");
export default {
  cart: cart ? JSON.parse(cart) : [],
  cartItemCount: count ? JSON.parse(count) : 0,
};
