@extends('layouts.admin')
@section('page_title') {{ ($ad_info) ? "Update" : "Add New"}} Advertise @endsection
 
@section('content')
 
<div class="page-heading">
    <h1 class="page-title">  Advertise</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Home</a>
        </li>
        <li class="breadcrumb-item"> {{ ($ad_info) ? "Update" : "Add New "}} Advertise</li>
    </ol>

</div>
@include('admin.section.notifications')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ ($ad_info) ? "Update" : "Add New "}} Advertise</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('advertise.index')}}">All Advertise List</a>
            </div>
        </div>
    </div>

    @if(@$ad_info == null)
    <form class="form form-responsive form-horizontal" action="{{route('advertise.store')}}" enctype= "multipart/form-data" method="post">
    @else
    <form class="form form-responsive form-horizontal" action="{{route('advertise.update', $ad_info->id)}}" enctype= "multipart/form-data" method="post">
    <input type="hidden" name="_method" value="PUT">
    @endif
        {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Advertise Information</div>
                            <div class="ibox-tools">
                                {{--
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    --}} 
                                 {{--dd($ad_info)--}}
                            </div>
                        </div>
                        <div class="ibox-body">
                            
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>Advertise Title</label>
                                    <input class="form-control" type="text" value="{{(@$ad_info->title) ? @$ad_info->title : old('title')}}" name="title" placeholder="Advertise Title Here">
                                    @if($errors->has('title'))
                                    <span class=" alert-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                            </div>
                            {{--
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>Advertise Page</label>
                                    <input class="form-control" type="text" value="{{(@$ad_info->page) ? @$ad_info->sub_title : old('sub_title')}}" name="sub_title" placeholder="Slider sub title Here">
                                    @if($errors->has('sub_title'))
                                    <span class=" alert-danger">{{$errors->first('sub_title')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>Advertise Position</label>
                                    <input class="form-control" type="text" value="{{(@$ad_info->sub_title) ? @$ad_info->sub_title : old('sub_title')}}" name="sub_title" placeholder="Slider sub title Here">
                                    @if($errors->has('sub_title'))
                                    <span class=" alert-danger">{{$errors->first('sub_title')}}</span>
                                    @endif
                                </div>
                            </div>
                            --}}
                        
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>URL</label>
                                    <input class="form-control" type="text" value="{{(@$ad_info->link) ? @$ad_info->link : old('link')}}" name="link" placeholder="Advertise link here">
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
                                <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="showThumbnail(this);">
                                @if($errors->has('image'))
                                    <div class="error alert-danger">{{$errors->first('image')}}</div>
                                @endif
                            </div>
                            @php
                            $thumbnail = asset('assets/admin/images/default.png');
                            @endphp
                            @if(isset($ad_info->image) && !empty($ad_info->image) && file_exists(public_path().'/uploads/advertise/'.$ad_info->image))
                                @php
                                $thumbnail = asset('/uploads/advertise/'.$ad_info->image);
                                @endphp
                            @endif 
                            <div class="form-group">
                                <div class="m-r-10">
                                    <img src="{{$thumbnail}}" alt="No Image" class=" img img-thumbnail  img-sm rounded" id="thumbnail" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status:</label>
                                <select class="form-control" name="status">
                                    <option value="Publish" {{@($ad_info->status == "Publish") ? "selected" :""}}>Publish</option>
                                    <option value="Unpublish" {{@($ad_info->status == "Unpublish") ? "selected" :""}}>Unpublish</option>
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
    
</script>
 
@endsection

