<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeraturanJenis extends Model
{
    protected $table = 't_peraturan_jenis';
    protected $primaryKey = 'peraturan_jenis_id';
    public $timestamps = false; // Set false jika tabel tidak punya created_at/updated_at

    protected $guarded = [];

    // Relasi: Satu Jenis Peraturan memiliki Banyak Peraturan
    public function peraturan()
    {
        return $this->hasMany(Peraturan::class, 'peraturan_jenis', 'peraturan_jenis_id');
    }
}