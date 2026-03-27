<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    // Arahkan ke tabel legacy Anda
    protected $table = 't_bagian';
    
    // Tentukan Primary Key-nya (asumsi saya 'bagian_id' berdasarkan relasi sebelumnya)
    protected $primaryKey = 'bagian_id';
    
    // Matikan timestamps jika di tabel ini tidak ada created_at & updated_at
    public $timestamps = false;
    
    protected $guarded = [];
}