<?php

namespace App\Http\Controllers\Admin;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorey;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=Menu::all();
        return view('admin.menu.index' , compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorey::all();
        return view('admin.menu.create' , compact('categories'));
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
            'price'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',

        ]);
        $ImageName = uniqid() . '.' .$request->image->extension() ;
        $request->image->move(public_path('menus') , $ImageName);

        $menu = Menu::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'image'=>$ImageName
        ]);
        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }
        return redirect('admin/menu')->with('success' , 'Menu Created Successfuly');
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
    public function edit(Menu $menu)
    {
        $categories = Categorey::all();
        return view('admin/menu/edit' ,compact('menu' , 'categories') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',

        ]);
        $ImageName = uniqid() . '.' .$request->image->extension() ;
        $request->image->move(public_path('menus') , $ImageName);

       
        $menu->update([
            'name'=>$request->input('name'),
            'pric'=>$request->input('price'),
            'description'=>$request->input('description'),
            'image'=>$ImageName

        ]);
        if($request->has('categories')){
            $menu->categories()->sync($request->categories);
        }
        return redirect('admin/menu')->with('success' , 'Menu Updated Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();

        return redirect('admin/menu')->with('danger' , 'Menu Deleted Successfuly');

    }
}
