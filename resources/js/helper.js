export default {
    priceUnit() {
      return "Rs.";
    },
  
    formattedPrice(amount, withUnit = true) {
      let formattedAmount = Number(parseFloat(Number(amount).toFixed(2))).toLocaleString();
      
      if (withUnit) {
        return this.priceUnit() + " " + formattedAmount;
      }
      return formattedAmount;
    },
  };
  