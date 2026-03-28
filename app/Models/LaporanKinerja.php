<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKinerja extends Model
{
    protected $table = 't_lakin';
    protected $primaryKey = 'lakin_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    
    public $timestamps = false; 

    protected $guarded = [];
}