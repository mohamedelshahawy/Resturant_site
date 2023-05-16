<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categorey;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Categorey::all();
        return view('categories.index', compact('categories'));
    }
    public function show(Categorey $category){
       
        return view('categories.show', compact('category'));
    }
}
