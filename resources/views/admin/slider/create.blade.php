@extends('layouts.admin')
@section('page_title') {{ ($slider_info) ? "Update" : "Add New"}} slider @endsection
 
@section('content')
 
<div class="page-heading">
    <h1 class="page-title">  slider</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Home</a>
        </li>
        <li class="breadcrumb-item"> {{ ($slider_info) ? "Update" : "Add New "}} slider</li>
    </ol>

</div>
@include('admin.section.notifications')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ ($slider_info) ? "Update" : "Add New "}} slider</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('slider.index')}}">All slider List</a>
            </div>
        </div>
    </div>

    @if(@$slider_info == null)
    <form class="form form-responsive form-horizontal" action="{{route('slider.store')}}" enctype= "multipart/form-data" method="post">
    @else
    <form class="form form-responsive form-horizontal" action="{{route('slider.update', $slider_info->id)}}" enctype= "multipart/form-data" method="post">
    <input type="hidden" name="_method" value="PUT">
    @endif
        {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Slider Information</div>
                            <div class="ibox-tools">
                                {{--
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    --}} 
                                 {{--dd($slider_info)--}}
                            </div>
                        </div>
                        <div class="ibox-body">
                            
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>Slider Title</label>
                                    <input class="form-control" type="text" value="{{(@$slider_info->title) ? @$slider_info->title : old('title')}}" name="title" placeholder="Slider Title Here">
                                    @if($errors->has('title'))
                                    <span class=" alert-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>Slider Sub-Title</label>
                                    <input class="form-control" type="text" value="{{(@$slider_info->sub_title) ? @$slider_info->sub_title : old('sub_title')}}" name="sub_title" placeholder="Slider sub title Here">
                                    @if($errors->has('sub_title'))
                                    <span class=" alert-danger">{{$errors->first('sub_title')}}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>URL</label>
                                    <input class="form-control" type="text" value="{{(@$slider_info->link) ? @$slider_info->link : old('link')}}" name="link" placeholder="Shop now link here">
                                    @if($errors->has('link'))
                                    <span class=" alert-danger">{{$errors->first('link')}}</span>
                                    @endif
                                </div>
                            </div>
                          
                           
                           
                            
 
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="form-group">
                                <label> Updoad Banner</label>
                                <label>[ Image size: width:1420px, height:400px ]</label>
                                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="showThumbnail(this);">
                                @if($errors->has('image'))
                                    <div class="error alert-danger">{{$errors->first('image')}}</div>
                                @endif
                            </div>
                            @php
                            $thumbnail = asset('assets/admin/images/default.png');
                            @endphp
                            @if(isset($slider_info->image) && !empty($slider_info->image) && file_exists(public_path().'/uploads/slider/'.$slider_info->image))
                                @php
                                $thumbnail = asset('/uploads/slider/'.$slider_info->image);
                                @endphp
                            @endif 
                            <div class="form-group">
                                <div class="m-r-10">
                                    <img src="{{$thumbnail}}" alt="No Image" class=" img img-thumbnail  img-sm rounded" id="thumbnail" >
                                </div>
                            </div>




                            <div class="form-group">
                                <label> Updoad Banner</label>
                                <input class="form-control" type="file" name="inner_image" id="inner_image" accept="image/*" onchange="showThumbnailInner(this);">
                                @if($errors->has('inner_image'))
                                    <div class="error alert-danger">{{$errors->first('inner_image')}}</div>
                                @endif
                            </div>
                            @php
                            $inner_image_thumbail = asset('assets/admin/images/default.png');
                            @endphp
                            @if(isset($slider_info->inner_image) && !empty($slider_info->inner_image) && file_exists(public_path().'/uploads/slider/'.$slider_info->inner_image))
                                @php
                                $inner_image_thumbail = asset('/uploads/slider/'.$slider_info->inner_image);
                                @endphp
                            @endif 
                            <div class="form-group">
                                <div class="m-r-10">
                                    <img src="{{$inner_image_thumbail}}" alt="No Image" class=" img img-thumbnail  img-sm rounded" id="inner_image_thumbail" >
                                </div>
                            </div>



                             
                             
                            
                            <div class="form-group">
                                <label>Status:</label>
                                <select class="form-control" name="status">
                                    <option value="Publish" {{@($slider_info->status == "Publish") ? "selected" :""}}>Publish</option>
                                    <option value="Unpublish" {{@($slider_info->status == "Unpublish") ? "selected" :""}}>Unpublish</option>
                                </select>
                            </div>
                            @if($errors->has('status'))
                            <span class=" alert-danger">{{$errors->first('status')}}</span>
                            @endif
                            
                             
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
    function showThumbnail(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        }
        reader.onload = function(e){
            $('#thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    function showThumbnailInner(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        }
        reader.onload = function(e){
            $('#inner_image_thumbail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>
 
@endsection

