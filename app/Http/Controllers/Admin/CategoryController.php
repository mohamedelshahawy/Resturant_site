<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Unique;
use App\Models\Categorey;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $categories=Categorey::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',

        ]);
        $ImageName = uniqid() . '.' .$request->image->extension() ;
        $request->image->move(public_path('categories') , $ImageName);

        Categorey::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'image'=>$ImageName
        ]);
        return redirect('admin/categories')->with('success' , 'Category Created Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorey $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
        ]);
             $ImageName = uniqid() . '.' .$request->image->extension() ;
             $request->image->move(public_path('categories') , $ImageName);
        // $ImageName=$category->image;
        // if($request->has_file('image')){
        //     Storage::delete($category->image);
        //     $ImageName = uniqid() . '.' .$request->image->extension() ;
        //     $request->image->move(public_path('categories') , $ImageName);
        // }
            Categorey::where('id' , $id) ->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'image'=>$ImageName,

        ]);
        return redirect('admin/categories ')->with('success' , 'Category Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete(['categories', 'image']);
        Categorey::where('id' , $id)->delete();
        return redirect('admin/categories')->with('danger' , 'Category Deleted Successfuly');
    }
}
