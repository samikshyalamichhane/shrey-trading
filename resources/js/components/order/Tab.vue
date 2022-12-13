<template>
  <div class="row newcartlist">
    <div class="col-sm-12" id="table-tabs">
      <div class="samebg">
        <div id="tabs" class="container">
          <div class="tabs">
            <a
              v-on:click="activetab = '1'"
              v-bind:class="[activetab === '1' ? 'active' : '']"
              >My Products</a
            >
            <a
              v-on:click="activetab = '2'"
              v-bind:class="[activetab === '2' ? 'active' : '']"
              >All Products</a
            >
            <a
              v-on:click="activetab = '3'"
              v-bind:class="[activetab === '3' ? 'active' : '']"
              >Cart
              <b class="cart-badge">{{ this.$store.state.cartItemCount }}</b>
            </a>
            <a v-if="activetab !== '3'">
              <div class="box m-form">
                <div class="control is-grouped">
                  <p class="control is-expanded">
                    <input
                      class="input"
                      v-model="searchItem"
                      v-on:keyup="searchInTheList(searchItem)"
                      type="text"
                      placeholder="Search ...."
                    />
                    <span class="help is-dark"
                      ><strong>{{ filteredItems.length | numeral }}</strong> of
                      {{ items.length | numeral }} product found</span
                    >
                  </p>

                  <p class="control">
                    <a
                      class="button is-info"
                      v-on:click="clearSearchItem"
                      v-bind:class="{ 'is-disabled': searchItem == '' }"
                    >
                      Clear
                    </a>
                  </p>
                </div>
              </div></a
            >
          </div>

          <div class="content">
            <div v-if="activetab === '1'" class="tabcontent">
              <div class="row">
                <div class="col-md-8 ibox-body">
                  <div class="container tab-content" style="overflow-x: auto">
                    <div class="m-table">
                      <table class="table is-bordered is-striped is-narrow">
                        <tr>
                          <th class="m-table-index">#</th>
                          <th>Product</th>
                          <th>Code</th>
                          <th>Quantity</th>
                        </tr>
                        <tr v-if="!filteredItems">
                          <td colspan="8">You do not have any data yet.</td>
                        </tr>
                        <tr v-for="(item, index) in filteredItems" :key="index">
                          <td>{{ index + 1 }}</td>
                          <td>{{ item.name }}</td>
                          <td>{{ item.code }}</td>
                          <td>
                            <div class="cart_list">
                              <div class="qty-wrapper">
                                <div class="number">
                                  <span
                                    class="minus"
                                    @click="decrement(item)"
                                    v-bind:class="{
                                      'is-disabled': item.qty == 0,
                                    }"
                                    >-</span
                                  >
                                  <input
                                    type="text"
                                    class="quantity"
                                    :id="item.id"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    v-model.number="item.qty"
                                    placeholder="Enter Qty"
                                    autocomplete="off"
                                  />
                                  <span class="plus" @click="increment(item)"
                                    >+</span
                                  >
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><strong>Order Note</strong></label>
                    <textarea
                      name="order_note"
                      id="order_note"
                      rows="5"
                      placeholder="Order Note Here"
                      class="form-control"
                      v-model="order_note"
                      style="resize: none"
                    ></textarea>
                  </div>
                  <button
                    class="btn btn-sm btn-success"
                    @click="submit"
                    type="submit"
                  >
                    Submit Order
                  </button>
                </div>
              </div>
            </div>
            <div v-if="activetab === '2'" class="tabcontent">
              <div class="row">
                <div class="col-md-8 ibox-body">
                  <div class="container tab-content" style="overflow-x: auto">
                    <div class="m-table">
                      <table class="table is-bordered is-striped is-narrow">
                        <tr>
                          <th class="m-table-index">#</th>
                          <th>Product</th>
                          <th>Code</th>
                          <th>Quantity</th>
                        </tr>
                        <tr v-if="!filteredItems">
                          <td colspan="8">You do not have any data yet.</td>
                        </tr>
                        <tr v-for="(item, index) in filteredItems" :key="index">
                          <td>{{ index + 1 }}</td>
                          <td>{{ item.name }}</td>
                          <td>{{ item.code }}</td>
                          <td>
                            <div class="cart_list">
                              <div class="qty-wrapper">
                                <div class="number">
                                  <span
                                    class="minus is-disabled"
                                    @click="decrement(item)"
                                    v-bind:class="{
                                      'is-disabled': item.qty == 0,
                                    }">-</span
                                  >
                                  <input
                                    type="text"
                                    class="quantity"
                                    :id="item.id"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    v-model.number="item.qty"
                                    placeholder="Enter Qty"
                                    autocomplete="off"
                                  />
                                  <span class="plus" @click="increment(item)"
                                    >+</span
                                  >
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><strong>Order Note</strong></label>
                    <textarea
                      name="order_note"
                      id="order_note"
                      rows="5"
                      placeholder="Order Note Here"
                      class="form-control"
                      v-model="order_note"
                      style="resize: none"
                    ></textarea>
                  </div>
                  <button
                    class="btn btn-sm btn-success"
                    @click="submit"
                    type="submit"
                  >
                    Submit Order
                  </button>
                </div>
              </div>
            </div>
            <div v-if="activetab === '3'" class="tabcontent">
              <div class="row">
                <div class="col-md-8 ibox-body">
                  <div class="container tab-content" style="overflow-x: auto">
                    <div class="m-table">
                      <table class="table is-bordered is-striped is-narrow">
                        <tr>
                          <th class="m-table-index">#</th>
                          <th>Product</th>
                          <th>Code</th>
                          <th>Quantity</th>
                          <th>Remove</th>
                        </tr>
                        <tr v-if="this.$store.state.cart.length < 1">
                          <td colspan="8">You do not have any data yet.</td>
                        </tr>
                        <tr
                          v-for="(cartItem, index) in this.$store.state.cart"
                          :key="index"
                        >
                          <td>{{ index + 1 }}</td>
                          <td>{{ cartItem.name }}</td>
                          <td>{{ cartItem.code }}</td>
                          <td>
                            <div class="cart_list">
                              <div class="qty-wrapper">
                                <div class="number">
                                  <span
                                    class="minus"
                                    @click="decrement(cartItem)"
                                    v-bind:class="{
                                      'is-disabled': cartItem.qty == 0,
                                    }">-</span
                                  >
                                  <input
                                    type="text"
                                    class="quantity"
                                    :id="cartItem.id"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    v-model.number="cartItem.qty"
                                    placeholder="Enter Qty"
                                    autocomplete="off"
                                  />
                                  <span
                                    class="plus"
                                    @click="increment(cartItem)"
                                    >+</span
                                  >
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="text-right">
                            <button
                              type="button"
                              v-on:click="removeItem(cartItem)"
                              class="btn btn-danger btn-sm"
                            >
                              <i class="fa fa-times"></i>
                            </button>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <hr />
                    <button
                      class="btn"
                      @click="clearAll"
                      v-if="this.$store.state.cart.length > 0"
                    >
                      Clear Cart
                    </button>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><strong>Order Note</strong></label>
                    <textarea
                      name="order_note"
                      id="order_note"
                      rows="5"
                      placeholder="Order Note Here"
                      class="form-control"
                      v-model="order_note"
                      style="resize: none"
                    ></textarea>
                  </div>
                  <button
                    class="btn btn-sm btn-success"
                    @click="submit"
                    type="submit"
                  >
                    Submit Order
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!---Order list Modal-->
        <div
          class="modal fade show modal-overlay"
          id="modal-lg"
          aria-modal="true"
          role="dialog"
          style="padding-right: 17px; display: block"
          v-if="showModal"
        >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <span class="modal-title"> Your Order list!</span>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                  @click="showModal = false"
                >
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- end order detail table -->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header">My Others</div>
                          <div class="card-body">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Code</th>
                                  <th scope="col">Price</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Total Price</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr
                                  v-for="(data, index) in this.$store.state
                                    .cart"
                                  :key="index"
                                >
                                  <th scope="row">{{ index + 1 }}</th>
                                  <td>{{ data.name }}</td>
                                  <td>{{ data.code }}</td>
                                  <td>{{ data.price }}</td>
                                  <td>{{ data.qty }}</td>
                                  <td>
                                    {{
                                      $helpers.formattedPrice(
                                        data.qty * data.price
                                      )
                                    }}/-
                                  </td>
                                </tr>
                                <tr class="card-header">
                                  <th><strong>Total Cost</strong></th>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <th colspan="2">
                                    <span id="total_cost">{{
                                      $helpers.formattedPrice(totalPrice)
                                    }}</span
                                    >/-
                                  </th>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button
                  type="button"
                  class="btn btn-default"
                  @click="showModal = false"
                >
                  Back
                </button>
                <button
                  type="button"
                  class="btn btn-default"
                  @click="cancelOrder()"
                >
                  Cancel
                </button>
                <button
                  type="button"
                  class="btn btn-primary"
                  @click="
                    submitData();
                    showModal = false;
                  "
                >
                  Submit Order
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["myproducts", "products"],
  data() {
    return {
      showModal: false,
      activetab: "1",
      searchItem: "",
      items: [],
      filteredItems: [],
      order_note: "",
    };
  },
  created() {
    this.items = this.myproducts;
    this.filteredItems = this.items;
  },
  watch: {
    activetab: function (value) {
      if (value === "1") {
        this.items = this.myproducts;
        this.clearSearchItem();
      }
      if (value === "2") {
        this.items = this.products;
        this.clearSearchItem();
      }
      if (value === "3") {
        this.clearSearchItem();
      }
    },
    items: {
      handler: function () {
        this.filteredItems.forEach((element) => {
          if (element.qty > 0) {
            let payload = {
              items: element,
            };
            this.$store.dispatch("addToCart", payload);
          }
        });
      },
      deep: true,
    },
  },
  computed: {
    totalPrice() {
      let totalPrice = 0;
      this.$store.state.cart.forEach((item) => {
        totalPrice += item.qty * item.price;
      });
      return parseInt(totalPrice);
    },
  },
  methods: {
    clearSearchItem() {
      this.searchItem = undefined;
      this.searchInTheList("");
    },
    searchInTheList(searchText, currentPage) {
      if (_.isUndefined(searchText)) {
        this.filteredItems = _.filter(this.items, function (v, k) {
          return !v.selected;
        });
      } else {
        this.filteredItems = _.filter(this.items, function (v, k) {
          return (
            !v.selected &&
            v.name.toLowerCase().indexOf(searchText.toLowerCase()) > -1
          );
        });
      }
      this.filteredItems.forEach(function (v, k) {
        v.key = k + 1;
      });
    },
    increment(item) {
      let found = this.items.find((product) => {
        if (product.id == item.id) {
          return product;
        }
      });
      if (found) {
        found.qty++;
      } else {
        this.$toast.error(`Please select item first!`);
      }
    },
    decrement(item) {
      let found = this.items.find((product) => {
        if (product.id == item.id) {
          return product;
        }
      });
      if (found) {
        if (found.qty === 0) {
          this.$toast.error(`Negative quantity not allowed`);
        } else {
          found.qty--;
        }
      } else {
        this.$toast.error(`Please select item first!`);
      }
    },
    cancelOrder() {
      this.$store.dispatch("clearCart");
      this.filteredItems.forEach((element) => {
        element.qty = 0;
      });
      this.showModal = false;
    },
    async submitData() {
      let loader = this.$loading.show({
        isFullPage: true,
        loader: "dots",
        opacity: 0.7,
      });
      const response = await axios.post(`/carts/submit-order`, {
        products: this.$store.state.cart,
        order_note: this.order_note,
      });
      if (response.status == 200) {
        loader.hide();
        this.showModal = false;
        this.$store.dispatch("clearCart");
        this.filteredItems.forEach((element) => {
          element.qty = 0;
        });
        this.$swal(
          "Order submited!",
          `Dear : ${response.data.client.name} 
        Your Order is successfully created! Thank you.`,
          "Success"
        );
      } else {
        loader.hide();
        this.$swal("Faild!", "Somthing went wrong! Please try again.", "error");
      }
    },
    submit() {
      if (this.$store.state.cart.length > 0) {
        this.showModal = true;
      } else {
        this.$swal("Faild!", "Please add some quantity first.", "error");
      }
    },
    removeItem(cartItem) {
      let payload = cartItem;
      this.filteredItems.forEach((element) => {
        if (cartItem.id == element.id) {
          element.qty = 0;
        }
      });
      this.$store.dispatch("removeFromCart", payload);
    },
    clearAll() {
      this.filteredItems.forEach((element) => {
        element.qty = 0;
      });
      this.$store.dispatch("clearCart");
    },
  },
};
</script>
<style>
.minus.is-disabled,
.minus[disabled] {
  background-color: #f5f5f5;
  border-color: #dbdbdb;
  cursor: not-allowed;
  pointer-events: none;
  opacity: 0.5;
}
.sticky {
  position: fixed;
  top: 58px;
  width: 80%;
  transition: 0.4s;
  z-index: 8;
}
.tab-content {
  overflow-y: scroll;
  max-height: 700px;
}
</style>