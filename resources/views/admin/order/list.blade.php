@extends('layouts.admin')
@section('page_title') All Orders @endsection
@section('styles')
 
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
 
<div class="page-heading">
@include('admin.section.notifications')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Orders</div>
            <div>{{--
                <a href="{{route('category-order')}}" class="btn btn-info btn-md">Ordering</a>
                <a class="btn btn-info btn-md" href="{{route('category.create')}}">New Category</a>
                --}}
            </div>
        </div>
         

        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    
                    @if($orders->count())
                    
                    @foreach($orders as $key => $order_data)

                    <tr class="category_row{{$order_data->id}}">
                        <td> #{{$order_data->id}}</td>
                        <td>{{@$order_data->client->name}}</td>
                        <td>{{Carbon\Carbon::parse($order_data->created_at)->format('Y,M d')}}</td>
                        <td>{!! $order_data->status?'<span
                                        class="badge badge-pill badge-success">New</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}
                            </td>
                        <td>
                            <ul class="action_list">
                                <li>
                                    <a href="{{route('orders.show',$order_data->id)}}" data- class="btn btn-info btn-md"><i class="fa fa-eye"></i></a>
                                    
                                </li>
                                {{--
                                <li>

                                    <form action="{{ route('category.destroy', $order_data->id) }}" method="post">
                                        @csrf()
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this Category?')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </li>
                                --}}
                              
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            You do not have any Catogory yet.
                        </td>
                    </tr>
                    @endif
                </tbody>
                 
            </table>
        </div>
    </div>
     
</div>

@endsection
@section('scripts')
<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/admin/js/sweetalert.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,
        });
    })
</script>
<script>
    

function FailedResponseFromDatabase(message){
    html_error = "";
    $.each(message, function(index, message){
        html_error += '<p class ="error_message text-left"> <span class="fa fa-times"></span> '+message+ '</p>';
    });
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        html:html_error ,
        confirmButtonText: 'Close',
        timer: 10000
    });
}
function DataSuccessInDatabase(message){
    Swal.fire({
        // position: 'top-end',
        type: 'success',
        title: 'Done',
        html: message ,
        confirmButtonText: 'Close',
        timer: 10000
    });
}
</script>
@endsection