<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;

use App\Http\Resources\ProductResource;
use App\Models\Product;

use App\Traits\getMessage;

class ProductController extends Controller
{
    use getMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

    $product=Product::create($request->all());

      if ($request->has('tags_id')) {
        $product->tags()->attach($request->tags_id);
    }
    return $this->returnSuccess("products has been created suuccessfuly",200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $productId=Product::find($id);
        if(!$productId){
            return $this->returnError("prduct not found",404);
        }

    else{


        return $this->returnData('product', new ProductResource($productId), "found", 200);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(productRequest $request,  $id)
    {
        $product=Product::find($id);
        if(!$product){
            return $this->returnError("product not found",404);
        }
        else{
       $product->update($request->all());




        if ($request->has('tags_id')) {
           {
                $product->tags()->sync($request->tags);
            }
        }
    }
        return $this->returnSuccess("products has been update suuccessfuly",200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if(!$product){
            return $this->returnError("not found this product",404);
        }
        else{


        $product->tags()->detach();

        $product->delete();
        return $this->returnSuccess("delete product succesfully",200);
        }
    }
}
