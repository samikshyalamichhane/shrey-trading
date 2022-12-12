@extends('layouts.admin')
@section('page_title') Product @endsection
 
@section('content')
 
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
    <form action="{{ route('saveExcel') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file"
                           class="form-control">
                    <br>
                    <button class="btn btn-success">
                          Import Product Data
                       </button>
                    
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

