<?php

namespace App\Http\Controllers;

use App\Models\Category;
use illuminate\Http\Request;
use Exception;
use PDOException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Category::get();
            return response()->json(["status"=>true, "message"=>"success", "data"=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(["status"=>false, "message"=>"success", "data"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = Category::create($request->all());
            return response()->json(["status"=>true, "message"=>"success", "data"=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(["status"=>false, "message"=>"data"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            return response()->json(['status'=>true, 'data'=>$category]);
        } catch (Exception | PDOException $e) {
            return response()->json(["status"=>false, "message"=>"success", "data failed to update", "error_type"=> $e]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            // dd($category);
            $category->update($request->all());
            return response()->json(["status"=>true, "message"=>"data has been updated"]);
        } catch (Exception | PDOException $e) {
            return response()->json(["status"=>false, "message"=>"success", "data failed to update", "error_type"=> $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // dd($category);
            $data = $category->delete();
            return response()->json(["status"=>true, "message"=>"data has been deleted", "data"=>$data]);
        } catch (Exception | PDOException $e) {
            return response()->json(["status"=>false, "message"=>"success", "data failed to delete"]);
        }
    }
}
