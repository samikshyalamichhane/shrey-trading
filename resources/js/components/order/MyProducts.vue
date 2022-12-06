<template>
  
    <table id="example-table1" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Products</th>
                <th>Code </th>
    
    
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>sdscs</td>
                <td>scsdcsd</td>
                <td>
                    <div class="cart_list">
    
                        <div class="qty-wrapper">
                            <button class="minus"  data-product_id="">-</button>
                            <input type="text" name="quantity" class="qty-input" value="0">
                            <button class="plus" data-product_id="">+</button>    
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="8">
                    You do not have any data yet.
                </td>
            </tr>
            
    
        </tbody>
    
    
    </table>
</template>

<script>
export default {

}
</script>

<style>

</style>