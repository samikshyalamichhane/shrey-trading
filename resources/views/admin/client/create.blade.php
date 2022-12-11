@extends('layouts.admin')
@section('page_title') Add Client @endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
 
@section('content')
 

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Add user</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('clients.index')}}">All clients List</a>
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

    <form class="form form-responsive form-horizontal" action="{{route('clients.store')}}" enctype= "multipart/form-data" method="post">
        {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Clients Information</div>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-body">
                            
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label> Name</label>
                                    <input class="form-control" type="text" value="{{ old('name')}}" name="name" placeholder=" Name Here">
                                    @if($errors->has('name'))
                                    <span class=" alert-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" value="{{ old('email')}}" name="email" placeholder="Email Here">
                                    @if($errors->has('email'))
                                    <span class=" alert-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label> Phone Number</label>
                                    <input class="form-control" type="text" value="{{ old('phone_number')}}" name="phone_number" placeholder="Phone Number Here">
                                    @if($errors->has('phone_number'))
                                    <span class=" alert-danger">{{$errors->first('phone_number')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label> Address</label>
                                    <input class="form-control" type="text" value="{{old('address')}}" name="address" placeholder="Address Here">
                                    @if($errors->has('address'))
                                    <span class=" alert-danger">{{$errors->first('address')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label> Products</label>
                                    <select name="product_id[]" class="travel-style form-control" multiple>
                                    <option value="">-- select one --</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                                    
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
                            <div class="form-group">
                                        <label class="ui-checkbox ui-checkbox-primary" style="margin-top: 35px;">
                                            <input type="checkbox" name="status">
                                            <span class="input-span"></span><strong>Publish</strong>
                                        </label>
                                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.travel-style').select2({
        placeholder: "Select Products",
    });
});
</script>
<script>
    function preview() {
        frame.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
@endsection

