<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;

class ProductsController extends Controller
{
    public function index()
    {
       $products = Products::all();
       return response()->json(['data' => $products], 200);
    }

  
  
    public function store(StoreProductsRequest $request)
    {
        // $file_name= $this->saveImage($request->photo,'images/');

        $file_name = $request->file('photo')->store('image', 'public');

        $product = Products::create([
            'name' => $request->name,
            'photo' => $file_name,
            'price' => $request->price
        ]);
        return response()->json(['data' => $product, 'message' => 'Stored Successfully'], 200);
    }

   
    public function show($id)
    {
        $product = Products::find($id);
        return response()->json(['data' => $product], 200);
    }

 
    public function update(UpdateProductsRequest $request, $id)
    {


        $file_name = $request->file('photo')->store('image', 'public');
        
        $product = Products::find($id);
        
        $product->update(
            [
            'name' => $request->name,
            'photo' =>$file_name,
            'price' => $request->price]
        );
        return response()->json(['data' => $product, 'message' => 'Updated Successfully'], 200);
    }

 
    public function delete($id)
    {
     $product = Products::find($id);
     $product->delete();
     return response()->json(['message' => 'Deleted Successfully'], 200);
    }
}
