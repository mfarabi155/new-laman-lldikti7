<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 't_info';
    protected $primaryKey = 'info_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Sesuaikan kolom yang bisa diisi
    protected $fillable = [
        'info_id', 'id_info_jenis', 't_bagian_id', 'info_status', 
        'info_judul', 'slug', 'info_isi', 'id_created', 
        'id_updated', 'info_tanggal'
    ];

    // Relasi ke tabel detail (Lampiran)
    public function details()
    {
        return $this->hasMany(InfoDetail::class, 't_info_id', 'info_id');
    }
}