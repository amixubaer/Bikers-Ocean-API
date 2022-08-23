<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function addProduct(Request $request){

        $product = new Product;
        $product->name = $request-> input('name');
        $product->price = $request-> input('price');
        $product->type = $request-> input('type');
        $product->brand = $request-> input('brand');
        $product->description = $request-> input('description');
        $product->file_path = $request-> file('file') -> store('products');
        $product-> save();
        return $product;

    }

    function allProduct(){

        return Product::all();
    }


    function deleteProduct($id){

        $result = Product::where('id', $id) -> delete();
        if ($result){
            return ["result" => "Product has been deleted"];
        }
        else{
            return ["result" => "Operation Failed"];
        }
    }

    function getProduct($id){

        return Product::find($id);
    }

    function latestProduct(){
        $latestproduct = Product::orderBy('created_at', 'DESC' ) -> get()->take(6);
        return $latestproduct;
    }

    function updateProduct($id, Request $request){

        $product = Product::find($id);
        $product->name = $request-> input('name');
        $product->price = $request-> input('price');
        $product->type = $request-> input('type');
        $product->brand = $request-> input('brand');
        $product->description = $request-> input('description');
        if($request->file('file')){
            $product->file_path = $request-> file('file') -> store('products');
        }
        $product-> save();
        return $product;
    }

    function search($key){

        return Product::where('name', 'Like', "%$key%")-> get();
    }
}
