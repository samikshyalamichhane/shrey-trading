<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.list',compact('products'));
    }

    public function create()
    {
        $product_info = null;
       return view('admin.product.create',compact('product_info'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'price' => 'nullable',
        ]);
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->code = $request->code;
            $product->price = $request->price;
            $product->publish = $request->publish ? 1 : 0;
            $product->save();
            return redirect()->route('products.index')->with('success', 'product created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product_info  = Product::findOrFail($id);
        return view('admin.product.create', compact('product_info'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|string|min:6|max:20',
            'code' => 'required',
            'price' => 'nullable',
        ]);
        try {
            $product->name = $request->name;
            $product->code = $request->code;
            $product->price = $request->price;
            $product->publish = $request->publish ? 1 : 0;
            $product->save();
            return redirect()->route('products.index')->with('success', 'product updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product removed successfully');
    }
}
