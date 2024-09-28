<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryrRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;


use App\Traits\getMessage;

class CategoryController extends Controller
{
    use getMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categorys=Category::all();
        return CategoryResource::collection($Categorys);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryrRequest $request)
    {

    $category=Category::create($request->all());

    return $this->returnSuccess("Categorys has been created suuccessfuly",200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $CategoryId=Category::find($id);
        if(!$CategoryId){
            return $this->returnError("category not found",404);
        }

    else{


        return $this->returnData('category', new CategoryResource($CategoryId), "found", 200);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryrRequest $request,  $id)
    {
        $category=Category::find($id);
        if(!$category){
            return $this->returnError("category not found",404);
        }
        else{
       $category->update($request->all());





    }
        return $this->returnSuccess("Categorys has been update suuccessfuly",200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if(!$category){
            return $this->returnError("not found this category",404);
        }
        else{




        $category->delete();
        return $this->returnSuccess("delete category succesfully",200);
        }
    }
}
