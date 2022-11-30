@extends('layouts.admin')
@section('page_title') {{ ($page_info) ? "Update" : "Add"}} Page @endsection
 
@section('content')
 
<div class="page-heading">
    <h1 class="page-title text-capitalize"> {{@$page_info->title}}</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Home</a>
        </li>
        <li class="breadcrumb-item"> {{ ($page_info) ? "Update" : "Add"}} Page Info</li>
    </ol>

</div>
@include('admin.section.notifications')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ ($page_info) ? "Update" : "Add"}} Page Info</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('page.index')}}">All Page list</a>
            </div>
        </div>
    </div>

{{--dd($page_info)--}}
    @if(@$page_info == null)
    <form class="form form-responsive form-horizontal" action="{{route('page.store')}}" enctype= "multipart/form-data" method="post">
    @else
    <form class="form form-responsive form-horizontal" action="{{route('page.update', $page_info->id)}}" enctype= "multipart/form-data" method="post">
    <input type="hidden" name="_method" value="PUT">
    @endif
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label><strong>Page Name</strong></label>
                                    <input class="form-control text-capitalize" type="text" value="{{ (@$page_info->name) ?  @$page_info->name: old('name')}}" name="name" placeholder="Page Name Here">

                                    @if($errors->has('name'))
                                    <div class="error alert-danger">{{$errors->first('name')}}</div>
                                    @endif
                                </div>
                                @if(($page_info->page_type == 'article') || ($page_info->page_type == 'service'))
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label><strong>Page slogan</strong></label>
                                    <input class="form-control text-capitalize" type="text" value="{{ (@$page_info->summary) ?  @$page_info->summary: old('summary')}}" name="summary" placeholder="Page summary Here">

                                    @if($errors->has('summary'))
                                    <div class="error alert-danger">{{$errors->first('summary')}}</div>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>
                                        <strong>Description</strong>
                                    </label>
                                    <textarea name="description" id="description"  rows="5" class="form-control">{{ (@$page_info->description) ?  @html_entity_decode($page_info->description): old('description')}}</textarea>
                                    @if($errors->has('description'))
                                    <div class="error alert-danger">{{$errors->first('description')}}</div>
                                    @endif
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-12">
                                <strong style="font-size: 18px; margin-top: 15px; margin-bottom: 15px;"> SEO Tools</strong>
                                    <div class="form-group">
                                        <label for=""><strong>Meta Title</strong></label>
                                        <textarea name="meta_title" id="meta_title" rows="3" class="form-control" placeholder="Meta Title" style="resize:none;" >{{ (@$page_info->meta_title) ?  @$page_info->meta_title: old('meta_title')}}</textarea>
                                        @if($errors->has('meta_title'))
                                        <div class="error alert-danger">{{$errors->first('meta_title')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Meta Description</strong></label>
                                        <textarea name="meta_description" id="meta_description" rows="3" class="form-control" placeholder="Meta Description here" style="resize:none;">{{ (@$page_info->meta_description) ?  @$page_info->meta_description: old('meta_description')}}</textarea>
                                        @if($errors->has('meta_description'))
                                        <div class="error alert-danger">{{$errors->first('meta_description')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Keyword</strong></label>
                                        <textarea name="meta_keyword" id="meta_keyword" rows="3" class="form-control" placeholder="Meta keyword here" style="resize:none;">{{ (@$page_info->meta_keyword) ?  @$page_info->meta_keyword: old('meta_keyword')}}</textarea>
                                        @if($errors->has('meta_keyword'))
                                        <div class="error alert-danger">{{$errors->first('meta_keyword')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for=""><strong>Meta Keyphrase </strong></label>
                                        <textarea name="meta_keyphrase" id="meta_keyphrase" rows="3" class="form-control" placeholder="Meta keyphrase here" style="resize:none;">{{ (@$page_info->meta_keyphrase) ?  @$page_info->meta_keyphrase: old('meta_keyphrase')}}</textarea>
                                        @if($errors->has('meta_keyphrase'))
                                        <div class="error alert-danger">{{$errors->first('meta_keyphrase')}}</div>
                                        @endif
                                    </div>
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
                            @if(isset($page_info->image) && !empty($page_info->image) && file_exists(public_path().'/uploads/Page/'.$page_info->image))
                                @php
                                $thumbnail = asset('/uploads/Page/'.$page_info->image);
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
                                    <option value="Publish" {{@($page_info->status == "Publish") ? "selected" :""}}>Publish</option>
                                    <option value="Unpublish" {{@($page_info->status == "Unpublish") ? "selected" :""}}>Unpublish</option>
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="{{asset('/assets/admin/js/laravel-file-manager-ck-editor.js')}}"></script>
<script>
    Ckeditor('description');

    function preventAlph(className){
        $('#quantity').keypress(function(event) {
            if ((event.which != 46 || $(this).val().indexOf('.') != 1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    }
    preventAlph();
</script>
@endsection

