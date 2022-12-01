<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderListsExport;
use App\Exports\OrderListsExportView;
use App\Http\Controllers\Controller;
use App\Imports\OrderListImport;
use App\Models\Order;
use Illuminate\Http\Request;
use Excel;


class ExportController extends Controller
{
    public function export_view($id) 
    {
        $order = Order::with('order_list')->where('id',$id)->first();
        return Excel::download(new OrderListsExportView($order->id), 'order_lists.xlsx');
    }
     
}
