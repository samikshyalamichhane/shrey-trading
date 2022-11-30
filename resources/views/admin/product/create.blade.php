@extends('layouts.admin')
@section('page_title') {{ ($product_info) ? "Update" : "Add"}} Product @endsection

@section('content')

@include('admin.section.notifications')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ ($product_info) ? "Update" : "Add"}} Product</div>
            <div>
                <a class="btn btn-info btn-md" href="{{route('products.index')}}">All Products</a>
            </div>
        </div>
    </div>

    @if(@$product_info == null)
    <form class="form form-responsive form-horizontal" action="{{route('products.store')}}" enctype="multipart/form-data" method="post">
        @else
        <form class="form form-responsive form-horizontal" action="{{route('products.update', $product_info->id)}}" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_method" value="PUT">
            @endif
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-12">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Product Information</div>
                                </div>
                                <div class="ibox-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 form-group">
                                            <label><strong>Product Name</strong></label>
                                            <input class="form-control" type="text" value="{{ (@$product_info->name) ?  @$product_info->name: old('name')}}" name="name" placeholder="Product name Here">

                                            @if($errors->has('name'))
                                            <div class="error alert-danger">{{$errors->first('name')}}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label><strong> code</strong></label>
                                            <input class="form-control" type="text" id="code" value="{{ (@$product_info->code) ?  @$product_info->code: old('code')}}" name="code" placeholder="code">

                                            @if($errors->has('code'))
                                            <div class="error alert-danger">{{$errors->first('code')}}</div>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-sm-12 form-group">
                                            <label><strong> Price</strong></label>
                                            <input class="form-control" type="text" id="price_box" value="{{ (@$product_info->price) ?  @$product_info->price: old('price')}}" name="price" placeholder="Product Price">

                                            @if($errors->has('price'))
                                            <div class="error alert-danger">{{$errors->first('price')}}</div>
                                            @endif
                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label class="ui-checkbox ui-checkbox-primary" style="margin-top: 35px;">
                                            <input type="checkbox" name="publish" {{((@$product_info->publish == 1) ? 'checked' : '')}}>
                                            <span class="input-span"></span><strong>Publish</strong>
                                        </label>
                                    </div>
                                    @if($errors->has('status'))
                                    <span class=" alert-danger">{{$errors->first('status')}}</span>
                                    @endif
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit"> <span class="fa fa-send"></span>
                                            Save</button>
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
<script src="{{asset('/assets/admin/js/sweetalert.js')}}" type="text/javascript"></script>
<script>
    function preventAlph(className) {
        $(className).keypress(function(event) {
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    }
    var class_name = $('#price_box, #discount_bx');
    preventAlph(class_name);


    function showThumbnail(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        }
        reader.onload = function(e) {
            $('#thumbnail').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }

    function FailedResponseFromDatabase(message) {
        html_error = "";
        $.each(message, function(index, message) {
            html_error += '<p class ="error_message text-left"> <span class="fa fa-times"></span> ' + message + '</p>';
        });
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            html: html_error,
            confirmButtonText: 'Close',
            timer: 10000
        });
    }
</script>

@endsection