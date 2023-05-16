<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=['first_name' ,'last_name', 'email' , 'tel_number' , 'res_data','geust_number' , 'table_id'];
    
    protected $dates = [
        'res_data'
    ];
    public function table(){
        return $this->belongsTo(Table::class , 'table_id');
    }

}
