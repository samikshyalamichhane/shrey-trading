<template>
  <li class="nav-item newsearch">
    <input
      type="text"
      v-model="query"
      class="form-control rounded"
      @keyup="filterCustomers"
      placeholder="search..."
    />
  </li>
  <div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      query: "",
      searchReasult:[],
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
       this.searchReasult = res.data.data;
       this.$store.commit('setSearchList', this.searchReasult);
      });
    },
  },
};
</script>

<style>
</style>