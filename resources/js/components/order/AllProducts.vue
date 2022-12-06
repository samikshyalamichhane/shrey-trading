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
            <my-products :myproducts="myproducts" />
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
            <button class="btn btn-sm btn-success" type="submit">Submit Order</button>
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
                      <div class="number">
                        <span class="minus" @click="decrement(product)">-</span>
                        <input type="text" class="quantity" :id="product.id"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                        v-model.number="product.qty"
                        placeholder="Enter Qty"
                        autocomplete="off"/>
                        <span class="plus" @click="increment(product)">+</span>
                      </div>
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
  props: ["products", "myproducts"],
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
      if (this.selectedProduct == "") {
        this.$toast.error(`Please select atleast one item!`);
      } else {
        let found = this.selectedProduct.find((product) => {
          if (product.qty == 0) {
            return product;
          }
        });
        if (found) {
          this.$toast.error(`Product with 0 quentity cannot be submitted!`);
        } else {
          await axios.post("/api/submit-order/", {
            products: this.selectedProduct,
            order_note: this.order_note,
          });
        }
      }
    },
  },
};
</script>
<style>
.checkbox, .btn{
  cursor: pointer;
}
.toast-container {
  bottom: inherit !important;
}
.qty {
  background: none;
  border: none;
  width: 8%;
  margin: 5px;
}
/* .number{ margin:20px;} */
.number span {cursor:pointer; }
.number .minus, .number .plus{
  width: 40px;
  height:34px;
  background:#f2f2f2;
  border-radius:4px;
  padding:8px 5px 8px 5px;
  border:1px solid #ddd;
  display: inline-block;
  vertical-align: middle;
  justify-content: center;
  text-align: center;
}
.number input{
  height:34px;
  width: 100px;
  text-align: center;
  font-size: 16px;
  border:1px solid #ddd;
  border-radius:4px;
  display: inline-block;
  vertical-align: middle;
}

</style>