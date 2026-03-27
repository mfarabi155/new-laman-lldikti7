<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoDetail extends Model
{
    protected $table = 't_info_detail';
    protected $primaryKey = 'info_detail_id';

    protected $fillable = [
        't_info_id', 'info_judul_file', 'info_file'
    ];

    public function info()
    {
        return $this->belongsTo(Info::class, 't_info_id', 'info_id');
    }
}