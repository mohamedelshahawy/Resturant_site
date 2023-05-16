<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index' , compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
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
            'status'=>'required',
            'geust_num'=>'required',
            'location'=>'required'
        ]);
        Table::create([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'geust_num'=>$request->input('geust_num'),
            'location'=>$request->input('location'),
        ]);
        return redirect('admin/tables')->with('success' , 'Table Created Successfuly');
    }

    public function edit(Table $table)
    {
        return view('admin.tables.edit' , compact('table'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required',
            'geust_num'=>'required',
            'location'=>'required'
        ]);
        Table::where('id',$id)->update([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'geust_num'=>$request->input('geust_num'),
            'location'=>$request->input('location'),
        ]);
        return redirect('admin/tables')->with('success' , 'Table Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        $table->reservations()->delete();
        return redirect('admin/tables')->with('danger' , 'Table Deleted Successfuly');
        
    }
}
