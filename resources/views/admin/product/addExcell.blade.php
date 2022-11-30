@extends('layouts.admin')
@section('page_title') Product @endsection
 
@section('content')
 
<div class="page-heading">
    <h1 class="page-title">  Product</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Home</a>
        </li>
        <li class="breadcrumb-item"> Product</li>
    </ol>

</div>
@if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  @if(Session::has('message'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {!! Session::get('message') !!}
  </div>
  @endif
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title"> Product</div>
            
        </div>
    </div>
    <form method="post" action="{{route('saveExcel')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-heading">
                    <h3 class="box-title">Add Excel</h3>
                </div>
                <div class="box-body">

                        <input type="file" webkitdirectory mozdirectory name="folder[]"/>
                        
                    
                    <!-- <div class="form-group">
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Select Excel File</label>
                        <input type="file" name="file" class="form-control image" accept=".xls,.xlsx"> 
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>
                    
                </div>
            </div>
        </div>
       
    </div>
</form>

<form method="post" action="{{route('saveImages')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-heading">
                    <h3 class="box-title">Add Images</h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="file[]" class="form-control" accept="" multiple=""> 
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-success" id="imagesubmit">
                    </div>
                    
                </div>
            </div>
        </div>
       
    </div>
</form>

     
</div>

@endsection
@section('scripts')

<!-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="{{asset('/assets/admin/js/laravel-file-manager-ck-editor.js')}}"></script> -->
<script src="{{asset('/assets/admin/js/sweetalert.js')}}" type="text/javascript"></script>
<script>
    // Ckeditor('highlight');
    // Ckeditor('description');
    $(document).ready(function(){
    $("#imagesubmit").click(function(e){

        var $fileUpload = $(".image");
        if (parseInt($fileUpload.get(0).files.length)>2){
         alert("You can only upload a maximum of 2 files");
        }
    });    
});

</script>
 
@endsection

