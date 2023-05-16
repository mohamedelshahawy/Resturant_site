<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorey;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=['name' , 'description' , 'image' , 'price'];
    public function categories(){
        return $this->belongsToMany(Categorey::class , 'category_menu');
    }
}
