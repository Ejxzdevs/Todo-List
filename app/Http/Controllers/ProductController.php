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

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
        ]);
        Product::create($data);
        return redirect()->route('index');
    }

    public function viewDetails(product $product){
        return view('products.view',['product' => $product]);
    }

    public function editDetails(Request $request,Product $product) {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
        ]);
        $product->update($data);
        return redirect()->route('product.details', $product->id);
        
    }

    public function deleteDetails(Product $product){
        $product->delete();
        return redirect()->route('index');
    }
}
