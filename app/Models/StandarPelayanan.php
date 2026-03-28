<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandarPelayanan extends Model
{
    protected $table = 't_sp';
    protected $primaryKey = 'sp_id';
    public $timestamps = false; // Set false jika tidak ada kolom created_at / updated_at di tabel

    protected $guarded = [];
}