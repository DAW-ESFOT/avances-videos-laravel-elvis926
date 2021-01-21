<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }
    public function show(Category $category)
    {
        return response()->json(new CategoryResource($category),200);
    }
    public function store(Request $request)
    {
        return Category::create($request->all());}
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return $category;
    }
    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return 204;}
}
