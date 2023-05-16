<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index' , compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status' , 'avalable')->get();
        return view('admin.reservation.create' , compact('tables'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $table = Table::findOrFail($request->table_id);
        if($request->geust_num > $table->geust_num){
            return back()->with('warning' , 'please choose the table base on geusts');
        }
        // $request_date = carbon::parse($request->res_date);
        // foreach($table->reservations as $res){
        //     if($res->res_date->format('Y-m-d')  == $request_date->res_date->format('Y-m-d')){
        //         return back()->with('warning' , 'this table is reserved for this day');

        //     }
        // }
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>['required', 'email'],
            'number'=>'required',
            'res_date'=>['required','date' , new DateBetween , new TimeBetween],
            'geust_num'=>'required',
            'table_id'=>'required',

        ]);
        Reservation::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'tel_number'=>$request->input('number'),
            'res_date'=>$request->input('res_date'),
            'geust_number'=>$request->input('geust_num'),
            'table_id'=>$request->input('table_id'),
        ]);
        return redirect('admin/reservation');
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
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status' , 'avalable')->get();

        return view('admin.reservation.edit' , compact('reservation' , 'tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->geust_num > $table->geust_num){
            return back()->with('warning' , 'please choose the table base on geusts');
        }
        // $request_date = carbon::parse($request->res_date);
        // foreach($table->reservations as $res){
        //     if($res->res_date->format('Y-m-d')  == $request_date->res_date->format('Y-m-d')){
        //         return back()->with('warning' , 'this table is reserved for this day');

        //     }
        // }
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>['required', 'email'],
            'number'=>'required',
            'res_date'=>['required','date' , new DateBetween , new TimeBetween],
            'geust_num'=>'required',
            'table_id'=>'required',

        ]);
        $reservation->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'tel_number'=>$request->input('number'),
            'res_date'=>$request->input('res_date'),
            'geust_number'=>$request->input('geust_num'),
            'table_id'=>$request->input('table_id'),
        ]);
        return redirect('admin/reservation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('admin/reservation')->with('danger' , 'reservation Deleted Successfuly');
    }
}
