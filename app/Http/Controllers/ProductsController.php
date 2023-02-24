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
        $product = Products::create($request->all());
        return response()->json(['data' => $product, 'message' => 'Stored Successfully'], 200);
    }

   
    public function show($id)
    {
        $product = Products::find($id);
        return response()->json(['data' => $product], 200);
    }

 
    public function update(UpdateProductsRequest $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->all());
        return response()->json(['data' => $product, 'message' => 'Updated Successfully'], 200);
    }

 
    public function delete($id)
    {
     $product = Products::find($id);
     $product->delete();
     return response()->json(['message' => 'Deleted Successfully'], 200);
    }
}
