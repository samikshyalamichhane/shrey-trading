<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(){
        if(auth()->user()){
            $orders = Order::latest()->get();
        } else {
            $orders = auth()->guard('client')->user()->orders;
        }
        return view('admin.order.list',compact('orders'));
    }

    public function show($id){
        $order = Order::with('order_list')->findOrFail($id);
        return view('admin.order.show',compact('order'));
    }

    public function submitOrder(Request $request){
        if (session('__cart')) {
            DB::beginTransaction();
            $cart_id  = \Str::random(10);
            $quantity=0;
            $amount=0;
            foreach(session('__cart') as $cart){
                $quantity +=$cart['quantity'];
                $amount +=$cart['price'] * $cart['quantity'];
            }
            //saveing order
            $track_no=\Str::random(10);
            $order_data =[
                'client_id'   =>auth()->guard('client')->user()->id,
                'quantity'=> $quantity,
                'amount'=>$amount,
                'order_note' => $request->message,
                'track_no'=>$track_no,
                'status' => 'New',
            ];
            $order = new Order();
            $order_id=$order->create($order_data);
            
            foreach (session('__cart') as $key => $cart_items) {
                // dd($cart_items);

                $order_list_data =[
                    'order_id'   =>$order_id->id,
                    'client_id'   =>auth()->guard('client')->user()->id,
                    'track_no'  =>$track_no,
                    'quantity'=> $cart_items['quantity'],
                    'amount'=>$cart_items['price'],
                    'product_id'=>$cart_items['id'],
                ];
                $order_list = new OrderList();
                $order_list->fill($order_list_data);
                $order_list->save();
                DB::commit();
            }
            request()->session()->forget('__cart');
            $order_data['order_id']=$order_id->id;
            $order_data['order_list']=$order_id->order_list;
            $order_data['amount']=$order_id->amount;
            return back()->with('success', 'Order has been placed successfully.');
        }
    }

    public function updateStatus(Request $request){
        $order = Order::where('id',$request->order_id)->first();
        $order->update(['status'=>$request->status]);
        return back()->with('success', 'Orderstatus has been changed successfully.');

    }

    public function delete($id,Request $request){
        $order = Order::where('id',$id)->first();
        $order->delete();
        return back()->with('success', 'Order has been deleted successfully.');
    }

    public function printOrder(Request $request){
        // dd($request->all());
        $data=Order::with('order_list','client')->where('id',$request->value)->first();
        $description=$data->order_list;
		$user = $data->client;
        return view('admin.order.preview',compact('data','description','user'));
    }
}
