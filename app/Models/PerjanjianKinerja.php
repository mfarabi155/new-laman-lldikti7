<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerjanjianKinerja extends Model
{
    protected $table = 't_pk';
    protected $primaryKey = 'pk_id';
    
    // Karena pk_id menggunakan string acak, nonaktifkan auto-increment
    public $incrementing = false;
    protected $keyType = 'string';
    
    // Nonaktifkan timestamps bawaan Laravel jika tidak ada kolom created_at/updated_at
    public $timestamps = false; 

    protected $guarded = [];
}