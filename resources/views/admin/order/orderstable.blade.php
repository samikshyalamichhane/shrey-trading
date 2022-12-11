<table class="table table-responsive">
    <thead>
        <tr>
            <th>SN</th>
            <th>Product Name</th>
            <!--<th>Ordered By</th>-->
            <th>Quantity</th>
            <th>Code</th>
            <th>Total amount</th>
        </tr>
    </thead>
    <tbody>

        @foreach(@$order_lists as $order_list)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{@$order_list->product_info->name}}</td>
            <!--<td>{{@$order->client->name}}</td>-->
            <td>{{@$order_list['quantity']}}</td>
            <td>{{@$order_list->product_info->code}}</td>
            <td>{{@$order_list['amount']}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2">
                <b> Total Quantity</b>
            </td>
            <td>{{$order->quantity}}</td>
        </tr>
        <tr>
            <td colspan="4">
                <b> Total Amount</b>
            </td>
            <td>Rs.{{number_format(@$order->amount, 2)}}</td>
        </tr>
        <tr>
            <td>
                <b> Order Note::</b>
            </td>
            <td>{{$order->order_note}}</td>
        </tr>
    </tbody>

</table>