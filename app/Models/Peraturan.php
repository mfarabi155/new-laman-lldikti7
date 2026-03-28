<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    protected $table = 't_peraturan';
    protected $primaryKey = 'peraturan_id';
    public $timestamps = false; 

    protected $guarded = [];

    // Relasi: Peraturan ini milik satu Jenis Peraturan
    // 'peraturan_jenis' adalah foreign key di t_peraturan
    // 'peraturan_jenis_id' adalah primary key di t_peraturan_jenis
    public function jenis()
    {
        return $this->belongsTo(PeraturanJenis::class, 'peraturan_jenis', 'peraturan_jenis_id');
    }
}