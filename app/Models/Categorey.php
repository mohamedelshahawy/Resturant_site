<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorey extends Model
{
    use HasFactory;
    protected $fillable=['name' , 'description' , 'image'];
    public function menus(){
        return $this->belongsToMany(Menu::class, 'category_menu');
    }
}
