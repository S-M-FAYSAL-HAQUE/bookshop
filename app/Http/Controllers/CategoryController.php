<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('admin.pages.category.index', compact('categories'));
    }
    public function create(){
        $categories = Category::all();
        return view('admin.pages.category.create', compact('categories'));
    }
    public function store(Request $request){
        Category::create($request->all());
        return redirect()->route('categories.index');
    }
}
