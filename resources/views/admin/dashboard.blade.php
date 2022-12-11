@extends('layouts.admin')
@section('page_title') Admin @endsection
@section('styles')
 
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div id="app">
    @if(auth()->user())
    <div class="page-content fade-in-up">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-4">
            <a href="{{route('users.index')}}" target="_blank" style="color:white">
                <div class="card text-white bg-success" style="margin-bottom:2rem">
                    <div class="card-body card-body pb-0 mb-4 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg" style="font-size: 1.3125rem;">{{count($users)}}</div>
                            <div>
                            Total Users</div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <!-- /.col-->
            <div class="col-md-4">
            <a href="{{route('clients.index')}}" target="_blank" style="color:white">
                <div class="card text-white bg-danger" style="margin-bottom:2rem">
                    <div class="card-body card-body pb-0 mb-4 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg" style="font-size: 1.3125rem;">{{count($clients)}}</div>
                            <div>Total Clients</div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
            <a href="{{route('products.index')}}" target="_blank" style="color:white">
                <div class="card text-white bg-primary" style="margin-bottom:2rem">
                    <div class="card-body card-body pb-0 mb-4 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg" style="font-size: 1.3125rem;">{{count($products)}}</div>
                            <div>Total Products</div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            </div>
            </div>
            </div>
            @endif
@if(auth()->guard('client')->user())
<div class="page-content fade-in-up">
    <div class="col-sm-12">
        <div class="row">
        
            @if(auth()->guard('client')->user())
            <!-- /.col-->
            <div class="col-md-4"> 
            <a href="{{route('products.index')}}" target="_blank" style="color:white">
                <div class="card text-white bg-info" style="margin-bottom:2rem">
                    <div class="card-body card-body pb-0 mb-4 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg" style="font-size: 1.3125rem;">{{count($myProducts)}}</div>
                            <div>My Products</div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
            @endif
            @if(auth()->guard('client')->user() || auth()->user())
            <div class="col-md-4">
            <a href="{{route('products.index')}}" target="_blank" style="color:white">
                <div class="card text-white bg-primary" style="margin-bottom:2rem">
                    <div class="card-body card-body pb-0 mb-4 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg" style="font-size: 1.3125rem;">{{count($products)}}</div>
                            <div>Total Products</div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endif
            @if(auth()->guard('client')->user())
            <div class="col-md-4">
            <a href="{{route('orders.index')}}" target="_blank" style="color:white">
                <div class="card text-white bg-warning" style="margin-bottom:2rem">
                    <div class="card-body card-body pb-0 mb-4 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg" style="font-size: 1.3125rem;">{{count($orders)}}</div>
                            <div>Total Orders</div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endif
        </div>
        <div class="row newcartlist">
            <div class="col-sm-12">
            <div class="samebg">
                    <my-products :myproducts="{{ json_encode($myProducts) }}" :products="{{ json_encode($products) }}
                    " :client="client"/>
                </div>
            </div>
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
                <table id="example-table3" class="table table-responsive table-hover" cellspacing="0" width="100%">
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
                                    <a href="{{route('orders.show',$order_data->id)}}" data- class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    
                                </li>
                                <li>
                                    <button class="btn btn-success btn-sm changeOrderStatus" data-id="{{$order_data->id}}" data-title="{{$order_data->title}}"><i class="fa fa-pencil"></i></button>
                                </li>
                                <li>
                                    <form action="{{ route('orders.destroy', $order_data->id) }}" method="post">
                                    @csrf()
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure you want to delete this Order?')"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
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
</div>
@include('admin.order.modal')
@endsection
@section('scripts')
<script src="{{mix('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('.changeOrderStatus').click(function(e){
                e.preventDefault();
                id=$(this).data('id');
                $('#myModal').modal('show');
                $("#myModal #title").val( id );
            });
        
    });
    </script>

@endsection