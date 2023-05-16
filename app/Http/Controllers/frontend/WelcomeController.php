<?php

namespace App\Http\Controllers\frontend;

use App\Models\Categorey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index(){
        $specials = Categorey::where('name' , 'specials')->first();
        return view('welcome' , compact('specials'));
    }
    public function thanks(){
        return view('thanks');
    }
}
