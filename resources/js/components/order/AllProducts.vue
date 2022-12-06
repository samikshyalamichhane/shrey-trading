<template>
  <div class="tab-content" id="component-1-content">
    <div
      class="tab-pane fade show active"
      id="component-1-1"
      role="tabpanel"
      aria-labelledby="component-1-1"
    >
      <form @submit.prevent="submitOrder">
        <div class="row">
          <div class="col-md-8 ibox-body">
            <my-products :myProducts="myProducts" />
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
                style="resize: none"
              ></textarea>
            </div>
            <button class="btn btn-sm btn-success" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>

    <div
      class="tab-pane fade"
      id="component-1-2"
      role="tabpanel"
      aria-labelledby="component-1-2"
    >
        <div class="row">
          <div class="col-md-8 ibox-body" id="appendMyProducts">
            <table
              id="example-table2"
              class="table table-striped table-bordered table-hover"
              cellspacing="0"
              width="100%"
            >
              <thead>
                <tr>
                  <th>
                    <input
                      type="checkbox"
                      class="checkbox"
                      :checked="isAllSelected"
                      @click="selectAllProducts"
                    />
                    All
                  </th>
                  <!-- <th>S.N.</th> -->
                  <th>Products</th>
                  <th>Code</th>
                  <th class="text-center">Quantity</th>
                </tr>
              </thead>
              <tbody>
                <tr v-if="!products">
                  <td colspan="8">You do not have any data yet.</td>
                </tr>
                <tr v-for="(product, index) in products" :key="index">
                  <td>
                    <input
                      type="checkbox"
                      v-model="selectedProduct"
                      class="checkbox"
                      :value="product"
                      @click="select"
                    />
                  </td>
                  <td>{{ product.name }}</td>
                  <td style="width: 80px">{{ product.code }}</td>
                  <td class="text-center">
                    <div class="cart_list">
                      <div class="qty-wrapper">
                        <button class="minus" @click="decrement(product)">
                          -
                        </button>
                        <span class="input-text qty text">{{
                          product.qty
                        }}</span>

                        <button class="plus" @click="increment(product)">
                          +
                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label><strong>Order Note</strong></label>
              <textarea
                name="order_note"
                id="order_note"
                rows="5"
                v-model="order_note"
                placeholder="Order Note Here"
                class="form-control"
                style="resize: none"
              ></textarea>
            </div>
            <button
              class="btn btn-sm btn-success"
              type="submit"
              @click="submitOrder"
            >
              Submit Order
            </button>
          </div>
        </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  props: ["products","myProducts"],
  data() {
    return {
      order_note: "",
      isAllSelected: false,
      selectedProduct: [],
    };
  },
  methods: {
    selectAllProducts() {
      if (this.isAllSelected) {
        this.selectedProduct = [];
        this.isAllSelected = false;
      } else {
        this.selectedProduct = [];
        for (var product in this.products) {
          this.selectedProduct.push(this.products[product]);
        }
        this.isAllSelected = true;
      }
    },
    select() {
      if (this.selectedProduct.length !== this.products.length) {
        this.isAllSelected = false;
      } else {
        this.isAllSelected = true;
      }
    },
    increment(item) {
      let found = this.selectedProduct.find((product) => {
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
      let found = this.selectedProduct.find((product) => {
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

    async submitOrder() {
      if (this.selectedProduct !== "") {
        await axios.post("/carts/submit-order/", {
          products: this.selectedProduct,
          order_note: this.order_note,
        });
      } else {
        this.$toast.error(`Please select atleast one item!`);
      }
    },
  },
};
</script>
<style>
.toast-container {
  bottom: inherit !important;
}
.qty {
  background: none;
  border: none;
  width: 8%;
  margin: 5px;
}
.newcartlist .minus, .newcartlist .plus, .checkbox, .btn {
    cursor: pointer;
}
</style>