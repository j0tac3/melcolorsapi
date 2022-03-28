<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::paginate(10);
        return CategoryResource::collection($category);
    }

    public function show($id) {
        $category = Category::findOrFaill($id);
        return new CategoryResource($category);
    }

    public function store(Request $request) {
        $request->validate([
            'desc' => 'required',
        ]);
            
        return Category::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'desc' => 'required',
        ]);
        
        $category = Category::findOrFail($id);       
        return  $category->update($request->all());
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);        
        return $category->delete();
    }
}
