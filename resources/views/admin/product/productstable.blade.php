<table id="example-table1" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Products</th>
            <th>Code </th>


        </tr>
    </thead>
    <tbody>

        @forelse($details as $cart_key => $all_cart)
        <tr>
            <td>{{++$cart_key}}</td>
            <td>{{$all_cart->name}}</td>
            <td>{{$all_cart->code}}</td>
            <td>
                <div class="cart_list">

                    <div class="qty-wrapper">
                        <button class="minus"  data-product_id="{{$all_cart->id}}">-</button>
                        <input type="text" name="quantity" class="qty-input" value="0">
                        <button class="plus" data-product_id="{{$all_cart->id}}">+</button>
                        <!--<button class="btn category__card__body__cart-btn add_cart_btn list_cart_btn" data-product_id="{{$all_cart->id}}" data-quantity="1" data-type="plus" onclick="addToCart(this)"><span><i class="fa fa-cart-plus" aria-hidden="true"></i></span>add to cart</button>-->

                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">
                You do not have any data yet.
            </td>
        </tr>
        @endforelse

    </tbody>


</table>

<script>
// $('#search').on('keyup', function(e){
//     e.preventDefault()
    
//     search();
// });
// search();
// function search() {
//     var a = $('#search').val();
//         $.ajax({
//             type: 'GET',
//             data: {
//                     a: a
//                 },
//             url: '{{route('searchProduct')}}',
//             success: function(response) {
//                 $('#appendProducts').html(response.html)
//             },
//             error: function(error) {
//                 $('#notification-bar').text('An error occurred');
//             }
//         });
//     }

    // search()
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
// function search(){
//      var keyword = $('#search').val();
//      $.post('{{ route("searchProduct") }}',
//       {
//          _token: $('meta[name="csrf-token"]').attr('content'),
//          keyword:keyword
//        },
//        success: function(response) {
//                 console.log(response.message)
//                 $('#appendProducts').html(response.html)
//             },
//             error: function(error) {
//                 $('#notification-bar').text('An error occurred');
//             }
// );
// }

</script>