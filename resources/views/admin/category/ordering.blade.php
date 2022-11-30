@extends('layouts.admin')
@section('page_title') All Category @endsection
@section('styles')
 
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('/assets/admin/css/jquery-ui.css')}}">
<style>
  /*#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable tr { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }*/
  </style>
@endsection
@section('content')
 
<div class="page-heading">
    <h1 class="page-title"> Category Display Order Management</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Dashboard</a>
        </li>
        <li class="breadcrumb-item"> All Categories</li>
    </ol>
@include('admin.section.notifications')
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">All Categories</div>
            <div>
                
                <a class="btn btn-info btn-md" href="{{route('category.index')}}">All Category</a>
            </div>
        </div>
         

        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Parent Category</th>
                        <th>Show In Top (Menu/ Order)</th>
                    </tr>
                </thead>
                <tbody id="sortable">

                    
                    @if($allcategories->count())
                    
                    @foreach($allcategories as $key => $category_data)

                    <tr class="category_row{{$category_data->id}}" data-order_id="{{$category_data->show_order}}" id="{{$category_data->id}}">
                        <td><i class="ti-list "></i> {{$key +1}}</td>
                        
                        <td class="text-capitalize"> {{$category_data->title}}</td>
                      
                        <td>{{@$category_data->parent_info->title}}</td>
                        <td>
                            {{($category_data->show_in_menu == 1) ? 'Show' : 'Hide'}}
                           [ {{$category_data->show_order}}]
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
<script src="{{asset('/assets/admin/js/jquery-ui.js')}}"></script>
<script type="text/javascript">
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $(function() {
        $('#example-table').DataTable({
            pageLength: 25,
        });
    })
</script>
<script>
           $("#sortable").sortable({
              stop: function(){
                $.map($(this).find('tr'), function(el) {
                  var itemID = el.id;
                  var itemIndex = $(el).index();
                  $.ajax({
                    url:"{{route('category-order-change')}}",
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
        $('body').on('click', '.changeStatus' ,function(e){
            e.preventDefault();
            var category_id = $(this).data('category_id');
            $.ajax({
                url:"{{route('changeCategoryStatus')}}",
                method:"POST",
                data:{
                    category_id : category_id,
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
                        var replace_html = '<span class="btn btn-rounded btn-sm btn-'+((update_data.status == 'Publish')? 'success' : 'warning')+' changeStatus" data-status="'+update_data.status+'" data-category_id = "'+update_data.id+'" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title= "Make '+((update_data.status == 'Publish')? 'Unpublish' : 'Publish')+' this Category.">'+update_data.status+'ed</span>';
                        $('.changeStatus'+category_id).html(replace_html);


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