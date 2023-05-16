<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservations.step_one', compact('reservation', 'min_date', 'max_date'));
    }

    ///////////////////////

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'tel_number' => ['required'],
            'geust_number' => ['required'],
        ]);

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        return to_route('reservations.step.tow');
    }
    public function stepTow(Request $request)
     {
        // $reservation = $request->session()->get('reservation');
        // $res_table_ids = Reservation::orderBy('res_data')->get()->filter(function ($value) use ($reservation) {
        //     // return $value->res_data->format('Y-m-d') == $reservation->res_data->format('Y-m-d');
        //     return ($value->res_data ?? null) !== null && ($reservation->res_data ?? null) !== null && $value->res_data->format('Y-m-d') == $reservation->res_data->format('Y-m-d');
        // })->pluck('table_id');
        $reservation = $request->session()->get('reservation');
        $tables = Table::where('status', 'avalable')->get();
        return view('reservations.step_tow', compact('reservation', 'tables'));
    }
    public function storeStepTow(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');
        return to_route('thanks');
    }
}
