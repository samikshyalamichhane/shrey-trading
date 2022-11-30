@extends('layouts.admin')
@section('page_title') {{ ($product_info) ? "Update" : "Add"}} Product @endsection
 
@section('content')
 
<div class="page-heading">
    <h1 class="page-title">  Product</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Home</a>
        </li>
        <li class="breadcrumb-item"> {{ ($product_info) ? "Update" : "Add"}} Product</li>
    </ol>

</div>
@include('admin.section.notifications')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ ($product_info) ? "Update" : "Add"}} Product</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('product.index')}}">All Products</a>
            </div>
        </div>

       <!--  <div class="ibox-body">

             
        </div> -->
    </div>

{{--dd($product_info)--}}
    
    <form class="form form-responsive form-horizontal" action="{{route('product-update', $product_info->id)}}" enctype= "multipart/form-data" method="post">
 
  
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Product Information</div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12 form-group">
                                    <label><strong>Product Title</strong></label>
                                    <input class="form-control" type="text" value="{{ (@$product_info->title) ?  @$product_info->title: old('title')}}"  disabled>

                                    @if($errors->has('title'))
                                    <div class="error alert-danger">{{$errors->first('title')}}</div>
                                    @endif
                                </div>
                                 
                                {{--
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label><strong>Summary</strong></label>
                                    <textarea name="summary" id="summary"   rows="5" placeholder="Summary Here" class="form-control" style="resize: none;">{{ (@$product_info->summary) ?  @$product_info->summary: old('summary')}}</textarea>
                                    @if($errors->has('summary'))
                                    <div class="error alert-danger">{{$errors->first('summary')}}</div>
                                    @endif
                                </div>
                                --}}
                                <div class="col-lg-2 col-sm-12 form-group">
                                    <label><strong>   Price</strong></label>
                                    <input class="form-control" type="text" value="{{ (@$product_info->price) ?  @$product_info->price: old('price')}}" disabled>

                                    @if($errors->has('price'))
                                    <div class="error alert-danger">{{$errors->first('price')}}</div>
                                    @endif
                                </div>
                               

                                <div class="col-lg-3 col-sm-12 form-group">
                                    <label><strong>  Brand</strong></label>
                                    <input class="form-control" type="text" value="{{ (@$product_info->brand) ?  @$product_info->brand: old('brand')}}" disabled>

                                    @if($errors->has('brand'))
                                    <div class="error alert-danger">{{$errors->first('brand')}}</div>
                                    @endif
                                </div>

                                <div class="col-lg-3 col-sm-12 form-group">
                                    <label><strong>  Model</strong></label>
                                    <input class="form-control" type="text" value="{{ (@$product_info->model) ?  @$product_info->model: old('model')}}" disabled>

                                    @if($errors->has('model'))
                                    <div class="error alert-danger">{{$errors->first('model')}}</div>
                                    @endif
                                </div>
                               

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label><strong>Product Highlights</strong></label>
                                    <textarea name="highlight" id="highlight"   rows="5" placeholder="Product Highlights Here" class="form-control" style="resize: none;">{{ (@$product_info->highlight) ?  @html_entity_decode($product_info->highlight): old('highlight')}}</textarea>
                                    @if($errors->has('highlight'))
                                    <div class="error alert-danger">{{$errors->first('highlight')}}</div>
                                    @endif
                                </div>
                                
                                
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label><strong>Description</strong></label>
                                    <textarea name="description" id="description"   rows="5" placeholder="description Here" class="form-control" style="resize: none;">{{ (@$product_info->description) ?  @html_entity_decode($product_info->description): old('description')}}</textarea>
                                    @if($errors->has('description'))
                                    <div class="error alert-danger">{{$errors->first('description')}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="col-lg-12 col-md-12 col-12">
                            
                            <div class="ibox-body">
                                <div class="form-group">
                                    <label> Updoad product Images</label>
                                    <input class="form-control" type="file" name="image[]" id="image" accept="image/*"  multiple>
                                </div>
                          


                                 @if(Session::get('image_warning'))
                                 <?php $image_error = Session::get('image_warning'); ?>
                            
                                     
                                    @foreach($image_error as $err)
                                    <div class="error alert-danger">{{$err}}</div>
                                    @endforeach
                                 @endif

                                 
                                 
                                 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(isset($product_info->other_image) && $product_info->other_image->count())
                        @foreach($product_info->other_image as $image_key => $image_data)   
                        <div class="col-lg-3 col-md-12 col-12  image_id{{$image_data->id}}">
                            <div class="ibox">
                                
                                @if(isset($image_data->images) && !empty($image_data->images) && file_exists(public_path().'/uploads/product/other-image/'.$image_data->images))
                           
                                <div class="form-group">
                                    <div class="m-r-10 product_images">
                                        <div class="remove_image" data-image_id ="{{$image_data->id}}"><i class="fa fa-times"></i></div>
                                        <img src="{{asset('/uploads/product/other-image/'.$image_data->images)}}" alt="No Image" class=" img img-thumbnail  img-sm rounded" id="thumbnail" >
                                    </div>
                                </div>
                                @endif 
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                    </div>
                       
                </div>
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit"> <span class="fa fa-send"></span> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
     
</div>

@endsection
@section('scripts')

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="{{asset('/assets/admin/js/laravel-file-manager-ck-editor.js')}}"></script>
<script>
    Ckeditor('highlight', 100);
    Ckeditor('description', 250);

    function showThumbnail(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        }
        reader.onload = function(e){
            $('#thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }

    $(document).ready(function(){
        $('body').on('click','.remove_image', function(e){
            e.preventDefault();
            var image_id = $(this).data('image_id');
            // alert(image_id);
            $.ajax({
                url: "{{route('deleteImageById')}}",
                method: "POST",
                data:{
                    id: image_id,
                    _token: "{{csrf_token()}}"
                },
                success :function (response){
                    if (response.status == false) {
                        FailedResponseFromDatabase(response.message);
                    }
                    if (response.status == true) {
                        $('.image_id'+image_id).fadeOut(2000);
                        DataSuccessInDatabase(response.message);
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

