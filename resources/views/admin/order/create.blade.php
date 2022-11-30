@extends('layouts.admin')
@section('page_title') {{ ($order_info) ? "Update" : "Add New"}} Order @endsection
 
@section('content')
 
<div class="page-heading">
    <h1 class="page-title">  Order</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}"><i class="la la-home font-20"></i> Home</a>
        </li>
        <li class="breadcrumb-item"> {{ ($order_info) ? "Update" : "Add New "}} Order</li>
    </ol>

</div>
@include('admin.section.notifications')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            
            <div class="ibox-title">{{ ($order_info) ? "Update" : "Add New "}} Order</div>
             
            <div>
                <a class="btn btn-info btn-md" href="{{route('order-list')}}">All Order List</a>
            </div>
        </div>
    </div>

    @if(@$order_info == null)
    <form class="form form-responsive form-horizontal" action="{{route('order_store')}}" enctype= "multipart/form-data" method="post">
    @else
    <form class="form form-responsive form-horizontal" action="{{route('order_update', $order_info->id)}}" enctype= "multipart/form-data" method="post">
 
    @endif
        {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12" id="get__print">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Order Information</div>
                            <div class="ibox-tools">
                                {{--
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    --}} 
                                {{--dd($order_info)--}}
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Product Title</th>
                                                <!--<th>Image</th>-->
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <!--<th>Discounted Price</th>-->
                                                <th>Total amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($order_info->order_list as $order_list)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{@$order_list->product_info->title}}</td>
                                                <!--<td><img src="{{asset('/uploads/product/thumbnail/'.$order_list->product_info->image)}}" alt="No Image" class=" img img-thumbnail  img-sm rounded" id="thumbnail" width="100" height="100"></td>-->
                                                <td>{{@$order_list->quantity}}</td>

                                                <td>{{number_format(@$order_list->product_info->price, 2)}}</td>
                                                <!--<td>Rs. {{@discount($order_list->product_info->price, $order_list->product_info->discount)}}</td>-->
                                                <td>

                                                    {{number_format(@$order_list->amount, 2)}}

                                                </td>
                                            </tr>
                                            @endforeach
                                            <?php
                                                $amount=$order_info->amount;
                                                $extra=200;
                                                if($amount<1200){
                                                    $new_amount=$amount+200;
                                                }else{
                                                    $new_amount=$amount;
                                                }
                                            ?>
                                            <tr>
                                                <td colspan="4">
                                                <b>Grand Total=</b>
                                                </td>
                                                <td><b>{{number_format(@$new_amount,2)}}</b>{{--@if($order_info->amount<1200)(order is less than 1200 .Added extra 200) @endif--}}</td>
                                            </tr>
                                        </tbody>
                                            
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><strong>Shipping Detail</strong></h4>
                                </div>
                                {{--
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>Product Title</label>
                                    <input class="form-control" type="text" value="{{(@$order_info->product_info->title) ? @$order_info->product_info->title : old('title')}}" name="title" placeholder="Product Title Here" disabled>
                                    @if($errors->has('title'))
                                    <span class=" alert-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>Quantity</label>
                                    <input class="form-control" type="text" value="{{(@$order_info->quantity) ? @$order_info->quantity : old('quantity')}}" name="quantity" placeholder="Product quantity Here" disabled>
                                    @if($errors->has('title'))
                                    <span class=" alert-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                --}}
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" value="{{@$order_info->user_info->name}}" name="name" placeholder="Name" disabled>
                                    @if($errors->has('phone'))
                                    <span class=" alert-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" value="{{@$order_info->user_info->email}}" name="name" placeholder="Email" disabled>
                                   
                                </div>
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>Phone No</label>
                                    <input class="form-control" type="text" value="{{(@$order_info->phone) ? @$order_info->phone : old('phone')}}" name="phone" placeholder="Product phone Here" disabled>
                                    @if($errors->has('phone'))
                                    <span class=" alert-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>Track No</label>
                                    <input class="form-control" type="text" value="{{$order_info->track_no}}" name="order_id" placeholder="Product order_id Here" disabled>
                                    @if($errors->has('order_id'))
                                    <span class=" alert-danger">{{$errors->first('order_id')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" value="{{(@$order_info->city) ? @$order_info->city : old('city')}}" name="city" placeholder="Product city Here" disabled>
                                    @if($errors->has('city'))
                                    <span class=" alert-danger">{{$errors->first('city')}}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-sm-12 form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address"  rows="3" disabled class="form-control resize_no">{{(@$order_info->address) ? @$order_info->address : old('address')}}</textarea>
                                   
                                    @if($errors->has('address'))
                                    <span class=" alert-danger">{{$errors->first('address')}}</span>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-sm-12 form-group">
                                    <label>Order Note</label>
                                    <textarea name="order_note" id="order_note"  rows="3" disabled class="form-control resize_no">{{(@$order_info->order_note) ? @$order_info->order_note : old('order_note')}}</textarea>
                                   
                                    @if($errors->has('order_note'))
                                    <span class=" alert-danger">{{$errors->first('order_note')}}</span>
                                    @endif
                                </div>
                                
                                @if($order_info->google_map)
                                <div class="col-lg-12 col-sm-12 form-group">
                                    Location:
                                    <a href="{{$order_info->google_map}}">Check on Map</a>
                                    <!--here <iframe src="{{$order_info->google_map}}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-body">
                       
                            
                            <div class="form-group">
                                <label>Order Status:</label>
                                <select class="form-control" name="status">
                                    <option value="New" {{@($order_info->status == "New") ? "selected" :""}}>New</option>
                                    <option value="Verified" {{@($order_info->status == "Verified") ? "selected" :""}}>Verified</option>

                                    <option value="Cancel" {{@($order_info->status == "Cancel") ? "selected" :""}}>Cancel</option>

                                    <option value="Process" {{@($order_info->status == "Process") ? "selected" :""}}>Process</option>
                                    <option value="Delivered" {{@($order_info->status == "Delivered") ? "selected" :""}}>Delivered</option>
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
    <a class="btn btn-info print" href="#" title="Edit" data-id="{{$order_info->id}}"><span class="fa fa-edit"></span>Print</a>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
<script type="text/javascript">
    $('.print__button').click(function() {
        $("#get__print").printThis({
            header: null,
            footer: null,
        });
    });
</script>

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
 
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $(document).ready(function(){
      $('.print').click(function(e){
        e.preventDefault();
        value = $(this).data('id');
        $.ajax({
          method:"post",
          url:"{{route('printOrder')}}",
          data:{value:value},
          success:function(data){
            var mywindow = window.open('','','left=0,top=0,width=950,height=600,toolbar=0,scrollbars=0,status=0,addressbar=0');

                var is_chrome = Boolean(mywindow.chrome);
                mywindow.document.write(data);
                mywindow.document.close();
                if (is_chrome) {
                        mywindow.onload = function() { // wait until all resources loaded 
                            mywindow.focus(); // necessary for IE >= 10
                            mywindow.print();  // change window to mywindow
                            mywindow.close();// change window to mywindow
                        };
                    }
                    else {
                        mywindow.document.close(); // necessary for IE >= 10
                        mywindow.focus(); // necessary for IE >= 10
                        mywindow.print();
                        mywindow.close();
                    }

                    return true;
             // console.log(data);
             // newWin.moveTo(0, 0);
             // newWin.resizeTo(screen.width, screen.height);
             // newWin.document.write(data);
             // setTimeout(function() {
             //     newWin.print();
             //     newWin.close();
             // }, 3000);

             
        }
        });
      });
    });
</script>
@endsection

