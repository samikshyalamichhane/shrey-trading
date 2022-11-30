@extends('layouts.admin')
@section('page_title')  Order @endsection
 
@section('content')
 
<div class="page-heading">
</div>
@include('admin.section.notifications')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            
            <div class="ibox-title"> Order</div>
             
            <div>
                <a class="btn btn-info btn-md" href="{{route('orders.index')}}">All Order List</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-12" id="get__print">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Order Information</div>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 form-group">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Product Name</th>
                                                <th>Code</th>
                                                <th>Quantity</th>
                                                <!-- <th>Unit Price</th> -->
                                                <!--<th>Discounted Price</th>-->
                                                <!-- <th>Total amount</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($order->order_list as $order_list)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{@$order_list->product_info->name}}</td>
                                                <td>{{@$order_list->product_info->code}}</td>
                                                <td>{{@$order_list->quantity}}</td>
                                            </tr>
                                            @endforeach
                                            <tr >
                                                <td colspan="3">
                                                <b> Total=</b>
                                                </td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <b> Order Note</b>
                                                </td>
                                                <td>{{$order->order_note}}</td>
                                            </tr>
                                        </tbody>
                                            
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                 
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>

     
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
          url:"",
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

