<template>
  <li class="nav-item newsearch">
    <input
      type="text"
      v-model="query"
      class="form-control rounded"
      @keyup="filterCustomers"
      placeholder="Name or email"
    />
  </li>
</template>

<script>
export default {
  data() {
    return {
      query: "",
    };
  },
  mounted() {
    if (this.query) {
      this.search();
    }
  },
  methods: {
    filterCustomers() {
      if (this.query.length < 3) {
        return true;
      }
     
      axios.get("/product/search?q=" + this.query).then((res) => {
       
      });
    },
  },
};
</script>

<style>
</style>