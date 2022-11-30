@extends('layouts.admin')
@section('page_title') All Blogs @endsection
@section('styles')
 
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
 
<div class="page-heading">
    <h1 class="page-title"> Blogs</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All Blogs</li>
    </ol>
@include('admin.section.notifications')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Blogs</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('post.create')}}">New Blog</a>
            </div>
        </div>
         

        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Blog Image</th>
                        <th>Blog Title</th>
                        <th>
                            Added Date <br>
                            Published Date
                        </th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @if($post_info->count())
                    @foreach($post_info as $key => $post_data)
                    {{--dd($post_data->category_info)--}}
                    <tr>
                        <td> {{$key +1}}</td>
                        <td> 
                            
                            @if(!empty($post_data->thumbnail) && file_exists(public_path().'/uploads/Blog/'.$post_data->thumbnail))
                                <div class="m-r-10">
                                <a href="{{asset('/uploads/Blog/'.$post_data->thumbnail)}}" target="_adimage">
                                    <img src="{{asset('/uploads/Blog/'.$post_data->thumbnail)}}" alt="No Image" class="rounded" width="70">
                                </a> 
                                </div>
                            @endif
                        </td>
                        <td> {{$post_data->title}}</td>
                         
                        
                         
                        <td> 
                            <i class="fa fa-angle-right" style="font-size: 20px; padding-right: 5px;"></i>
                            {{$post_data->created_at}} <br>
                            <i class="fa fa-angle-right" style="font-size: 20px; padding-right: 5px;"></i> 
                            {{$post_data->published_date}}

                        </td>
                        <td>

                            <span class="btn btn-rounded btn-sm {{($post_data->status == 'Publish') ? 'btn-success':   'btn-warning'  }} ">{{$post_data->status}}</span>
                            
                        </td>
                        <td>
                            <ul class="action_list">
                                <li>
                                    <a href="{{route('post.edit', $post_data->id)}}" class="btn btn-success btn-lg"><i class="fa fa-edit"></i></a>
                                    
                                </li>
                                <li>
                                    <form action="{{ route('post.destroy', $post_data->id) }}" method="post">
                                        @csrf()
                                        @method('DELETE')
                                        <button   onclick="return confirm('Are you sure you want to delete this Blog?')" class="btn btn-danger btn-lg">
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
                            You do not have any Blog yet.
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
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,
        });
    })
</script>
@endsection