<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OrderListsExportView implements FromView
{
    protected $id;

    function __construct($id) {
            $this->id = $id;
            $this->order_lists = OrderList::where('order_id',$id)->get();
            $this->order = Order::where('id',$id)->first();
    }
    public function view(): View
    {
        return view('admin.order.orderstable',[
            'order_lists' => $this->order_lists,'order'=>$this->order]);
    }
}
