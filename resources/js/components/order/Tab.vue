<template>
  <div id="tabs" class="container">
    <div class="info" v-if="this.$store.state.cart.length > 0">
      Note : You have {{this.$store.state.cart.length}} products in your whishlist! Please check Recently Added Products.</div>
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
        >My Collection</a
      >
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
            <div class="container" style="overflow-x: auto">
              <div class="m-table">
                <table class="table is-bordered is-striped is-narrow">
                  <tr>
                    <th class="m-table-index">#</th>
                    <th>Product</th>
                    <th>Code</th>
                    <th>Quantity</th>
                  </tr>
                  <tr v-if="!paginatedItems">
                    <td colspan="8">You do not have any data yet.</td>
                  </tr>
                  <tr v-for="(item, index) in paginatedItems" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.code }}</td>
                    <td>
                      <div class="cart_list">
                        <div class="qty-wrapper">
                          <div class="number">
                            <span class="minus" @click="decrement(item)"
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
                            <span class="plus" @click="increment(item)">+</span>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <hr />
              <nav class="pagination m-pagination">
                <a
                  class="button"
                  v-on:click="selectPage(this.pagination.currentPage - 1)"
                  v-bind:class="{
                    'is-disabled':
                      this.pagination.currentPage == this.pagination.items[0] ||
                      this.pagination.items.length == 0,
                  }"
                  >Previous</a
                >
                <a
                  class="button"
                  v-on:click="selectPage(this.pagination.currentPage + 1)"
                  v-bind:class="{
                    'is-disabled':
                      this.pagination.currentPage ==
                        this.pagination.items[
                          this.pagination.items.length - 1
                        ] || this.pagination.items.length == 0,
                  }"
                  >Next page</a
                >
                <ul>
                  <li>
                    <a
                      class="button"
                      v-on:click="selectPage(pagination.items[0])"
                      v-bind:class="{
                        'is-disabled':
                          this.pagination.currentPage ==
                            this.pagination.items[0] ||
                          this.pagination.items.length == 0,
                      }"
                    >
                      First
                    </a>
                  </li>
                  <li class="is-space"></li>
                  <li v-for="item in pagination.filteredItems">
                    <a
                      class="button"
                      v-on:click="selectPage(item)"
                      v-bind:class="{
                        'is-info': item == pagination.currentPage,
                      }"
                      >{{ item | numeral }}</a
                    >
                  </li>
                  <li class="is-space"></li>
                  <li>
                    <a
                      class="button"
                      v-on:click="
                        selectPage(
                          pagination.items[pagination.items.length - 1]
                        )
                      "
                      v-bind:class="{
                        'is-disabled':
                          this.pagination.currentPage ==
                            this.pagination.items[
                              this.pagination.items.length - 1
                            ] || this.pagination.items.length == 0,
                      }"
                    >
                      Last
                    </a>
                  </li>
                </ul>
              </nav>
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
            <div class="container" style="overflow-x: auto">
              <div class="m-table">
                <table class="table is-bordered is-striped is-narrow">
                  <tr>
                    <th class="m-table-index">#</th>
                    <th>Product</th>
                    <th>Code</th>
                    <th>Quantity</th>
                  </tr>
                  <tr v-if="!paginatedItems">
                    <td colspan="8">You do not have any data yet.</td>
                  </tr>
                  <tr v-for="(item, index) in paginatedItems" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.code }}</td>
                    <td>
                      <div class="cart_list">
                        <div class="qty-wrapper">
                          <div class="number">
                            <span class="minus" @click="decrement(item)"
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
                            <span class="plus" @click="increment(item)">+</span>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
              <hr />
              <nav class="pagination m-pagination">
                <a
                  class="button"
                  v-on:click="selectPage(this.pagination.currentPage - 1)"
                  v-bind:class="{
                    'is-disabled':
                      this.pagination.currentPage == this.pagination.items[0] ||
                      this.pagination.items.length == 0,
                  }"
                  >Previous</a
                >
                <a
                  class="button"
                  v-on:click="selectPage(this.pagination.currentPage + 1)"
                  v-bind:class="{
                    'is-disabled':
                      this.pagination.currentPage ==
                        this.pagination.items[
                          this.pagination.items.length - 1
                        ] || this.pagination.items.length == 0,
                  }"
                  >Next page</a
                >
                <ul>
                  <li>
                    <a
                      class="button"
                      v-on:click="selectPage(pagination.items[0])"
                      v-bind:class="{
                        'is-disabled':
                          this.pagination.currentPage ==
                            this.pagination.items[0] ||
                          this.pagination.items.length == 0,
                      }"
                    >
                      First
                    </a>
                  </li>
                  <li class="is-space"></li>
                  <li v-for="item in pagination.filteredItems">
                    <a
                      class="button"
                      v-on:click="selectPage(item)"
                      v-bind:class="{
                        'is-info': item == pagination.currentPage,
                      }"
                      >{{ item | numeral }}</a
                    >
                  </li>
                  <li class="is-space"></li>
                  <li>
                    <a
                      class="button"
                      v-on:click="
                        selectPage(
                          pagination.items[pagination.items.length - 1]
                        )
                      "
                      v-bind:class="{
                        'is-disabled':
                          this.pagination.currentPage ==
                            this.pagination.items[
                              this.pagination.items.length - 1
                            ] || this.pagination.items.length == 0,
                      }"
                    >
                      Last
                    </a>
                  </li>
                </ul>
              </nav>
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
            <div class="container" style="overflow-x: auto">
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
                            <span class="minus" @click="decrement(cartItem)"
                              >-</span
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
                            <span class="plus" @click="increment(cartItem)"
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
                            v-for="(data, index) in this.$store.state.cart"
                            :key="index"
                          >
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ data.name }}</td>
                            <td>{{ data.code }}</td>
                            <td>{{ data.price }}</td>
                            <td>{{ data.qty }}</td>
                            <td>
                              {{
                                $helpers.formattedPrice(data.qty * data.price)
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
                              }}</span>/-
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
</template>
<script>
// import Modal from "./Modal.vue";

export default {
  props: ["myproducts", "products"],
  // components: { Modal },

  data() {
    return {
      showModal: false,
      activetab: "1",
      searchItem: "",
      items: [],
      filteredItems: [],
      paginatedItems: [],
      selectedItems: [],
      order_note: "",
      pagination: {
        range: 5,
        currentPage: 1,
        itemPerPage: 8,
        items: [],
        filteredItems: [],
      },
    };
  },
  created() {
    this.items = this.myproducts;
    this.filteredItems = this.items;
    this.buildPagination();
    this.selectPage(1);
  },
  watch: {
    activetab: function (value) {
      if (value === "1") {
        this.items = this.myproducts;
        // this.filteredItems = this.items;
        this.buildPagination();
        this.selectPage(1);
        this.clearSearchItem();
      }
      if (value === "2") {
        this.items = this.products;
        // this.filteredItems = this.items;
        this.buildPagination();
        this.selectPage(1);
        this.clearSearchItem();
      }
      if (value === "3") {
        this.buildPagination();
        this.selectPage(1);
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
      totalPrice += (item.qty * item.price);
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

      this.buildPagination();

      if (_.isUndefined(currentPage)) {
        this.selectPage(1);
      } else {
        this.selectPage(currentPage);
      }
    },
    buildPagination() {
      let numberOfPage = Math.ceil(
        this.filteredItems.length / this.pagination.itemPerPage
      );

      this.pagination.items = [];
      for (var i = 0; i < numberOfPage; i++) {
        this.pagination.items.push(i + 1);
      }
    },

    selectPage(item) {
      this.pagination.currentPage = item;
      let start = 0;
      let end = 0;
      if (this.pagination.currentPage < this.pagination.range - 2) {
        start = 1;
        end = start + this.pagination.range - 1;
      } else if (
        this.pagination.currentPage <= this.pagination.items.length &&
        this.pagination.currentPage >
          this.pagination.items.length - this.pagination.range + 2
      ) {
        start = this.pagination.items.length - this.pagination.range + 1;
        end = this.pagination.items.length;
      } else {
        start = this.pagination.currentPage - 2;
        end = this.pagination.currentPage + 2;
      }
      if (start < 1) {
        start = 1;
      }
      if (end > this.pagination.items.length) {
        end = this.pagination.items.length;
      }

      this.pagination.filteredItems = [];
      for (var i = start; i <= end; i++) {
        this.pagination.filteredItems.push(i);
      }

      this.paginatedItems = this.filteredItems.filter((v, k) => {
        return (
          Math.ceil((k + 1) / this.pagination.itemPerPage) ==
          this.pagination.currentPage
        );
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
    cancelOrder(){
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
/* Modal style*/
.info{
  padding: 10px 5px;
  background: #28a74561;
  margin-bottom: 10px;
  text-transform: capitalize;
}
.table {
    margin-bottom: 0rem;
}
.samebg .card-body {
  padding: 1rem 1rem;
}
.card {
  background: #fff;
  box-shadow: 0 1px 6px 1px rgb(69 65 78 / 10%);
  margin-bottom: 10px;
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: var(--cui-card-bg, #fff);
  background-clip: border-box;
  border: 1px solid var(--cui-card-border-color, rgba(0, 0, 21, 0.125));
  border-radius: 0.25rem;
}
.card-body {
  flex: 1 1 auto;
  padding: 1rem 1rem;
  color: var(--cui-card-color, unset);
}
.trackno {
  color: #ff470d;
}
.order-title {
  font-weight: 700;
  padding: 10px 0;
}
.text-capitalize {
  text-transform: capitalize !important;
}
.card-header {
  padding: 0.5rem 1rem;
  margin-bottom: 0;
  color: var(--cui-card-cap-color, unset);
  background-color: var(--cui-card-cap-bg, rgba(0, 0, 21, 0.03));
  border-bottom: 1px solid var(--cui-card-border-color, rgba(0, 0, 21, 0.125));
}
.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}
.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto;
}
.modal {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1050;
  display: none;
  width: 100%;
  height: 100%;
  overflow: hidden;
  outline: 0;
  box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
}
.modal-overlay {
  content: "";
  position: absolute;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: #2c3e508f;
  opacity: 0.6;
  cursor: pointer;
}
.modal-title {
  margin-bottom: 0;
  line-height: 1.5;
  margin: 0 auto;
  font-weight: 700;
  text-decoration: underline;
  text-transform: capitalize;
}
.fade {
  transition: opacity 0.15s linear;
}
/*end */
.center {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  padding: 20px;
}

.number .minus,
.number .plus {
  width: 34px;
  height: 34px;
  background: #f2f2f2;
  border-radius: 4px;
  padding: 8px 5px 8px 5px;
  border: 1px solid #ddd;
  display: inline-block;
  vertical-align: middle;
  justify-content: center;
  text-align: center;
}
.number span {
  cursor: pointer;
}
.number input {
  height: 34px;
  width: 80px;
  text-align: center;
  font-size: 16px;
  border: 1px solid #ddd;
  border-radius: 4px;
  display: inline-block;
  vertical-align: middle;
}
/* Style the tabs */
.tabs {
  overflow: hidden;
  margin-bottom: -2px; /* hide bottom border */
}
.tabs a {
  float: left;
  cursor: pointer;
  padding: 0px 24px;
  transition: background-color 0.2s;
  border-right: none;
  font-weight: bold;
  text-transform: capitalize;
}

.tabs a:last-child:hover {
  background: none;
  border: none;
  color: none;
}

/* Change background color of tabs on hover */
.tabs a:hover {
  background-color: #aaa;
  color: #fff;
}

/* Styling for active tab */
.tabs a.active {
  background-color: #007bff;
  color: #fff;
  border-bottom: 2px solid #fff;
  cursor: default;
}

/* Style the tab content */
.tabcontent {
  padding: 10px 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 4px 4px 8px #e1e1e1;
}

.tabcontent td {
  padding: 0.3em 0.4em;
  color: #484848;
}
.tabcontent td.legend {
  color: #888;
  font-weight: bold;
  text-align: right;
}
.tabcontent .map {
  height: 173px;
  width: 220px;
  background: #d3eafb;
  margin-left: 60px;
  border: 1px solid #ccc;
  border-radius: 10px;
}
.data {
  width: 120px;
}

.pagination {
  -ms-flex-align: center;
  /* align-items: center; */
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.nav-item,
.pagination {
  -webkit-box-align: center;
}
.nav,
.pagination,
.panel-icon {
  text-align: center;
}
.pagination a {
  display: block;
  min-width: 32px;
  padding: 3px 8px;
}
.button {
  -moz-appearance: none;
  -webkit-appearance: none;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  border: 1px solid #dbdbdb;
  border-radius: 3px;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  font-size: 14px;
  height: 32px;
  line-height: 24px;
  position: relative;
  vertical-align: top;
  -moz-user-select: none;
  user-select: none;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  padding-left: 10px;
  padding-right: 10px;
  text-align: center;
}
.button,
.nav-left,
.table td.is-icon,
.table th.is-icon,
.tabs,
.tag {
  white-space: nowrap;
}
.button,
a {
  cursor: pointer;
}
.button,
a:hover,
strong,
table th {
  color: #363636;
}
.button.is-disabled,
.button[disabled] {
  background-color: #f5f5f5;
  border-color: #dbdbdb;
  cursor: not-allowed;
  pointer-events: none;
  opacity: 0.5;
}
@media screen and (min-width: 769px) {
  .pagination > a:not(:first-child) {
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1;
  }
}
.pagination ul {
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -ms-flex-negative: 0;
  flex-shrink: 0;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.pagination ul,
.tabs a {
  -webkit-box-align: center;
}
ul {
  list-style: none;
}
.pagination li {
  margin: 0 2px;
}

.label {
  color: #363636;
}
.help,
.label,
.select:after {
  display: block;
}
.label,
strong {
  font-weight: 700;
}
.control.is-grouped {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
}
.control {
  position: relative;
  text-align: left;
}
.control.is-grouped > .control.is-expanded {
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -ms-flex-negative: 0;
  flex-shrink: 0;
}
.control.is-grouped > .control:not(:last-child) {
  margin-bottom: 0;
  margin-right: 10px;
}
.control:not(:last-child) {
  margin-bottom: 10px;
}
.input,
.textarea {
  -moz-appearance: none;
  -webkit-appearance: none;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-color: #fff;
  border: 1px solid #dbdbdb;
  border-radius: 3px;
  color: #363636;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  font-size: 14px;
  height: 32px;
  -webkit-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
  line-height: 24px;
  padding-left: 8px;
  padding-right: 8px;
  position: relative;
  vertical-align: top;
  box-shadow: inset 0 1px 2px rgb(10 10 10 / 10%);
  width: 100%;
}
.input {
  max-width: 100%;
}
.help.is-dark {
  color: #363636;
}
.help {
  font-size: 11px;
  margin-top: 5px;
}
.help,
.label,
.select:after {
  display: block;
}
span {
  font-style: inherit;
  font-weight: inherit;
}
.m-table {
  margin-top: 20px;
}
.m-table tr th {
  background: #c0c0c0;
  color: #393939;
}
.m-table-index {
  width: 20px;
}
.m-tags-items {
  margin-top: 5px;
  height: 60px;
  overflow-y: scroll;
}
.m-tags-items .tag {
  margin-bottom: 5px;
  margin-right: 3px;
}
</style>