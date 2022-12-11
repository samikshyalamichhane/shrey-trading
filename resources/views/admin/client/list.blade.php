
@extends('layouts.admin')
@section('page_title') All Customer @endsection
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
            <div class="ibox-title">All Clients</div>
        </div>
         

        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($user_lists->count())
                    @foreach($user_lists as $key => $user_data)
                     
                    <tr class="category_row{{$user_data->id}}">
                        <td> {{$key +1}}</td>
                        <td>
                            {{$user_data->name}}
                        </td>
                        
                        <td class="text-capitalize"> {{$user_data->email}}</td>
                        <td>{!! $user_data->status?'<span
                                        class="badge badge-pill badge-success">Active</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}
                            </td>
                        <td>
                            <ul class="action_list">
                            	
                                <li>
                                    <a href="{{route('clients.edit', $user_data->id)}}" data- class="btn btn-info btn-md"><i class="fa fa-edit"></i></a>
                                </li>
                                <li>

                                     
                                    <form action="{{ route('users.destroy', $user_data->id) }}" method="post">
                                        @csrf()
                                      
                                        <button   onclick="return confirm('Are you sure you want to delete this User?')" class="btn btn-danger">
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
                            You do not have any users  yet.
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
                url:"",
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