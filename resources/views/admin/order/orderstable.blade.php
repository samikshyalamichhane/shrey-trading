<table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Product Name</th>
                                                <th>Ordered By</th>
                                                <th>Code</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach(@$order_lists as $order_list)

                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{@$order_list->product_info->name}}</td>
                                                <td>{{@$order->client->name}}</td>
                                                <td>{{@$order_list->product_info->code}}</td>
                                                <td>{{@$order_list['quantity']}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">
                                                    <b> Total=</b>
                                                </td>
                                                <td>{{$order->quantity}}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b> Order Note</b>
                                                </td>
                                                <td>{{$order->order_note}}</td>
                                            </tr>
                                        </tbody>

                                    </table>