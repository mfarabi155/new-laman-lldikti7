<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 's_menu';
    protected $primaryKey = 'menu_id';
    public $timestamps = false; // Mematikan timestamps otomatis Laravel

    protected $guarded = [];

    // Relasi untuk mendapatkan data Parent
    public function parentMenu()
    {
        return $this->belongsTo(Menu::class, 'menu_parent', 'menu_id');
    }

    // Relasi untuk mendapatkan data Child
    public function childMenus()
    {
        return $this->hasMany(Menu::class, 'menu_parent', 'menu_id');
    }
}