@extends('layouts.admin')
@section('page_title') Admin @endsection
@section('styles')
 
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div id="app">
@if(auth()->guard('client')->user())
<div class="page-content fade-in-up">
    <div class="col-sm-12">
        <div class="row newcartlist">
            <div class="col-sm-12">
                <div class="samebg">
                    <my-products :myproducts="{{ json_encode($myProducts) }}" :products="{{ json_encode($products) }}"/>
                </div>
            </div>
            <!-- <div class="col-sm-4">
                <div class="samebg">
                    <div class="page-content fade-in-up">
                        <div class="row">
                            @if(auth()->user())
                            <div class="col-12">
                                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Users: {{count($users)}}</h5>
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
                            <div class="col-12">
                                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Clients: {{count($clients)}}</h5>
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                            <div class="col-md-6">
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
                </div>
            </div> -->
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
</div>
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

@endsection