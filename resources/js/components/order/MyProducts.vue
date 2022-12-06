<template>
  <div class="row">
    <div class="col-md-8 ibox-body">
      <table
        id="example-table1"
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
            <th>Products</th>
            <th>Code</th>
            <th class="text-center">Quantity</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="!myproducts">
            <td colspan="8">You do not have any data yet.</td>
          </tr>
          <tr v-for="(product, index) in myproducts" :key="index">
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
                    <input
                      type="text"
                      class="quantity"
                      :id="product.id"
                      oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"
                      v-model.number="product.qty"
                      placeholder="Enter Qty"
                      autocomplete="off"
                    />
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
          placeholder="Order Note Here"
          class="form-control"
          style="resize: none"
        ></textarea>
      </div>
      <button class="btn btn-sm btn-success" @click="submit" type="submit">Submit Order</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["myproducts"],
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
        for (var product in this.myproducts) {
          this.selectedProduct.push(this.myproducts[product]);
        }
        this.isAllSelected = true;
      }
    },
    select() {
      if (this.selectedProduct.length !== this.myproducts.length) {
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

    async submit() {
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
          const response = await axios.post("/carts/submit-order/", {
            products: this.selectedProduct,
            order_note: this.order_note,
          });
          if(response.status == 200){
            this.$toast.success(`Order created successfully !!`);
          }else{
            this.$toast.error(`Somthing went wrong, Please try again!`);
          }
        }
      }
    },
  },
};
</script>

<style>
</style>