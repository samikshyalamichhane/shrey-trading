@extends('layouts.admin')
@section('page_title') All Products @endsection
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
            <div class="ibox-title">All Products</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('products.create')}}">New Product</a>
                <a class="btn btn-success btn-md" href="{{route('addExcell')}}">Add Excel</a>
            </div>
            
        </div>
         

        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr class="border-0">
                        <th>SN</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @if( isset($products))
                    
                    @foreach($products as $key => $product_data)
                        <tr class='clickable-row' data-href="{{route('products.edit', $product_data->id)}}" id="{{$product_data->id}}">
                        
                            <td>{{ $key+1}}</td>
                            <td>{{ $product_data->name}}</td>
                            <td>{{ $product_data->code}}</td>
                            <td>{{ $product_data->price}}</td>
                             
                            <td>{!! $product_data->publish?'<span
                                        class="badge badge-pill badge-success">Active</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}
                            </td>
                            <td>
                                <ul class="action_list">
                                    <li>
                                        <a href="{{route('products.edit', $product_data->id)}}" data- class="btn btn-info btn-md"><i class="fa fa-edit"></i></a>
                                    </li>
              
                                    <li>
                                        <form action="{{ route('products.destroy', $product_data->id) }}" method="post">
                                            @csrf()
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure you want to delete this Product?')" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </li>
                             
                            </ul>
                                 
                            </td>
                            
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            You do not have any Products  yet.
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
<script src="{{asset('/assets/admin/js/jquery-ui.js')}}"></script>
<script type="text/javascript">
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $('#example-table').DataTable({
            pageLength: 500,
        });
    })
    $("#sortable").sortable({
              stop: function(){
                $.map($(this).find('tr'), function(el) {
                  var itemID = el.id;
                  var itemIndex = $(el).index();
                  $.ajax({
                    url:"",
                    method:"post",
                     data: {itemID:itemID, itemIndex: itemIndex},
                    success:function(data){
                      
                    }
                  })
                });
              }
            });
</script>
<script>
    $(document).ready(function(){
    })

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