@extends('layouts.admin')
@section('page_title') All Messages @endsection
@section('styles')
 
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
 
<div class="page-heading">
    <h1 class="page-title"> Messages</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All Messages</li>
    </ol>
@include('admin.section.notifications')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Messages</div>
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
                        <th>S.N</th>
                        <th>Name/ Email </th>
                    
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    
                    @if($messages->count())
                    
                    @foreach($messages as $key => $message_data)
                   
                    <tr class="category_row{{$message_data->id}}">
                        <td> {{$key +1}}</td>
                        
                        <td class="text-capitalize"> 
                            {{$message_data->name}} <br>
                            >>{{$message_data->email}}
                        </td>
                       
                        <td>{{$message_data->subject}}</td>
                        <td>{{$message_data->message}}</td>
                        
                        <td>
                            <ul class="action_list">
                                <li>
                                    <form action="{{ route('delete-message', $message_data->id) }}" method="get">
                                        @csrf()
                                        @method('DELETE')
                                        <button   onclick="return confirm('Are you sure you want to delete this Message?')" class="btn btn-danger btn-lg">
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
                            You do not have any Message yet.
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