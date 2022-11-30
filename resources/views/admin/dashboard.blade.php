@extends('layouts.admin')
@section('page_title') Admin @endsection
@section('content')
<div class="page-content fade-in-up">
    <div class="row">
        @if(auth()->user())
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Users: </h5>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="stats">
                        <a href="{{route('users.index')}}" target="_blank" style="color:white">
                            <i class="fas fa-sync-alt text-white"></i>
                            <span> Go to Users List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Clients: </h5>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="stats">
                        <a href="" target="_blank" style="color:white">
                            <i class="fas fa-sync-alt text-white"></i>
                            <span> Go to Clients List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(auth()->guard('client')->user())
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">My Products: {{count($myProducts)}} </h5>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="stats">
                        <a href="{{route('products.index')}}" target="_blank" style="color:white">
                            <i class="fas fa-sync-alt text-white"></i>
                            <span> Go to Products List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(auth()->guard('client')->user() || auth()->user())
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Products: {{count($products)}}</h5>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="stats">
                        <a href="{{route('products.index')}}" target="_blank" style="color:white">
                            <i class="fas fa-sync-alt text-white"></i>
                            <span> Go to Products List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(auth()->guard('client')->user())
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Total Orders: {{count($orders)}}</h5>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="stats">
                        <a href="{{route('orders.index')}}" target="_blank" style="color:white">
                            <i class="fas fa-sync-alt text-white"></i>
                            <span> Go to Orders List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>


</div>
@if(auth()->guard('client')->user())
<div class="page-content fade-in-up">
    <div class="col-sm-12">
        <div class="row newcartlist">
            <div class="col-sm-6">
                <div class="samebg">
                <div class="ibox-title">
                    <x-product></x-product>
                </div>
            
           
            <div class="tab-content" id="component-1-content">

                <div class="tab-pane fade show active" id="component-1-1" role="tabpanel" aria-labelledby="component-1-1">
                    <div class="ibox-body">
                        <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Products</th>
                                    <th>Code </th>
                                    

                                </tr>
                            </thead>
                            <tbody>

                                @forelse($myProducts as $cart_key => $all_cart)
                                <tr>
                                    <td>{{++$cart_key}}</td>
                                    <td>{{$all_cart->name}}</td>
                                    <td>{{$all_cart->code}}</td>
                                    <td>
                                        <div class="cart_list">

                                            <div class="qty-wrapper">
                                                <button class="minus">-</button>

                                                <input type="text" name="" class="qty-input" value="1">
                                                <button class="plus">+</button>
                                                <button class="btn category__card__body__cart-btn add_cart_btn list_cart_btn" data-product_id="{{$all_cart->id}}" data-quantity="1" data-type="plus" onclick="addToCart(this)"><span><i class="fa fa-cart-plus" aria-hidden="true"></i></span>add to cart</button>

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
                    </div>
                </div>
                <div class="tab-pane fade" id="component-1-2" role="tabpanel" aria-labelledby="component-1-2">
                    <div class="ibox-body">
                        <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Products</th>
                                    <th>Code </th>
                                    

                                </tr>
                            </thead>
                            <tbody>

                                @forelse($products as $cart_key => $all_cart)
                                <tr>
                                    <td>{{++$cart_key}}</td>
                                    <td>{{$all_cart->name}}</td>
                                    <td>{{$all_cart->code}}</td>
                                    <td>
                                        <div class="cart_list">

                                            <div class="qty-wrapper">
                                                <button class="minus">-</button>

                                                <input type="text" name="" class="qty-input" value="1">
                                                <button class="plus">+</button>
                                                <button class="btn category__card__body__cart-btn add_cart_btn list_cart_btn" data-product_id="{{$all_cart->id}}" data-quantity="1" data-type="plus" onclick="addToCart(this)"><span><i class="fa fa-cart-plus" aria-hidden="true"></i></span>add to cart</button>

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
                    </div>
                </div>
            </div>
        </div></div>
         
            <div class="col-sm-6">
                <div class="samebg">
                 <div class="ibox-title">Cart Items</div>
                <form action="{{route('submitOrder')}}" method="POST">
                    @csrf
                    <table id="example-table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Products</th>
                                <th>Quantity </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('__cart'))
                            @foreach(session('__cart') as $id => $details)
                            <tr>
                                <td>{{++$id}}</td>
                                <td>{{@$details['name']}}</td>
                                <td>{{$details['quantity']}}</td>
                                <td>
                                    <div class="category__card__body__cart">
                                        <div class="whole-cart-wrapp">
                                            <div class="cart_list">

                                                <div class="qty-wrapper">
                                                    <button class="minus">-</button>

                                                    <input type="text" name="" class="qty-input" value="1">
                                                    <button class="plus">+</button>
                                                </div>
                                            </div>
                                             <!--<button class="btn category__card__body__cart-btn add_cart_btn list_cart_btn" data-product_id="{{$details['id']}}" data-quantity="1" data-type="plus" onclick="addToCart(this)"><span><i class="fa fa-cart-plus" aria-hidden="true"></i></span>add to cart</button> -->
                                            <button class="btn category__card__body__cart-btn add_cart_btn list_cart_btn del" data-pro_id="{{$details['id']}}" data-quantity="1" data-type="plus" onclick="deleteCart(this)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            @endif


                        </tbody>

                    </table>
                    <div class="form-group">
                        <label><strong>Order Note</strong></label>
                        <textarea name="order_note" id="order_note" rows="5" placeholder="Order Note Here" class="form-control" style="resize: none;"></textarea>
                    </div>
                    <button class="btn btn-sm btn-success submitOrder" type="success">Submit Order</button>
                </form>

            </div></div>
        </div>
    </div>
</div>
@endif
@if(auth()->user())
<div class="page-content fade-in-up">
    <div class="ibox col-sm-12">
        <div class="row">
            <div class="ibox-head col-sm-6">
                <div class="ibox-title">
                    New Orders
                </div>
            </div>
            <div class="ibox-body col-sm-12">
                <table id="example-table" class="table table-responsive table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Ordered By</th>
                            <th>Date </th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse($orders as $cart_key => $order_data)
                        <tr>
                            <td>#{{$order_data->id}}</td>
                            <td>{{@$order_data->client->name}}</td>
                            <td>{{Carbon\Carbon::parse($order_data->created_at)->format('Y,M d')}}</td>
                            <td>
                            <ul class="action_list">
                                <li>
                                    <a href="{{route('orders.show',$order_data->id)}}" data- class="btn btn-info btn-md"><i class="fa fa-eye"></i></a>
                                    
                                </li>
                            </ul>
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
            </div>
        </div>
    </div>
</div>
@endif

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.minus').click(function(e) {
            e.preventDefault();

            value = parseInt($(this).next('.qty-input').val(), 10);

            value = isNaN(value) ? 1 : value;

            if (value == 1) {
                return;
            } else {
                value--;
            }

            $(this).next('.qty-input').val(value);
            $(this).next('.add_cart_btn').attr('data-quantity', value)
        });
        $('.plus').click(function(e) {
            e.preventDefault();
            plusValue = parseInt($(this).prev('.qty-input').val());
            value = isNaN(plusValue) ? 0 : plusValue;
            value++;
            $(this).prev('.qty-input').val(value);
            // console.log($(this).next('.add_cart_btn').attr('data-quantity', value))
            $(this).next('.add_cart_btn').attr('data-quantity', value)
            // $(this).parent('div').parent('div').parent('div').find('.add_cart_btn').attr('data-quantity', value);
            // console.log($(this).parent('div').find('.add_cart_btn').attr('data-quantity'));
        });
    });
</script>
<script type="text/javascript">
    function addToCart(elem, id = null) {
        var product_id = $(elem).attr('data-product_id');
        var quantity = parseInt($(elem).attr('data-quantity'));
        console.log(product_id, quantity)
        if (id != null) {
            quantity = $('#' + id).val();
        }
        $.ajax({
            url: "{{route('addNewCart')}}",
            method: "post",
            data: {
                product_id: product_id,
                quantity: quantity,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                if (response.status = true) {
                    location.reload();
                    DataSuccessInDatabase(response.message);
                }
                if (response.status == false) {
                    FailedResponseFromDatabase(response.message);
                }
            }
        });
    }

    function deleteCart(elem, id = null) {
        var product_id = $(elem).attr('data-pro_id');
        console.log(product_id)
        // var url = '{{ route("delete-cart", ":id") }}';
        //     url = url.replace(':id', product_id);
        // if (id != null) {
        //     quantity = $('#' + id).val();
        // }
        $.ajax({
            url: "{{route('delete-cart')}}",
            method: "post",
            data: {
                product_id: product_id,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                if (response.status = true) {
                    location.reload();
                    $('#new_cart__dropdown__list').html(response.html);
                    $('.total_count').html(response.total);
                    $('.top_menu').html(response.cart_top_menu_total);
                    DataSuccessInDatabase(response.message);
                }
                if (response.status == false) {
                    FailedResponseFromDatabase(response.message);
                }
            }
        });
    }

    function submitOrder() {
        var sessionValue = "<?php
                            // echo $_SESSION["__cart"]; 
                            ?>";
        $.ajax({
            url: "{{route('submitOrder')}}",
            method: "post",
            data: {
                cart_items: sessionValue,
                _token: "{{csrf_token()}}"
            },
            success: function(response) {
                if (response.status = true) {
                    location.reload();
                    $('#new_cart__dropdown__list').html(response.html);
                    $('.total_count').html(response.total);
                    $('.top_menu').html(response.cart_top_menu_total);
                    DataSuccessInDatabase(response.message);
                }
                if (response.status == false) {
                    FailedResponseFromDatabase(response.message);
                }
            }
        });
    }
</script>
@endsection