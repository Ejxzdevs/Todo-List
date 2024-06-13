<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){

        $products = Product::all();
        return view('products.index',['products' => $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
        ]);
        Product::create($data);
        return redirect()->route('product.create')->with('success', 'Product created successfully!');
    }
}
