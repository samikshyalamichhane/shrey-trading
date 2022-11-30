@extends('layouts.admin')
@section('page_title') All Advertise @endsection
@section('styles')
 
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
 
<div class="page-heading">
    <h1 class="page-title"> Advertise</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All Advertise</li>
    </ol>
@include('admin.section.notifications')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Advertise</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('advertise.create')}}">New Advertise</a>
            </div>
        </div>
         

        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <td>Image</td>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($alladvertise->count())
                    @foreach($alladvertise as $key => $advertise_data)
                     
                    <tr class="category_row{{$advertise_data->id}}">
                        <td> {{$key +1}}</td>
                        <td>
                            @if(isset($advertise_data->image) && !empty($advertise_data->image) && file_exists(public_path().'/uploads/advertise/'.$advertise_data->image))
                            <img src="{{asset('/uploads/advertise/'.$advertise_data->image)}}" alt="No Image" class=" img   img-sm rounded" style="max-width: 80px;">
                            @endif
                        </td>
                        
                        <td class="text-capitalize"> {{$advertise_data->title}}</td>
                 
                      
             
                         
                        
                         
                        
                        <td class="changeStatus{{$advertise_data->id}}">

                            <span class="btn btn-rounded btn-sm {{($advertise_data->status == 'Publish') ? 'btn-success':   'btn-warning'  }} changeStatus" data-status="{{$advertise_data->status}}" data-id = "{{$advertise_data->id}}" style="cursor: pointer;">{{$advertise_data->status}}ed</span>
                            
                        </td>
                        <td>
                            <ul class="action_list">
                                <li>
                                    <a href="{{route('advertise.edit', $advertise_data->id)}}" data- class="btn btn-info btn-md"><i class="fa fa-edit"></i></a>
                                    
                                </li>
              
                                <li>

                                    <form action="{{ route('advertise.destroy', $advertise_data->id) }}" method="post">
                                        @csrf()
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this Advertise?')" class="btn btn-danger">
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
                            You do not have any Advertise  yet.
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
    $(document).ready(function(){
        $('body').on('click', '.changeStatus',function(e){
            e.preventDefault();
            id = $(this).data('id');
            $.ajax({
                url:"{{route('changeAdvertiseStatus')}}",
                method:"POST",
                data:{
                    id : id,
                    status : $(this).data('status'),
                    _token: "{{csrf_token()}}"
                },
                success : function(response){
                    if (response.status == false ) {
                        FailedResponseFromDatabase(response.message);
                    }
                    if (response.status == true) {
                        DataSuccessInDatabase(response.message);
                        var update_data = response.data[0];
                        var replace_html = '<span class="btn btn-rounded btn-sm btn-'+((update_data.status == 'Publish')? 'success' : 'warning')+' changeStatus" data-status="'+update_data.status+'" data-id = "'+update_data.id+'" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title= "Make '+((update_data.status == 'Publish')? 'Unpublish' : 'Publish')+' this Advertise.">'+update_data.status+'ed</span>';
                        
                        $('.changeStatus'+id).html(replace_html);
                    }
                }
            })
        })
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