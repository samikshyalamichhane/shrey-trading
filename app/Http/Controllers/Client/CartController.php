<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use Session;
use DB;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session as FacadesSession;

class CartController extends Controller
{
    protected $product = null ;
    protected $order = null; 
    public function __construct(Product $_product,  Order $_order){
		$this->product = $_product;
        $this->order = $_order;
	}

	public function CartAdd(Request $request){
    	// dd($request->all());
        $product = Product::findOrFail($request->product_id);
          
        $cart = session()->get('__cart', []);
  
        if(isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']++;
        } else {
            $cart[$request->product_id] = [
                "id" => $product->id,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "code" => $product->code
            ];
        }
        // dd($cart);
        session()->put('__cart', $cart);
        // if(is_numeric($request->quantity)){
        //             $this->product = $this->product->find($request->product_id);
        //             if (!$this->product) {
        //                 return response()->json(['success' => false, 'data'=>null, 'message' =>'Product Not Found.']);
        //             }
        //             // $cart = []; first created this 
        //             $cart = $request->session()->get('__cart');
        //             // dd($cart);
        //             // $args = [ 'price'=> $this->product->price, 'discount'=>$this->product->discount];
        //             $current_item = [
        //                 'id' => $this->product->id,
        //                 'name' => $this->product->name,
        //                 'price'=>$this->product->price,
        //                 'code'=>$this->product->code,
        //             ];

        //             if (!empty($cart)) {
        //                 $index = null;
        //                 foreach ($cart as $key => $cart_items) {
        //                     // dd($cart_items['id']);
        //                     if ($cart_items['id'] == $request->product_id) {
        //                         $index = $key;
        //                         break;
        //                     }
        //                 }
        //                 if ($index !== null) {
        //                     // dd($request->quantity);
        //                     // cart item exists item also exists
        //                     $cart[$index]['quantity'] += (int)$request->quantity;
        //                     $cart[$index]['amount'] = $request->price * $cart[$index]['quantity'];
        //                 } else {
        //                     // case cart exists  but item not exists
        //                     $current_item['quantity']= (int)$request->quantity;
        //                     $current_item['amount'] = $request->price * $request->quantity;
        //                     $cart[] = $current_item;
        //                 }
        //                 // dd($cart);
        //             // }
        //             }else{
        //                 // initial insert
        //                 $current_item['quantity']= (int)$request->quantity;
        //                 // $current_item['amount'] = $request->price * $request->quantity;
        //                 $cart[] = $current_item;
        //             }
        //             Session::put('__cart', $cart);
        //             $total = 0; 
        //             foreach ($cart as $key => $value) {
        //                 $total += $value['quantity'];
        //             }
        //             // dd($cart);
        //             $products = $this->product->get();
                    return response()->json(['status' => true, 
                        'cart' => $cart,
                        'message' => "Product added to the cart Successfully."
                    ]);
        // }else{
            // return  response()->json(['success' => false, 'data'=>null, 'message' =>'some thing went wrong.']);
        // }
    	
    }

    public function CartDeduct(Request $request){
    	// dd($request->all());
        $product = Product::findOrFail($request->product_id);
          
        $cart = session()->get('__cart', []);
  
        if(isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']--;
        } else {
            $cart[$request->product_id] = [
                "id" => $product->id,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "code" => $product->code
            ];
        }
        // dd($cart);
        session()->put('__cart', $cart);
        return response()->json(['status' => true, 
            'cart' => $cart,
            'message' => "Product added to the cart Successfully."
        ]);
    }

    public function DeleteCart( Request $request){
        if($request->product_id) {
            $cart = session()->get('__cart');
            // dd($request->all(),$cart);
            foreach($cart as $key=>$car){
                // dd($car,$request->product_id);
                if($car['id'] == $request->product_id) {
                    unset($car);
                    session()->put('__cart', $cart);
                }
            }
            
            // session()->flash('success', 'Product removed successfully');
        }
        return response()->json(['status' => 'product delete', 
            'cart' => $cart
        ]);
    }

    
}
