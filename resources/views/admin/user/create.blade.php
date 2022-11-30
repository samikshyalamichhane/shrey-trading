@extends('layouts.admin')
@section('page_title') {{ ($user_info) ? "Update" : "Add New"}} user @endsection
 
@section('content')
 

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ ($user_info) ? "Update" : "Add New "}} user</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('clients.index')}}">All user List</a>
            </div>
        </div>
    </div>
    <div class="ibox">
    @if($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <p><strong>Opps Something went wrong</strong></p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
</div>
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
{!! Session::get('success') !!}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
{!! Session::get('error') !!}
</div>
@endif
    </div>

    @if(@$user_info == null)
    <form class="form form-responsive form-horizontal" action="{{route('clients.store')}}" enctype= "multipart/form-data" method="post">
    @else
    <form class="form form-responsive form-horizontal" action="{{route('clients.update', $user_info->id)}}" enctype= "multipart/form-data" method="post">
    <input type="hidden" name="_method" value="PUT">
    @endif
        {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">user Information</div>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-body">
                            
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>user Name</label>
                                    <input class="form-control" type="text" value="{{(@$user_info->name) ? @$user_info->name : old('name')}}" name="name" placeholder="user name Here">
                                    @if($errors->has('name'))
                                    <span class=" alert-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>user Email</label>
                                    <input class="form-control" type="text" value="{{(@$user_info->email) ? @$user_info->email : old('email')}}" name="email" placeholder="user sub title Here">
                                    @if($errors->has('email'))
                                    <span class=" alert-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>user Phone Number</label>
                                    <input class="form-control" type="text" value="{{(@$user_info->phone_number) ? @$user_info->phone_number : old('phone_number')}}" name="phone_number" placeholder="user sub title Here">
                                    @if($errors->has('phone_number'))
                                    <span class=" alert-danger">{{$errors->first('phone_number')}}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" value="" name="password" placeholder="Password here">
                                    @if($errors->has('password'))
                                    <span class=" alert-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Re-password</label>
                                    <input class="form-control" type="password" value="" name="password_confirmation" placeholder="password_confirmation here">
                                    @if($errors->has('password_confirmation'))
                                    <span class=" alert-danger">{{$errors->first('password_confirmation')}}</span>
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
                                <label> Upload Image</label>
                                <input class="form-control" type="file" name="profile_image" id="image" accept="image/*" onchange="preview()">
                                <img id="frame" src="" width="100px" height="100px" />
                                @if($errors->has('profile_image'))
                                    <div class="error alert-danger">{{$errors->first('profile_image')}}</div>
                                @endif
                            </div>
                            @if(@$user_info->profile_image)
                            <img id="frame" src="{{ Storage::url(@$user_info->profile_image) }}" width="100px"
                                                height="100px" />
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
    function preview() {
        frame.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection

