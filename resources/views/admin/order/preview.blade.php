<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
       "http://www.w3.org/TR/html4/strict.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order Details</title>
</head>

<body>
<div class="container" style="max-width: 700px; margin:0 auto; background: #f8f8ff; border:1px solid #e7e7ff; padding: 0px 15px 15px 15px; font-size: 16px; font-family: arial;" >
   
    <!-- customer detail table -->
    <section>
        
        <table style="width: 100%; font-size: 15px; margin-top: 20px;">
            <tr>
                <th style="text-align: left; font-weight: 500;"><span style="font-weight: 700;">Name : </span> {{$user->name}}</th>
                <th style="text-align: right; font-weight: 500;"><span style="font-weight: 700;">Date : </span> {{ Carbon\Carbon::parse($data->created_at)->format('F j, Y') }}</th>

            </tr>
            <tr>
            <th style="text-align: left; font-weight: 500;"><span style="font-weight: 700;">Order Note : </span> {{$data->order_note}}</th>

                 </tr>
            <!-- <tr>
                <th style="text-align: left;font-weight: 500; "> <span style="font-weight: 700;">Contact : </span> </th>
            </tr> -->
        </table>
    </section>
    <!-- bill table -->
     
    <section>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; " border="1px">
            <thead style="background: #343483; color:white;">
                <tr>
                     <th style="width: 100px; padding: 5px;">SN</th> 
                    <th style="width: 360px; padding: 5px;">Product Title</th>
                    <th style="width: 360px; padding: 5px;">Product Code</th>
                    <th style="padding: 5px;">Quantity</th>
                    <!-- <th style="padding: 5px;">Unit Price</th> -->
                    <th style="padding: 5px;">Total amount</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($description as $key=>$desc)
                <tr>
                     <td style="padding: 5px; text-align: center; font-weight: 600; border-bottom: 0; border-top: 0;">{{$loop->iteration}}</td> 
                    <td style="padding: 5px;border-bottom: 0; border-top: 0;">{{$desc->product_info->name}}</td>
                    <td style="padding: 5px;border-bottom: 0; border-top: 0;">{{$desc->product_info->code}}</td>
                    <td style="padding: 5px; text-align: right;border-bottom: 0;border-top: 0;">{{$desc->quantity}}/-</td>
                    <!-- <td style="padding: 5px; text-align: right;border-bottom: 0;border-top: 0;">{{number_format(@$desc->product_info->price, 2)}}/-</td> -->
                    <td style="padding: 5px; text-align: right;border-bottom: 0;border-top: 0;">{{number_format(@$desc->amount, 2)}}/-</td>
                    
                    
                </tr>
                
                @endforeach
                <tr>
                        <td><b>Total</b> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="padding: 5px; text-align: right;border-bottom: 0;border-top: 0;"><strong>{{number_format(@$data->amount, 2)}}/-</strong></td>
                    </tr>
            </tbody>   
        </table>
    </section>
    

    
 
</div>
</body>
</html>
